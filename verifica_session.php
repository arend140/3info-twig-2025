<?php
require('inc/banco.php');

if(!isset($_SESSION['login'])){
    header('location: login.php');
}