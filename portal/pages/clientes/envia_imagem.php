<?php
    include '../../includes/config.php';
    if ($_FILES['file']) {
            $filename = date('YmdHis').$_FILES['file']['name'];
            $destino = $path.'uploads/temp/';
            move_uploaded_file($_FILES['file']['tmp_name'], $destino.$filename);
            chmod($destino.$filename, 0777);
            echo $filename;
        }
?>