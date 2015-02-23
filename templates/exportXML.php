<h1>Export XML</h1>
<?php foreach ($errors->getErrors() as $error) { ?>
<div class="alert alert-danger"><?=$error?></div>
<?php } ?>
<?php if($msg!=''){ ?>
<div class="alert alert-success"><?=$msg?></div>
<?php } ?>
<br />
<br />
<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input class="btn btn-primary center-block col-lg-6" type="submit" value="Export" name="submit">
    </div>
</form>
    