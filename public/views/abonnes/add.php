<?php ob_start(); ?>

<a href="<?= url('abonnes') ?>">Retour</a>


<form action="<?= url('abonnes/save') ?>" method="post">

    <input type="hidden" name="id"     value="<?= (isset($abonne)) ? $abonne->id() : '' ?>">
    <input type="text"   name="prenom" value="<?= (isset($abonne)) ? $abonne->prenom() : '' ?>" placeholder="Prenom" class="form-control">
    <input type="text"   name="nom"    value="<?= (isset($abonne)) ? $abonne->nom() : '' ?>"    placeholder="Nom"    class="form-control">

    <button type="submit" class="btn btn-<?= (isset($abonne)) ? 'warning' : 'success' ?>">
        <?= (isset($abonne)) ? 'Editer' : 'Créer' ?> un abonné
    </button>
</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>