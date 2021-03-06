<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 26/02/2018
 * Time: 14:34
 */
?>

<h1>Lista de solicitações</h1>
<hr/>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link <?php echo $status == 1 ? 'active' : ''; ?>" href="home.php">Novas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $status == 2 ? 'active' : ''; ?>"
           href="home.php?filter=atendimento">Em atendimento</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $status == 3 ? 'active' : ''; ?>" href="home.php?filter=respondido">Respondidas</a>
    </li>
</ul><br/>
<table class="table" id="flexlist">
    <thead>
    <th>Nº</th>
    <th>Solicitante</th>
    <th>Data/hora solicitação</th>
    <th>Status</th>
    <th></th>
    </thead>
    <tbody>
    <?php if (isset($listaFlex) && count($listaFlex) > 0) {
        foreach ($listaFlex as $key => $value) { ?>
            <tr>
                <td><?php echo $value['cd_flex']; ?></td>
                <td>Filial <?php echo $value['cd_filial']; ?></td>
                <td><?php echo date('d/m/Y H:i',strtotime($value['data_solicitacao'])); ?></td>
                <td><?php
                    if($value['status']==2) {
                        echo 'Em atendimento';
                       } else if($value['status']==3){
                        echo 'Respondido';
                       }else{
                        echo 'Novo';
                    } ?></td>
                <td>
                    <a href="home.php?action=detalhe&idflex=<?php echo $value['cd_flex']; ?>" class="btn btn-outline-primary">Detalhes...</a>
                </td>
            </tr>
            <?php
        }
    } ?>

    </tbody>
</table>
