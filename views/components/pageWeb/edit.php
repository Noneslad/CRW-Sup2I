<h1>Modification de Page Web !</h1>
<form action="?page=pageWeb&action=update&id=<?php echo $pageWeb->getId(); ?>" method="post">
    <div class="form-group">
        <label for="nom">Nom de la page</label>
        <input type="text"
               class="form-control"
               id="nom"
               placeholder="utilisé dans l'url ..."
               name="nom"
               value="<?php echo $formData['nom']; ?>
               ">
    </div>
    <div class="form-group">
        <label for="title">balise Title de la page</label>
        <input
            type="text"
            class="form-control"
            id="title"
            placeholder="Affiché dans les tabs des navigateurs"
            name="title"
            value="<?php echo $formData['title']; ?>"
        >
    </div>



<div class="well">
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button>
    <a class="btn btn-primary" href="?page=pageWeb&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-danger" href="?page=pageWeb&action=delete&id=<?php echo $pageWeb->getId(); ?>"><i class="fa fa-trash"></i> </a>
</div>
</form>