<?php
    $cliente = $model->row('SELECT * FROM clientes WHERE id_cliente = "'.$_GET['id_cliente'].'"');
    if(count($_POST) > 0){
        $altera = new stdClass();
        $altera->nome_cliente = $_POST['nome_cliente'];
        $altera->contato_cliente = $_POST['contato_cliente'];
        $altera->email_cliente = $_POST['email_cliente'];
        $altera->fone_cliente = $_POST['fone_cliente'];
        $altera->imagem_cliente = $_POST['imagem_cliente'];
        $model->update('clientes',$altera, 'id_cliente = "'.$_GET['id_cliente'].'"');
        
        if($_POST['imagem'] != $_POST['imagem_apagar']){
            @unlink($path.'uploads/'.$_POST['imagem_apagar']);
            rename($path.'uploads/temp/'.$_POST['imagem'],$path.'uploads/'.$_POST['imagem']);
        }

        header('Location:'.$base.'clientes');
    }
?>

<form id="imagem" action="pages/clientes/envia_imagem.php" method="post" enctype="multipart/form-data">
    <label>
        <p>Imagem</p>
        <input type="file" name="file">
        <div class="previa">
            <img width="100" src="uploads/<?php echo $cliente->imagem_cliente; ?>">
        </div>
    </label>
</form>

<form method="POST">
<input type="hidden" name="imagem_cliente" value="<?php echo $cliente->imagem_cliente; ?>">
<input type="hidden" name="imagem_apagar" value="<?php echo $cliente->imagem_cliente; ?>">
    <label>
        <p>Nome</p>
        <input type="text" name="nome_cliente" value="<?php echo $cliente->nome_cliente; ?>" required>
    </label>
    <label>
        <p>Contato</p>
        <input type="text" name="contato_cliente" value="<?php echo $cliente->contato_cliente; ?>" required>
    </label>
    <label>
        <p>E-mail</p>
        <input type="email" name="email_cliente" value="<?php echo $cliente->email_cliente; ?>" required>
    </label>
    <label>
        <p>Telefone</p>
        <input type="text" name="fone_cliente" value="<?php echo $cliente->fone_cliente; ?>" required>
    </label>
    <button type="submit">Salvar</button>
</form>

<script type="text/javascript">

	$(document).ready(function() {

        $('input[name="file"]').change(function(){
            $('#imagem').submit();
        })

        $('#imagem').ajaxForm({
			beforeSend: function() {
                $('.previa').html('Enviando...');
			},
			uploadProgress: function(event, position, total, percentComplete) {
                console.log(percentComplete);
                $('.previa').html('Enviado '+percentComplete+'%');
			},
			success: function() {
                
			},
			complete: function(retorno) {
                console.log(retorno.responseText);
                $('input[name="imagem_cliente"]').val(retorno.responseText);
                $('.previa').html('<img width="100" src="uploads/temp/'+retorno.responseText+'">');
			}
        });
        

    })

</script>