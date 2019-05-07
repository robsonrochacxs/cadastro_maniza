<?php
    if(!isset($_SESSION['usuario'])){
        header('Location: '.$base.'login');
    }
?>