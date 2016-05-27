<form action="?page=pageWeb&action=create" method="post">
    <div class="form-group">
        <label for="nom">Nom de la page</label>
        <input type="text" class="form-control" id="nom" placeholder="utilisé dans l'url ..." name="nom">
    </div>
    <div class="form-group">
        <label for="title">balise Title de la page</label>
        <input type="text" class="form-control" id="title" placeholder="Affiché dans les tabs des navigateurs" name="title">
    </div>
    <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Enregistrer</button>
</form>
<div class="well">
    <a class="btn btn-primary" href="?page=pageWeb&action=list"><i class="fa fa-list"></i> </a>
</div>