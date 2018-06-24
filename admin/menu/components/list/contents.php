<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <th>Descrição</th>
            <th class="text-center">Icone</th>
            <th>Link</th>
            <th>Ordem</th>
            <th class="text-right">Ações</th>
        </thead>
        <tbody>
            <?php foreach ($objMenus as $objMenu) /** @var $objMenu Menu */ : ?>
                <tr>
                    <td><?php echo $objMenu->getDescricao() ?> </td>
                    <td class="text-center"><i class="<?php echo $objMenu->getIcone() ?>"></i></td>
                    <td><?php echo $objMenu->getLink() ?></td>
                    <td><?php echo $objMenu->getOrdem() ?></td>
                    <td class="text-right">
                        <a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a>
                        <a class="btn btn-primary" href="registration.php?id=<?php echo $objMenu->getId(); ?>"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>