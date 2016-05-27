<h1>Information sur la page Web !</h1>

<table class="table">
    <tr>
        <th>Nom de la page</th>
        <td><?php echo $pageWeb->getNom(); ?></td>
    </tr>
    <tr>
        <th>Balise Title de la page</th>
        <td><?php echo $pageWeb->getTitle(); ?></td>
    </tr>
</table>
<div class="well">
    <a class="btn btn-primary" href="?page=pageWeb&action=list"><i class="fa fa-list"></i> </a>
    <a class="btn btn-warning" href="?page=pageWeb&action=update&id=<?php echo $pageWeb->getId(); ?>"><i class="fa fa-pencil"></i> </a>
    <a class="btn btn-danger" href="?page=pageWeb&action=delete&id=<?php echo $pageWeb->getId(); ?>"><i class="fa fa-trash"></i> </a>
</div>