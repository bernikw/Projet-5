<?php

declare(strict_types=1);

namespace  App\Controller\Backoffice;

use App\View\View;
use App\Service\Http\Response;
use App\Service\Http\Session\Session;
use App\Model\Repository\PostRepository;
use App\Model\Entity\Post;
use App\Service\Http\Request;
use App\Service\Validator\PostValidator;
use App\Controller\Backoffice\AuthentificationController;
use App\Service\AccessControl;

final class ArticleController
{
    private View $view;
    private Session $session;
    private PostRepository $postRepository;
    private AccessControl $accessControl;


    public function __construct(View $view, PostRepository $postRepository, Session $session, AccessControl $accessControl)
    {
        $this->view = $view;
        $this->postRepository = $postRepository;
        $this->session = $session;
        $this->accessControl = $accessControl;
    }

    public function displayAllPosts(): Response
    {
        if($this->accessControl->isAdmin() === false){

            return new Response('', 303, ['redirect' => 'login']);
        }
        $posts = $this->postRepository->findAll();

        return new Response($this->view->render([
            'template' => 'backarticle',
            'data' => ['posts' => $posts],
        ], 'backoffice'));
    }


    public function displayAddPostAction(Request $request, PostValidator $postValidator): Response
    {
        $datas = [];

        if ($request->getMethod() === 'POST') {

            $datas = $request->request()->all();


            if ($postValidator->isValid($datas)) {

            $post = new Post(0, $datas['title'], $datas['chapo'], $datas['text'], NULL, NULL, 2, 'Ernest');

                $this->postRepository->create($post);

                $this->session->addFlashes('success', ['Votre post a été enregistré']);
                return new Response('', 303, ['redirect' => 'addarticle']);
  
                
            } else {

                $this->session->addFlashes(
                    'error',
                    $postValidator->getErrors()
                );
            }
        }

        return new Response($this->view->render([
            'template' => 'backaddarticle',
            'data' => ['datassaisi' => $datas],
        ], 'backoffice'));
    }

   

    public function displayEditPostAction(int $id): Response
    {
      
        $post = $this->postRepository->findOneBy(['id'=> $id]);
        


        $post = $this->postRepository->update($post);

        return new Response($this->view->render([
            'template' => 'backeditarticle',
            'data' => ['post'=> $post],
        ], 'backoffice'));
    }


    public function deletePost($id)
    {

        $posts = $this->postRepository->delete($id);

        $this->session->addFlashes('success', ['Votre article a été supprimée']);

        return new Response('', 303, ['redirect' => 'backarticle', 'data' => ['posts' => $posts]]);
    }
}
