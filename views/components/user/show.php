
<?php
use Noneslad\Tools\HTML\html;


?>

<h4>Mon profil</h4>

<?php
$html = new html();
var_dump($user);

$html->boutonLien('Modifier', '?page=user&action=update&id='.$user->getId().'', 'warning');

?>

<h4>Ici il faut afficher le profil avec un Bootsnipp UserCar</h4>
