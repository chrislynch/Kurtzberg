<?php

class _seo extends app {
    
    public function go(&$k){
        $this->keywords = $k->__config->seo->keywords;
        $this->description = $k->__config->seo->description;
        $this->abstract = $k->__config->seo->abstract;
        
    }
    
}
?>
