<?php

class __config extends app {
    
    public function go(&$k){
        $this->site = new stdClass();
        $this->site->title = 'This is a codename K website.';
        $this->site->copyright = 'Copyright eCommerce Centric Ltd except where noted';
        
        $this->_geo = new stdClass();
        $this->_geo->region = 'GB-VGL';
        $this->_geo->placename = 'Taff\'s Well';
        $this->_geo->position = '51.563899;-3.264585';
        $this->_geo->ICBM = '51.563899, -3.264585';
        
        $this->seo = new stdClass();
        
        $this->seo->keywords = 'Default Keywords';
        $this->seo->description = 'Default Description';
        $this->seo->abstract = 'Default Abstract';
        
        $this->seo->google = new StdClass();
        $this->seo->google->analytics = new StdClass();
        $this->seo->google->analytics->account = '';
    }
    
}
?>
