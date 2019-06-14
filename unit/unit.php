<?php
function move_on($path){
    header('Location:'.$path);
}
function render($path,$list=null){
    require_once(ROOT_PATH. $path);
} 
?>