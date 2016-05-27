<?php
/**
 * Created by PhpStorm.
 * User: BaBar
 * Date: 09/05/2016
 * Time: 19:12
 */

namespace Noneslad\Controllers;

use Noneslad\Entity\User;
use Noneslad\Tools\WebTools;

class UserController {


    public static function routing(){
        switch (WebTools::fromRequest('action')){
            case 'connexion' :
                self::connexion();
                break;
            case 'create' :
                self::create();
                break;
            case 'show' :
                self::show();
                break;
            case 'update' :
                self::update();
                break;
            case 'deconnexion' :
                self::deconnexion();
                break;
            default :
                include 'views/components/user/new.php';
                break;
        }
    }

    public static function create(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/user/new.php';
                break;
            case 'POST':
                // Ici il faut faire les vérifications
                // Vérifier que l'email n'est pas déja existant  => faire des redirect avec FlashBag
                // Vérifier si les deux password sont bien matchés => faire des redirect avec FlashBag
                if (User::EmailExiste(WebTools::fromRequest('email'))) {
                    WebTools::setInFlashBag("Notice","Cet email est déja utilisé !");
                    WebTools::redirect("?page=user&action=create");
                    break;
                }

                $user = new User();
                $user->setNom(WebTools::fromRequest('nom'));
                $user->setPrenom(WebTools::fromRequest('prenom'));
                $user->setEmail(WebTools::fromRequest('email'));

                $user->setPassword(WebTools::fromRequest('password'));
                $user->insert();
                $user->connectUser();
                WebTools::setInFlashBag("Notice","Vous êtes maintenant inscrit et connecté !");
                WebTools::redirect("?page=user&action=show&id=".$user->getId());
                break;
        }
    }

    public static function show(){

    // Ici il faudra rajouter par la suite une vérification si session["login"] = $user->getId();

        $user = new User(WebTools::fromRequest('id'));
        include 'views/components/user/show.php';

    }

    public static function update(){

    $userSession = User::giveMeUser();
    if ($userSession->getId() == WebTools::fromRequest('id')) {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $user = new User(WebTools::fromRequest('id'));
                if ($user->getId() != false) {
                    include 'views/components/user/edit.php';
                } else {
                    WebTools::redirect("?page=user&action=connexion");
                }
                break;
            case 'POST':
                // Ici il faut faire les vérifications
                $user = new User();
                $user->setNom(WebTools::fromRequest('nom'));
                $user->setPrenom(WebTools::fromRequest('prenom'));
                $user->setEmail(WebTools::fromRequest('email'));
                $user->setPassword(WebTools::fromRequest('password'));

                $user->insert();
                $user->connectUser();
                //WebTools::setInFlashBag("Notice","Vous êtes maintenant inscrit et  connecté sur notre site !");
                WebTools::redirect("?page=user&action=show&id=" . $user->getId());
                break;
        }
    }
        else {

            /* Rajouter un flashbad qui infiorme l'utilisateur d'une action interdite */
            WebTools::redirect("?page=home");

        }
    }


    public static function connexion() {
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/user/connexion.php';
                break;
            case 'POST':

                /* On crée un utilisateur et on stock l'email du formulaire dedans */
                $user = new User();
                $user->setEmail(WebTools::fromRequest('email'));

                /* On vérifie sir l"utilisateur existe par rapport à l'email saisie dans le formulaire */
                $user->getUserByEmail();

                if ($user->getId() == null) {
                    WebTools::setInFlashBag("Notice","Ce compte n'existe pas !");
                    WebTools::redirect("?page=user&action=connexion");
                    break;
                }

                else {

                    if ($user->validatePassword(WebTools::fromRequest('password'))) {
                        $user->connectUser();
                        WebTools::setInFlashBag("Notice","Vous êtes maintenant connecté !");
                        WebTools::redirect("?page=home");
                    }

                    else {
                        // Ici mettre un flashBag + rediriger vers le formulaire de connexion
                        WebTools::setInFlashBag("Notice","Le mot de passe entré ne correspondant pas au Login. Réeessayer!");
                        WebTools::redirect("?page=user&action=connexion");
                    }

                }

            break;
        }
    }

    /* Cette fonction permet de deconnecter un utilisateur */
    public static function deconnexion() {

        User::disconnectUser();
        WebTools::setInFlashBag("Notice","Vous êtes maintenant déconnecté !");
        WebTools::redirect("?page=home");

    }



}