<?php

    include_once 'autoload.php';
    
    $page     = isset($_GET['page']) ? $_GET['page'] : 'home';
    $id       = isset($_GET['id']) && preg_match("/^\d{1,5}$/", $_GET['id']) ? $_GET['id'] : '';
    $orderBy  = isset($_GET['orderBy']) ? $_GET['orderBy'] : 'id';
    $orderDir = isset($_GET['orderDir']) ? $_GET['orderDir'] : 'ASC';
    
    $ctrl = new Controller();
    
    $ctrl->templater->render("header",["page"=>$page]);

    if(method_exists($ctrl, $page)) {
        $ctrl->id = $id;
        $ctrl->orderBy = $orderBy;
        $ctrl->orderDir = $orderDir;
        $ctrl->post = $_POST;
        $ctrl->$page();
    }

    $ctrl->templater->render("footer");

    $ctrl->templater->outputAllRendered();
