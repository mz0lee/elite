<form method="post" class="form-horizontal jumbotron" role="form">
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["nazov"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="nazov" value="<?= $item->nazov ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["kod"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="kod" value="<?= $item->kod ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["vyrobca"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="vyrobca" value="<?= $item->vyrobca ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["cena"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="number" min="0" step="0.01" name="cena" value="<?= $item->cena ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["sklad"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="number" min="1" name="sklad" value="<?= $item->sklad ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["procesor"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="procesor" value="<?= $item->procesor ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["grafika"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="grafika" value="<?= $item->grafika ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["pevny_disk"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="pevny_disk" value='<?= $item->pevny_disk ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3"><?= $labels["pamat"] ?></label>
        <div class="col-sm-9">
            <input class="form-control" type="text" name="pamat" value="<?= $item->pamat ?>">
        </div>
    </div>
    <input type="hidden" name="action" value="<?=$action?>">
    <input class="btn btn-primary pull-right" type="submit" name="Submit" value="Uložiť">
</form>

