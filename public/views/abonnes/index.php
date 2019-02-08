<?php ob_start(); ?>

<a href="<?= url('abonnes/add') ?>">Ajouter un élément</a>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Edition</th>
        <th>Suppression</th>
    </tr>

    <?php foreach($abonnes as $abonne) : ?>
        <tr>
            <td>
                <a href="<?= url('abonnes/' . $abonne->id())?>">
                    <?= $abonne->id() ?>
                </a>
            </td>
            <td><?= $abonne->prenom() ?></td>
            <td><?= $abonne->nom() ?></td>
            <td>
                <a href="<?= url('abonnes/' . $abonne->id() . '/edit')?>">
                    <i class="fas fa-pencil-alt"></i>
                </a>
            </td>
            <td>
                <a href="<?= url('abonnes/' . $abonne->id() . '/delete')?>" class="delete">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>