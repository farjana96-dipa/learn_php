<?php

class java{
    public $lang;
    public $framework;
    
    public function setLang($a){
        $this->lang = $a;
    }
    public function getLang(){
        return $this->lang;
    }

    public function setFramework($a){
        $this->framework = $a;
    }

    public function getFramework(){
        return $this->framework;
    }

    public function __clone(){
        $l = new java;
        $l->setFramework($this->framework);
        return $l;
    }
}

?>
