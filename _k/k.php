<?php

include_once('_k/lib/phpmarkdownextra/markdown.php');

class k {
    
    function go(){
        /*
         * Run a K page
         * 1: Load amd run the default apps
         *      Apps of this type should be used for non-URL specific activity
         *      such as loading up a user, a users cart, or tracking activity,
         *      or loading up a site wide configuration file
         * 
         * 2: Load content for all sections
         *      Content, in this context, can include PHP code
         *      This is what happens for a *specific* URL
         * 
         * 3: Run post-content apps (?)
         *      Somtimes, we need to work things out by looking at our content
         *      a good example is SEO. So, we do this afterwards.
         * 
         * 4: Load the view that all will output this content
         *      Whatever happens, we have to load up a view and output the result
         */
    }
    
    static function load_default_apps(){
        // Go and load up the apps for this site.
        $appfiles = scandir('_k/_apps/');
        foreach($appfiles as $appfile){
            if (strstr($appfiles,'.php')){
                
            }
        }
    }
    
    static function _direct_load($type = '_content', $section = '_body', $urlpath = ''){
        
        $root = toolbox::index_root();
        $file = '';
        if (strlen($urlpath) == 0){ $urlpath = $_SERVER['REQUEST_URI']; $urlpath = str_ireplace($root, '', $urlpath);}
        if (strlen($urlpath) == 0){ $urlpath = '_home'; }
        
        $file = k::locate("$type/$section/" . $urlpath);
        
        if ($file == '') {
            if ($section == '_home'){
                toolbox::http_redirect('error/404',404);
            } else {
                toolbox::http_redirect('error/500',500);
            }
        } else {
            $thing = new thing;
            if ($thing->load($file)) {
                return $thing;
            } else {
                toolbox::http_redirect('error/500',500);
            }
        }
    }
    
    static function _recursive_load($type = '_content', $section = '_body',$urlpath = '',$recursion = FALSE) {
 
        $root = toolbox::index_root();
        $file = '';
        if (strlen($urlpath) == 0 && !$recursion){ $urlpath = $_SERVER['REQUEST_URI']; $urlpath = str_ireplace($root, '', $urlpath);}
        if (strlen($urlpath) == 0){ $urlpath = '_home'; }
        
        $file = k::locate("$type/$section/" . $urlpath);

        if ($file == '') {
            if (!($urlpath == '_home')){
                $urlpath = toolbox::up('/',$urlpath);
                return k::_section_load($section,$urlpath,TRUE);
            } else {
                return new thing();
            }
        } else {
            $thing = new thing;
            if ($thing->load($file)) {
                return $thing;
            } else {
                toolbox::http_redirect('error/500',500);
            }
        }
        
    }
    
    private static function locate($urlpath) {
        $file = '';
        if (is_dir("_site/" . $urlpath)){
            $file = "_site/" . $urlpath . '/' . toolbox::pop('/',$urlpath);
        } elseif (is_dir("_k/" . $urlpath)){
            $file = "_k/" . $urlpath . '/' . toolbox::pop('/',$urlpath);
        }
        return $file;
    }
    
    
}

class thing {
    
    public $html;
    public $xml;
    
    function __construct() {
        $this->html = '';
        $this->xml = new SimpleXMLElement('<xml></xml>');
    }
    
    function load($path){
        $return = FALSE;
        if (file_exists("$path.php")){
            ob_start();
            include("$path.php");
            $this->html = ob_get_clean();
            ob_flush();
            $return = TRUE;
        } elseif (file_exists("$path.html")){
            $this->html = file_get_contents("$path.html");
            $return = TRUE;
        }
        
        if (file_exists("$path.xml")){
            $this->xml = simplexml_load_file("$path.xml");
            $return = TRUE;
        }
        return $return;
    }
    
}

class toolbox {
    
    static function index_root(){
        $root = str_ireplace('index.php', '', str_ireplace('./', '', $_SERVER['PHP_SELF']));
        return $root;
    }
    
    static function pop($separator,$string){
        $popper = explode($separator,$string);
        return array_pop($popper);
    }
    
    static function up($separator,$string){
        $popper = explode($separator,$string);
        array_pop($popper);
        return implode($separator,$popper);
    }
    
    static function http_redirect($to,$redirectCode = 301) {
        if (!strstr($to,'http')){
            $to = 'http://' . $_SERVER['SERVER_NAME'] . toolbox::index_root() . $to;
        }
        header('Location: ' . $to, $redirectCode);
        die();
    }
}

?>
