<?php ob_start(); ?>

<form action="<?= url('ouvrages/save') ?>" method="post">

    <input type="hidden" name="id"     value="<?= (isset($ouvrage)) ? $ouvrage->id() : '' ?>">
    <input type="text"   name="titre"  value="<?= (isset($ouvrage)) ? $ouvrage->titre() : '' ?>"    placeholder="Titre"  class="form-control">
    <input type="text"   name="auteur" value="<?= (isset($ouvrage)) ? $ouvrage->auteur() : '' ?>"   placeholder="Auteur" class="form-control">

    <button type="submit" class="btn btn-<?= (isset($abonne)) ? 'warning' : 'success' ?>">
        <?= (isset($abonne)) ? 'Editer' : 'Créer' ?> un ouvrage
    </button>
</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>