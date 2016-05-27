<?php
/**
 * Created by PhpStorm.
 * User: BaBar
 * Date: 09/05/2016
 * Time: 19:12
 */

namespace Noneslad\Controllers;

use Noneslad\Entity\Media;
use Noneslad\Entity\User;
use Noneslad\Tools\WebTools as WT;
use Noneslad\Tools\DB\model as DB;

class MediaController
{


    public static function routing()
    {
        switch (WT::fromRequest('action')) {
            case 'create' :
                self::create();
                break;
            case 'show' :
                self::show();
                break;
            case 'update' :
                self::update();
                break;
            default :
                include 'views/components/media/list.php';
                break;
        }
    }

    public static function create()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                include 'views/components/media/new.php';
                break;
            case 'POST':
                $redirect = '?page=user&action=create';
                // Ici il faut faire les vérifications
                // Vérifier que l'email n'est pas déja existant  => faire des redirect avec FlashBag
                // Vérifier si les deux password sont bien matchés => faire des redirect avec FlashBag
                if (WT::checkField('nom',$redirect) && WT::checkField('alt',$redirect) && !WT::checkField('fichier',$redirect)) {
                    $media = new Media();
                    $media->setNom(WT::fromRequest('nom'));
                    $media->setAlt(WT::fromRequest('alt'));
                    $media->upload(WT::fromFileRequest());
                    $media->insert();
                    WT::setInFlashBag("Notice", "Votre Fichier à bien été sauvegardé !");
                    WT::redirect("?page=media&action=show&id=" . $media->getId());
                }



                break;
        }
    }

    public static function show()
    {

        // Ici il faudra rajouter par la suite une vérification si session["login"] = $user->getId();

        $media = new Media(WT::fromRequest('id'));
        include 'views/components/media/show.php';

    }

    public static function update()
    {

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $media = new Media(WT::fromRequest('id'));
                if ($media->getId() != false) {
                    include 'views/components/media/edit.php';
                } else {
                    WT::redirect("?page=media&action=create");
                }
                break;
            case 'POST':

                $media = new Media(WT::fromRequest('id'));
                $media->setNom('nom');
                $media->setAlt('alt');
                $media->upload(WT::fromFileRequest());
                $media->update();
                WT::redirect("?page=user&action=show&id=" . $mdeia->getId());
                break;
        }
    }
}