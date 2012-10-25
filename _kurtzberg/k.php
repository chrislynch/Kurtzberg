<?php

class k {
    
    static function _default_load($urlpath = ''){
        
        $root = toolbox::index_root();
        $file = '';
        if (strlen($urlpath) == 0){ $urlpath = $_SERVER['REQUEST_URI']; $urlpath = str_ireplace($root, '', $urlpath);}
        if (strlen($urlpath) == 0){ $urlpath = '_default'; }
        
        if (is_dir('_content/_default/' . $urlpath)){
            // $file = '_content/_default/' . $urlpath . '/' . toolbox::pop('/',$urlpath) . '.html';
            $file = '_content/_default/' . $urlpath . '/' . toolbox::pop('/',$urlpath);
        }
        
        if ($file == '') {
            toolbox::http_redirect('error/404',404);
        } else {
            $thing = new thing;
            if ($thing->load($file)) {
                print_r($thing);
            } else {
                toolbox::http_redirect('error/404',404);
            }
        }
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
        if (file_exists("$path.html")){
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
    
    static function http_redirect($to,$redirectCode = 301) {
        if (!strstr($to,'http')){
            $to = 'http://' . $_SERVER['SERVER_NAME'] . toolbox::index_root() . $to;
        }
        header('Location: ' . $to, $redirectCode);
        die();
    }
}

include_once('_kurtzberg/lib/phpmarkdownextra/markdown.php');

$page = array();
$page['posts'] = k_scan();

function k_scan(){
    // Look at the current URL and, based on it, load up the appropriate content
    $return = array();
    $files = scandir(('_content'));
    foreach($files as $file){
        if (!is_dir($file)){
            $file = explode('-',$file);
            if (is_numeric($file[0])){
                $file = implode('-',$file);
                $return[$file] = k_load($file);
            }
        }
    }
    return $return;
}

function k_load($filename){
    $contents = file_get_contents('_content/' . $filename);
    $return = new post();
    $return->title = ucwords(str_ireplace('-', ' ', $filename));
    $return->content = Markdown($contents);
    return $return;
}

class post extends stdClass{
    
}

?>
