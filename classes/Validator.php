<?php

/**
 * Singleton Validator
 *
 * @author mzolee
 */
class Validator {

    private $errorHandler;

    function __construct() {
        
    }

    public function setErrorHandler(Error $errorHandler) {
        $this->errorHandler = &$errorHandler;
    }

    /**
     * Validator of one value. Returns true if subject is valid, false otherwise.
     * @param mixed $cmp
     * @param mixed $subject
     * @param string $type Type of validator to use ( reg | min )
     * @param string $msg Error message if validator returns false.
     * @param string $key Optional Key to use when storing error message in ErrorHandler.
     * @return boolean
     */
    public function validate($cmp, $subject, $type, $msg, $key=null) {
        $validatorMethod = "validate" . ucfirst($type);
        if(method_exists($this, $validatorMethod)) {
            return $this->$validatorMethod($cmp, $subject, $msg, $key=null);
        } else {
            $this->errorHandler->add("Validator Method '$validatorMethod' doesn't exists!");
            return false;
        }
    }
    
    public function validateReg($regexp, $subject, $msg, $key=null) {
        $valid = preg_match($regexp, $subject);
        if (!$valid) {
            $this->errorHandler->add($msg, $key);
        }
        return $valid;
    }

    public function validateMin($min, $subject, $msg, $key=null) {
        $valid = $min < $subject;
        if(!$valid) {
            $this->errorHandler->add($msg, $key);
        }
        return $valid;
    }
    
    public function validateMax($max, $subject, $msg, $key=null) {
        $valid = $max > $subject;
        if(!$valid) {
            $this->errorHandler->add($msg, $key);
        }
        return $valid;
    }
    
    public function validateInArray($array, $subject, $msg, $key=null) {
        $valid = in_array($subject, $array);
        if(!$valid) {
            $this->errorHandler->add($msg, $key);
        }
        return $valid;
    }
    
    public function validateAll($data, $rules) {
        $valid = true;
        foreach ($data as $field => $value) {
            $i = 0;
            while (isset($rules[$field][$i])) {
                $valid = $this->validate(
                                $rules[$field][$i]["rule"], $value, $rules[$field][$i]["type"], $rules[$field][$i]["err"]
                        ) && $valid;
                $i++;
            }
        }
        return $valid;
    }

}
