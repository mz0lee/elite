<?php

/**
 * Singleton Validator
 *
 * @author mzolee
 */
class Validator {
    
    public $errors = [];
    private static $inst = null;
    
    public static function getInstance() {
        if(self::$inst===null) {
            self::$inst = new Validator();
        }
        return self::$inst;
    }
    
    private function __construct() {}
    
    public function validate($regexp,$subject,$msg) {
        $valid = preg_match($regexp, $subject);
        if(!$valid) {
            $this->errors[] = $msg;
        }
        return $valid;
    }
}
