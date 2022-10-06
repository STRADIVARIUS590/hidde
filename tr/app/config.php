<?php
session_start();
 if(!isset($_SESSION['gbtoken'])){
    $_SESSION['gbtoken'] =  md5( uniqid( mt_rand(), true ) );
 }

 if(!defined('BASE_PATH')){
    define('BASE_PATH', 'http://localhost/tr/');
 }
?>