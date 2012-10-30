
<?php
_body_home();

function _body_home(){
    $content = k::_direct_load();
    echo $content->html;
}
?>
