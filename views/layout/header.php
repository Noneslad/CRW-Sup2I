<?php
use Noneslad\Tools\HTML\html;
use Noneslad\Entity\User;

$html = new html();

$html->open_div(array('class' => 'jumbotron'));
    $html->h1("Site Web Pour le Cours PHP");
    $html->p("Pour manipuler PHP !");
    $html->open_p();
        $html->boutonLien('Accueil', '?page=home', 'info');
        $html->boutonLien('Inscription', '?page=user&action=create', 'info');
        $html->boutonLien('Contact', '?page=contact', 'info');
        $html->boutonLien('Connexion', '?page=user&action=connexion', 'info');
        $html->boutonLien('PagesWeb', '?page=pageWeb', 'info');
        /*$html->boutonLien('PagesWeb', '?page=pageWeb', 'info');*/
        if (User::isAnyConnected()) {
            $html->boutonLien('Mon profil', '?page=user&action=show&id='.$_SESSION['login'], 'default');
            $html->boutonLien('Se déconnecter', '?page=user&action=deconnexion', 'danger');
        }
    $html->close_p();
$html->close_div();
