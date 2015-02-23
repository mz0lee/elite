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
<dl class="dl-horizontal jumbotron">
    <dt><?= $labels["kod"] ?></dt>
    <dd><?= $item->kod ?></dd>
    <dt><?= $labels["vyrobca"] ?></dt>
    <dd><?= $item->vyrobca ?></dd>
    <dt><?= $labels["cena"] ?></dt>
    <dd><?= $item->cena ?> &euro;</dd>
    <dt><?= $labels["sklad"] ?></dt>
    <dd><?= $item->sklad ?></dd>
    <dt><?= $labels["procesor"] ?></dt>
    <dd><?= $item->procesor ?></dd>
    <dt><?= $labels["grafika"] ?></dt>
    <dd><?= $item->grafika ?></dd>
    <dt><?= $labels["pevny_disk"] ?></dt>
    <dd><?= $item->pevny_disk ?></dd>
    <dt><?= $labels["pamat"] ?></dt>
    <dd><?= $item->pamat ?></dd>
</dl>
<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="input-group">
        <label class="control-label">Poslať na adresu: </label>
    </div>
    <div class="input-group">
        <input class="form-control" type="email" name="email" placeholder="example@email.com">
        <span class="input-group-btn">
            <input class="btn btn-primary" type="submit" value="Poslať" name="submit">
        </span>
    </div>
</form>
