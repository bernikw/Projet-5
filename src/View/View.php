<?php

declare(strict_types=1);

namespace App\View;

use Twig\Environment;
use App\Service\Http\Session\Session;
use Twig\Loader\FilesystemLoader;


final class View
{
    private Environment $twig;
    private Session $session;

    public function __construct(Session $session)
    {
        $loader = new FilesystemLoader('../templates');
        $this->twig = new Environment($loader, ['cache' => false,]);
        $this->session = $session;
    }

    public function render(array $data, string $dir = 'frontoffice'): string
    {
        $data['data']['session'] = $this->session->toArray();
        $data['data']['flashes'] = $this->session->getFlashes();

        return $this->twig->render("${dir}/${data['template']}.html.twig", $data['data']);
    
    }
   
}

