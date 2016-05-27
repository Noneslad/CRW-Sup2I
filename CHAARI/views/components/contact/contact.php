<?php

    use Noneslad\Entity\User;

    /* Pour recuperer l"utilisateur connecté sur une autre page */
    $user = User::giveMeUser();
    var_dump($user);

?>

<h4>Contactez moi !</h4>
<h5>...enfin quand il y aura un formulaire !</h5>
