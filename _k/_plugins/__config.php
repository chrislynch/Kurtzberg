<?php

class __config extends app {
    
    public function go(&$k){
        $this->site = new stdClass();
        $this->site->title = 'This is a codename K website.';
        $this->site->copyright = 'Copyright eCommerce Centric Ltd except where noted';
    }
    
}
?>
