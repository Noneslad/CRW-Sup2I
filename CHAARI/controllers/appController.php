<?php
/**
 * Created by PhpStorm.
 * User: BaBar
 * Date: 09/05/2016
 * Time: 19:12
 */

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\PageWeb;
use Noneslad\Tools\DB\model as DB;

class AppController {

    /* ------------------------------------------------------------ */
    /* ----------------- ROUTING NIVEAU 1 ------------------------- */
    /* ------------------------------------------------------------ */
    public static function getPage(){
        switch(WebTools::fromRequest('page')){
            case 'contact' :
                ContactController::routing();
                break;
            case 'media' :
                MediaController::routing();
                break;
            case 'pageWeb' :
                PageWebController::routing();
                break;
            case 'user' :
                UserController::routing();
                break;
            default :
                include 'views/pages/home.html';
        }
    }


}