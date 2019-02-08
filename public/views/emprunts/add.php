<?php ob_start(); ?>

<form action="<?= url('emprunts/save') ?>" method="post">

    <select name="id_abonne" class="form-control">
        <?php foreach ($abonnes as $abonne): ?>
            <option value="<?= $abonne->id()?>"><?= $abonne->nomComplet()?></option>
        <?php endforeach; ?>
    </select>

    <select name="id_ouvrage" class="form-control">
        <?php foreach ($ouvrages as $ouvrage): ?>
            <option value="<?= $ouvrage->id()?>"><?= $ouvrage->nomComplet()?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="btn btn-success">Ajouter un emprunt</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>