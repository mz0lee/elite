<h1>Nový počítač</h1>
<?php foreach ($errors->getErrors() as $error) { ?>
<div class="alert alert-danger"><?=$error?></div>
<?php } ?>
<?php if($msg!=''){ ?>
<div class="alert alert-success"><?=$msg?></div>
<?php } ?>

<?php
$this->render("computerForm",["item"=>$item,"labels"=>$labels]);
