<?php

/**
 * Base class
 *
 * @author zolmag
 */
class Base {
    
    public $errorHandler;
    public $validator;
    public $mail;
    public $templater;
    public $post = [];
    
    function __construct() {
        $this->errorHandler = new Error();
        
        $this->validator = new Validator();
        $this->validator->setErrorHandler($this->errorHandler);
        
        $this->mail = new Mail();
        $this->mail->setErrorHandler($this->errorHandler)
                   ->setTemplateDir(AppConf::$templatesDir);
        
        $this->templater = new Templater();
        $this->templater->setTemplateDir(AppConf::$templatesDir);
    }

    public function isPostSubmitted() {
        return !empty($this->post);
    }
    
}
