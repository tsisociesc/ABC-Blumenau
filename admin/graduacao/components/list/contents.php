<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <th>Descrição</th>
            <th>Sequencia</th>
            <th class="text-right">Ações</th>
        </thead>
        <tbody>
            <?php
            /**
             * Aqui você listara todos os registros.
             */
            ?>
            <?php foreach ($objGraduacoes as $objGraduacao) /** @var $objGraduacao Graduacao */ : ?>
                <tr>
                    <td><?php echo $objGraduacao->getDescricao() ?> </td>
                    <td><?php echo $objGraduacao->getSequencia() ?></td>
                    <td class="text-right">
                        <a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a>
                        <a class="btn btn-primary" href="registration.php?id=<?php echo $objGraduacao->getId(); ?>"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>