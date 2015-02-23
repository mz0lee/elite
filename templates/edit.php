<h1><?=$item->nazov?> (<?=$labels['id']?>: <?= $item->id ?>)</h1>
<div class="item-params">
    <?= $labels["date_inserted"] ?> <strong><?= $item->date_inserted ?></strong><br />
    <?= $labels["date_modified"] ?> <strong><?= $item->date_modified ?></strong>
</div>
<br />
<br />
<?php foreach ($errors->getErrors() as $error) { ?>
<div class="alert alert-danger"><?=$error?></div>
<?php } ?>
<?php if($msg!=''){ ?>
<div class="alert alert-success"><?=$msg?></div>
<?php } ?>
<?php

$this->render("computerForm",["item"=>$item,"labels"=>$labels]);