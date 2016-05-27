<?php
/**
 * Created by PhpStorm.
 * User: BaBar
 * Date: 09/05/2016
 * Time: 19:12
 */

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Tools\DB\model as DB;

class ContactController {


    // Demander aux élève de faire ça en forme de TP
    // Faire une class Contact qui enregistre les demain de contact
    // Nom / Prénom / Email / Message / Date à récuperer dans le controler ( DATEIME OR 0 )
    // Bonus : Envoyer un mail via un objet mail déjà créer et tester avec un wifi public

    public static function routing(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/contact/contact.php';
                break;
            case 'POST':
                echo "On traite le formulaire de contact";
                echo "Et on redirige sur une nouvelle vue qui remercie l'utilisateur d'avoir laissé un message";
                break;
        }
    }




}