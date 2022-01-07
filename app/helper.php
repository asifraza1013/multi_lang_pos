<?php
/**
 * check asset
 */
if (!function_exists('ast_url')) {
    function ast_url($url){
        return 'http://localhost:8888/pos/public/'.$url;
    }
}