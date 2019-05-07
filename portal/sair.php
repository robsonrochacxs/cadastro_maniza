<?php
    include 'includes/config.php';
    unset($_SESSION['usuario']);
    header('Location: '.$base.'login');
?>