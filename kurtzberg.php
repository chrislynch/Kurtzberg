<?php

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
    return file_get_contents('_content/' . $filename);
}

?>
