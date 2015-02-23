<?php

/**
 * Description of Templater
 *
 * @author zolmag
 */
class Templater {
    
    private $templateDir;
    
    /**
     * If true, render method will save all html data into $html and might be
     * rendered later with renderAll method. Otherwise it will render immediately.
     * @var Boolean
     */
    private $postRendering = true;
    
    private $outputBlocked = false;
    
    private $html = '';
    
    public function setTemplateDir($templateDir) {
        $this->templateDir = $templateDir;
    }

    public function setPostRendering($postRendering) {
        $this->postRendering = $postRendering;
    }
    
    public function setOutputBlocked($outputBlocked) {
        $this->outputBlocked = $outputBlocked;
    }

    public function render($name, $params=null) {
        if($params !== null) {
            extract($params);
        }
        // If rendering already started, eg. render has bein called from a template,
        // just output the included file. It will be buffered at the top level of rendering.
        if(ob_get_level()) {
            include "{$this->templateDir}/$name.php";
            return;
        }
        ob_start();
        include "{$this->templateDir}/$name.php";
        $this->html .= ob_get_clean();
        if(!$this->postRendering && !$this->outputBlocked){
            echo $this->html;
        }
    }
    
    public function outputAllRendered() {
        if(!$this->outputBlocked) {
            echo $this->html;
        }
        $this->html = '';
    }
    
}
