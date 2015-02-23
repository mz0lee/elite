<?php

/**
 * Error handler.
 *
 * @author zolmag
 */
class Error {

    private $errors = [];
    
    public function add($msg, $key=null) {
        if($key==null) {
            $this->errors[] = $msg;
        } else {
            $this->errors[$key] = $msg;
        }
        return $this;
    }
    
    public function getError($key) {
        return $this->errors[$key];
    }
    
    public function getErrors() {
        return $this->errors;
    }
    
    public function isError() {
        return !empty($this->errors);
    }
    
}
