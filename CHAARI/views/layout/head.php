<?php

use Noneslad\Tools\HTML\html;
use Noneslad\Controllers\PageWebController;


$html = new html();

$html->open_head();
    $html->edit_meta_type("text/html", "UTF-8");
    $html->title_page("Mon super site internet");
    $html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
    $html->css('//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/spacelab/bootstrap.min.css');
    $html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
$html->close_head();
