<?php

namespace Noneslad\Controllers;

use Noneslad\Tools\WebTools;
use Noneslad\Entity\PageWeb;
use Noneslad\Tools\DB\model as DB;

/**
 * Description of pageWeb
 *
 * @author Job
 */
class PageWebController {

    public static function routing(){
        switch (WebTools::fromRequest('action')){
            case 'create' :
                self::create();
                break;
            case 'read' :
                self::read();
                break;
            case 'update' :
                self::update();
                break;
            case 'delete' :
                self::delete();
                break;
            default :
                include 'views/components/pageWeb/list.php';
                break;
        }
    }

    public static function create(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                include 'views/components/pageWeb/new.php';
                break;
            case 'POST':
                $pageWeb = new PageWeb();
                $date = date('Y-m-d H:i:s');
                $pageWeb->setNom(WebTools::fromRequest('nom'));
                $pageWeb->setTitle(WebTools::fromRequest('title'));
                $pageWeb->insert();
                WebTools::setInFlashBag('Notice', "La page ".$pageWeb->getNom()." : ".$pageWeb->getTitle()." à été enregistré avec succés !");
                include 'views/components/pageWeb/list.php';
                break;
        }
    }
    public static function read(){
        $pageWeb = new PageWeb(WebTools::fromRequest('id'));
        include 'views/components/pageWeb/show.php';
    }
    public static function update(){
        switch ($_SERVER['REQUEST_METHOD']){
            case 'GET':
                $pageWeb = new PageWeb(WebTools::fromRequest('id'));
                $formData['id'] = $pageWeb->getId();
                $formData['nom'] = $pageWeb->getNom();
                $formData['title'] = $pageWeb->getTitle();
                include 'views/components/pageWeb/edit.php';
                break;
            case 'POST':
                $pageWeb = new PageWeb(WebTools::fromRequest('id'));
                $pageWeb->setId(WebTools::fromRequest('id'));
                $pageWeb->setNom(WebTools::fromRequest('nom'));
                $pageWeb->setTitle(WebTools::fromRequest('title'));
                $pageWeb->update();
                WebTools::setInFlashBag('Notice', "La page ".$pageWeb->getNom()." : ".$pageWeb->getTitle()." à été modifié avec succés !");
                include 'views/components/pageWeb/list.php';
                break;
        }
    }
    public static function delete(){
        $pageWeb = new PageWeb(WebTools::fromRequest('id'));
        $pageWeb->delete();
        WebTools::setInFlashBag('Notice', "La page ".$pageWeb->getNom()." : ".$pageWeb->getTitle()." à été supprimé !");
        include 'views/components/pageWeb/list.php';


    }



    public static function getPage(){
        switch(WebTools::fromRequest('page')){
            case 'contact' :
                include 'views/pages/contact.php';
                break;
            case 'pageWeb' :
                PageWebController::routing();
                break;
            default :
                include 'views/pages/home.html';
        }
    }


    public static function getTitlePage()
    {
        if (WebTools::fromRequest('page')) {

        $sql = "select title from pageWeb where nom = '" . WebTools::fromRequest('page') . "'";
//        var_dump(DB::query($sql));exit;
        return DB::get_sql_object($sql)->title;
        }else{
            return 'HomePage !';
        }
    }
}
