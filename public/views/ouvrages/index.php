<?php ob_start(); ?>

<a href="<?= url('ouvrages/add') ?>">Ajouter un élément</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Auteur</th>
        <th>Titre</th>
        <th></th>
        <th></th>
    </tr>

    <?php foreach($ouvrages as $ouvrage) : ?>
        <tr>
            <td>
                <a href="<?= url('ouvrages/' . $ouvrage->id())?>">
                    <?= $ouvrage->id() ?>
                </a>
            </td>
            <td><?= $ouvrage->auteur() ?></td>
            <td><?= $ouvrage->titre() ?></td>
            <td>
                <a href="<?= url('ouvrages/' . $ouvrage->id() . '/edit')?>"><i class="fas fa-pencil-alt"></i></a>
            </td>
            <td>
                <a href="<?= url('ouvrages/' . $ouvrage->id() . '/delete')?>" class="delete"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>