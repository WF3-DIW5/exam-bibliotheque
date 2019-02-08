<?php ob_start(); ?>

<a href="<?= url('emprunts/add') ?>">Ajouter un élément</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Abonné</th>
        <th>Ouvrage</th>
        <th></th>
    </tr>

    <?php foreach($emprunts as $emprunt) : ?>
        <tr>
            <td><?= $emprunt->id() ?></td>
            <td><?= $emprunt->abonne()->nomComplet() ?></td>
            <td><?= $emprunt->ouvrage()->nomComplet() ?></td>
            <td>
                <a href="<?= url('emprunts/' . $emprunt->id() . '/delete')?>" class="delete">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>