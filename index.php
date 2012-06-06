<?php

include_once('kurtzberg.php');
$page = array();
$page['posts'] = k_scan();

foreach($page['posts'] as $post){
    print $post;
}

?>
