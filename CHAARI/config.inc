<?php

// Ceci déclenche la session, cela doit être la première ligne de codé donnée au système

session_start();


define('PARAM_hote', 'localhost');
define('PARAM_port','3306');
define('PARAM_nom_bd','chalons');
define('PARAM_utilisateur','root');
define('PARAM_mot_passe','');

define('IMG_FILE','assets/img/');
define('IMG_ICON_PDF',IMG_FILE.'icoPDF.png');
define('IMG_ICON_VIDEO',IMG_FILE.'icoVIDEO.png');


/*
 * Tools PHP
 */
require_once('controllers\tools\html.class.php');
require_once('controllers\tools\none_form.class.php');
require_once('controllers\tools\webTools.class.php');
require_once('controllers\tools\model.class.php');


/*
 * Gestion des objets !
 */

// PagesWeb
require_once('controllers\appController.php');
require_once('controllers\userController.php');
require_once('controllers\contactController.php');
require_once('controllers\MediaController.php');

require_once ('entity\class\user.php');
require_once ('entity\class\Media.php');


