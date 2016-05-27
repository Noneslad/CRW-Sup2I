<?php

use Noneslad\Tools\WebTools as WT;

// todo generaliser la fonction pour tout type de retour
if (WT::getInFlashBag('Notice')) {
    $html->alert(WT::getInFlashBag('Notice'));
}
if (WT::getInFlashBag('Danger')) {
    $html->alert(WT::getInFlashBag('Notice'),'danger');
}
?>
<form class="form-horizontal" action="?page=media&action=create" method="Post" enctype="multipart/form-data">
    <fieldset>

        <!-- Form Name -->
        <legend>Ajouter un nouveau média</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="alt">Alt :</label>
            <div class="col-md-5">
                <input id="alt" name="alt" type="text" placeholder="La balise alt" class="form-control input-md">
                <span class="help-block">Utile au référencement !</span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nom">Nom :</label>
            <div class="col-md-5">
                <input id="nom" name="nom" type="text" placeholder="Nom du fichier" class="form-control input-md" required="">
                <span class="help-block">Le nom du fichier doit être unique !</span>
            </div>
        </div>

        <!-- File Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="fichier">Seléctionnez votre média</label>
            <div class="col-md-4">
                <input id="media" name="fichier" class="input-file" type="file">
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="validMediaNew"></label>
            <div class="col-md-4">
                <button id="validMediaNew" type ="submit" name="validMediaNew" class="btn btn-success">Soumettre</button>
            </div>
        </div>

    </fieldset>
</form>