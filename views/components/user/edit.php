<h4>Modification de votre profil</h4>

<hr>

<form class="form-horizontal" method="POST">
    <div class="form-group">
        <label for="inputNom" class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nom" value="<?php echo $user->getNom(); ?>" id="inputNom" placeholder="Nom">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPrenom" class="col-sm-2 control-label">Prénom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="prenom" value="<?php echo $user->getPrenom(); ?>" id="inputPrenom" placeholder="Prénom">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" disabled="disabled" value="<?php echo $user->getEmail(); ?>" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Mot de passe</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" value="<?php echo $user->getPassword(); ?>" id="inputPassword" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPasswordSecond" class="col-sm-2 control-label">Retaper le mot de passe</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" value="<?php echo $user->getPassword(); ?>" name="passwordSecond" id="inputPasswordSecond" placeholder="Retaper le mot de passe">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enregistrer</button>
        </div>
    </div>
</form>
