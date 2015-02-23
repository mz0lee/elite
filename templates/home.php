<h1>Práca s dátami</h1>
<?php foreach ($errors->getErrors() as $error) { ?>
<div class="alert alert-danger"><?=$error?></div>
<?php } ?>
<?php if(empty($data)) {?>
<div class="alert alert-info">Databáza je prázdna.</div>
<?php
} else {
    $excludeList = ['procesor', 'grafika', 'pevny_disk', 'pamat', 'date_inserted','date_modified'];
?>
<table class="table table-responsive table-striped">
    <thead>
        <tr>
            <?php foreach ($labels as $k=>$v) {
                if(in_array($k,$excludeList)) {
                    continue;
                }
                $dir = $k==$orderBy && $orderDir=='ASC' ? 'DESC' : 'ASC';
                $sortIcon = $k==$orderBy ? ($dir=='ASC' ? '<span class="glyphicon glyphicon-chevron-down"></span>' : '<span class="glyphicon glyphicon-chevron-up"></span>') : '';
                ?>
            <th><a href="?page=home&orderBy=<?=$k?>&orderDir=<?=$dir?>"><?=$v?>&nbsp;<?=$sortIcon?></a></th>
            <?php }?>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) {?>
        <tr>
            <?php foreach ($labels as $k=>$v) {
                if(in_array($k,$excludeList)) {
                    continue;
                }
            ?>
            <td><?=$row->$k?><?php echo $k=='cena'?' &euro;':''?></td>
            <?php } ?>
            <td><a class="btn btn-primary" href="?page=email&id=<?=$row->id?>"><span class="glyphicon glyphicon-envelope"></span></a></td>
            <td><a class="btn btn-primary" href="?page=edit&id=<?=$row->id?>"><span class="glyphicon glyphicon-wrench"></span></a></td>
            <td><a class="btn btn-danger" href="?page=delete&id=<?=$row->id?>"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<a href="?page=add" class="btn btn-primary pull-right">Nový</a>
<?php } ?>