<h1>Import XML</h1>
<?php foreach ($errors->getErrors() as $error) { ?>
<div class="alert alert-danger"><?=$error?></div>
<?php } ?>
<?php if($msg!=''){ ?>
<div class="alert alert-success"><?=$msg?></div>
<?php } ?>
<br />
<br />
<form class="form-inline" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input class="" type="file" name="file" id="file">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Import" name="submit">
    </div>
</form>
    