<?php
use Noneslad\Tools\WebTools;
use Noneslad\Tools\HTML\html;
use Noneslad\Entity\PageWeb;
$html = new html();
?>

<h1>Liste des pages Web !</h1>

<?php


if (WebTools::getInFlashBag('Notice')) {
    $html->alert(WebTools::getInFlashBag('Notice'));
}
?>
<table class="table">
    <tr>
        <th>Nom de la page</th>
        <th>Balise Title de la page</th>
        <th>Actions</th>
    </tr>
   <?php foreach (PageWeb::findAllPageWeb() as $pageWeb) {
       ?>
       <tr>
           <td><?php echo $pageWeb->nom; ?></td>
           <td><?php echo $pageWeb->title; ?></td>
           <td>
               <a class="btn btn-info" href="?page=pageWeb&action=read&id=<?php echo $pageWeb->id; ?>"><i class="fa fa-eye"></i> </a>
               <a class="btn btn-warning" href="?page=pageWeb&action=update&id=<?php echo $pageWeb->id; ?>"><i class="fa fa-pencil"></i> </a>
               <a class="btn btn-danger" href="?page=pageWeb&action=delete&id=<?php echo $pageWeb->id; ?>"><i class="fa fa-trash"></i> </a>
           </td>
       </tr>
    <?php
   }?>
</table>
<div class="well">
    <a class="btn btn-success" href="?page=pageWeb&action=create"><i class="fa fa-plus"></i> </a>
</div>