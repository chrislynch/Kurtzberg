<?php

include_once('_k/lib/phpmarkdownextra/markdown.php');

class k {
    
    var $_content;
    var $_view;
    
    function __construct(){
        $this->_content = new stdClass();
        $this->_view = new stdClass();
    }
    
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
        $this->go_apps('__');
        $this->go_content();
        /* $this->go_apps('_'); */
        $this->go_view();
    }
    
    function output(){
        print $this->_view->_head->html;
        print $this->_view->_body->html;
    }
    
    function debug(){
        print '<hr><pre>' . htmlentities(print_r($this,TRUE)) . '</pre>';
    }
    
    private function go_apps($prefix){
        // Go and load up the apps for this site.
        $appfiles = scandir('_k/_plugins/');
        foreach($appfiles as $appfile){
            if (strstr($appfile,'.php')){
                if(strpos($appfile,$prefix) === 0){
                    $classname = str_ireplace('.php', '', $appfile);
                    include "_k/_plugins/$appfile";
                    $this->$classname = new $classname;
                    $this->$classname->go($this);
                }
            }
        }
    }
    
    private function go_content(){
        // Do the direct load for content.
        $this->_content->_body = $this->_direct_load();
        // Do the section load for content. We will never get here if direct load 404s or 500s.
        // We should look for content sections in the domain as well as in the _k directory.
        $contentdirs = scandir('_k/_content');
        foreach($contentdirs as $contentdir){
            if (is_dir("_k/_content/$contentdir") && $contentdir !== '.' && $contentdir !== '..' && $contentdir !== '_body'){
                $this->_content->$contentdir = $this->_recursive_load('_content', $contentdir);
            }
        }
    }
    
    private function go_view(){
        // Do the section load for content. We will never get here if direct load 404s or 500s.
        // We should look for view sections in the domain as well as in the _k directory.
        $viewdirs = scandir('_k/_view');
        foreach($viewdirs as $viewdir){
            if (is_dir("_k/_view/$viewdir") && $viewdir !== '.' && $viewdir !== '..' && $viewdir !== '_body' && $viewdir !== '_head'){
                $this->_view->$viewdir = $this->_recursive_load('_view', $viewdir);
            }
        }
        $this->_view->_body = $this->_recursive_load('_view','_body');
        $this->_view->_head = $this->_recursive_load('_view','_head');
    }
    
    private function _direct_load($type = '_content', $section = '_body', $urlpath = ''){
        
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
            if ($thing->load($file,$this)) {
                return $thing;
            } else {
                toolbox::http_redirect('error/500',500);
            }
        }
    }
    
    private function _recursive_load($type = '_content', $section = '_body',$urlpath = '',$recursion = FALSE) {
 
        $root = toolbox::index_root();
        $file = '';
        if (strlen($urlpath) == 0 && !$recursion){ $urlpath = $_SERVER['REQUEST_URI']; $urlpath = str_ireplace($root, '', $urlpath);}
        if (strlen($urlpath) == 0){ $urlpath = '_home'; }
        
        $file = k::locate("$type/$section/" . $urlpath);

        if ($file == '') {
            if (!($urlpath == '_home')){
                $urlpath = toolbox::up('/',$urlpath);
                return k::_recursive_load($type,$section,$urlpath,TRUE);
            } else {
                return new thing();
            }
        } else {
            $thing = new thing;
            if ($thing->load($file,$this)) {
                return $thing;
            } else {
                toolbox::http_redirect('error/500',500);
            }
        }
        
    }
    
    public function locate($urlpath) {
        $file = '';
        if (is_dir("_site/" . $urlpath)){
            $file = "_site/" . $urlpath . '/' . toolbox::pop('/',$urlpath);
        } elseif (is_dir("_k/" . $urlpath)){
            $file = "_k/" . $urlpath . '/' . toolbox::pop('/',$urlpath);
        }
        return $file;
    }
    
    function domain(){
        global $argv;
        if (isset($argv[1])){
            return $argv[1];
        } else {
            return $_SERVER['HTTP_HOST'] . toolbox::index_root();
        }
    }
    
}

class thing {
    
    public $html;
    public $xml;
    public $path;
    
    function __construct() {
        $this->html = '';
        $this->xml = new SimpleXMLElement('<xml></xml>');
    }
    
    function load($path,$k){
        $return = FALSE;
        $this->path = $path;
        
        if (file_exists("$path.php")){
            ob_start();
            include("$path.php");
            $this->html = ob_get_clean();
            ob_flush();
            $return = TRUE;
        } elseif (file_exists("$path.html")){
            $this->html = file_get_contents("$path.html");
            $this->html = Markdown($this->html);
            $return = TRUE;
        }
        
        if (file_exists("$path.xml")){
            $this->xml = simplexml_load_file("$path.xml");
            $return = TRUE;
        }
        return $return;
    }
    
}

class app extends stdClass{
    
    function go(&$k){
        
    }
    
}

class view extends thing{
    /*
     * In case we ever need to differentiate views from things.
     */
}

/*
 * TOOLBOX : Useful functions for K
 */

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
