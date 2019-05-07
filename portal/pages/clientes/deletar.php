<?php
    $ids = explode('-',$_GET['ids_cliente']);
    foreach ($ids as $key => $id) {
        $cliente = $model->row('SELECT * FROM clientes WHERE id_cliente = "'.$id.'"');
        $model->query('DELETE FROM clientes WHERE id_cliente = "'.$id.'"');
        @unlink($path.'uploads/'.$cliente->imagem_cliente);
    }
    header('Location:'.$base.'clientes');
?>