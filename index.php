<?php

include ('_k/k.php');
$k = new k();

?>

<html>
    <head>
        <title>
            Codename K
        </title>
    </head>
    <body>
        <div id="header">
            <?php
            $body = k::_recursive_load('_view', '_header');
            print $body->html;
            ?>
        </div>
        <div id="content">
            <div id="content-header"></div>
            <div id="content-content">
                <div id="content-content-sidebar-left">
                    
                </div>
                <div id="content-content-content">
                    <div id="content-content-content-header"></div>
                    <div id="content-content-content-content">
                        <?php
                            $body = k::_recursive_load('_view', '_body');
                            print $body->html;
                        ?>
                    </div>
                    <div id="content-content-content-footer"></div>
                </div>
                <div id="content-content-sidebar-right">
                    
                </div>
            </div>
            <div id="content-footer"></div>
        </div>
        <div id="footer">
            
        </div>
    </body>
</html>