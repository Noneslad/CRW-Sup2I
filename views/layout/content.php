<?php
use Noneslad\Controllers\AppController;
use Noneslad\Tools\WebTools;
?>
<div class="col-lg-9">

    <?php
        if (WebTools::getInFlashBag('Notice')) {
            $html->alert(WebTools::getInFlashBag('Notice'));
            unset($_SESSION['Notice']);
        }
    ?>

    <div class="well">
        <?php AppController::getPage(); ?>
    </div>
</div>

