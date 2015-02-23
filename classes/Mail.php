<?php
/**
 * Description of Mail
 *
 * @author mzolee
 */
class Mail {
    public $from,
           $fromName = '',
           $to,
           $toName = '',
           $subject,
           $htmlTpl,
           $templateDir,
           $errorHandler,
           $textParams
           ;

    public function setFrom($from) {
        $this->from = $from;
        return $this;
    }

    public function setFromName($fromName) {
        $this->fromName = $fromName;
        return $this;
    }

    public function setToName($toName) {
        $this->toName = $toName;
        return $this;
    }

    public function setTo($to) {
        $this->to = $to;
        return $this;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }

    public function setHtmlTpl($htmlTpl) {
        $this->htmlTpl = $htmlTpl;
        return $this;
    }

    public function setTemplateDir($templateDir) {
        $this->templateDir = $templateDir;
        return $this;
    }

    public function setErrorHandler(Error $errorHandler) {
        $this->errorHandler = $errorHandler;
        return $this;
    }

    public function setTextParams($textParams) {
        $this->textParams = $textParams;
        return $this;
    }

    public function send() {
        $msgTplFile = "{$this->templateDir}/email.{$this->htmlTpl}.php";
        if(!is_readable($msgTplFile)) {
            $this->errorHandler->add("Súbor $msgTplFile neexistuje!");
            return;
        }
        extract($this->textParams);
        ob_start();
        include $msgTplFile;
        $message = ob_get_clean();
        $headers = "MIME-Version: 1.0\r\n"
                . "Content-type:text/html;charset=UTF-8\r\n"
                . "From: {$this->fromName} <{$this->from}>\r\n";

        mail($this->to,$this->subject,$message,$headers);
    }
    
}
