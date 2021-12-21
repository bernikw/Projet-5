<?php

declare(strict_types=1);

namespace App\Service\Validator;


class PostValidator extends BaseValidator
{
    private $datas = [];

    public function isValid(array $datas): bool
    {

        $result = true; 

        if(!$this->isValidInput($datas['titre']) {

            $this->errors['titre'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        }
         if (!$this->isValidInput($datas['text'])) {

            $this->errors['text'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        }

        if (!$this->isValidInput($datas['chapo'])) {

            $this->errors['chapo'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        }

        if (!$this->isValidDatas($datas['titre'])) {

            $this->errors['titre'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        } 

        if (!$this->isValidDatas($datas['text'])) {

            $this->errors['text'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        } 

        if (!$this->isValidDatas($datas['chapo'])) {

            $this->errors['chapo'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        } 
        return $result;
    }
}