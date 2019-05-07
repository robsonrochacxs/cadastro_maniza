<?php
    if(count($_POST) > 0){
        $insere = new stdClass();
        $insere->nome_cliente = $_POST['nome_cliente'];
        $insere->contato_cliente = $_POST['contato_cliente'];
        $insere->email_cliente = $_POST['email_cliente'];
        $insere->fone_cliente = $_POST['fone_cliente'];
        $insere->imagem_cliente = $_POST['imagem_cliente'];
        $model->insert('clientes',$insere);
        rename($path.'uploads/temp/'.$_POST['imagem_cliente'],$path.'uploads/'.$_POST['imagem_cliente']);
        header('Location:'.$base.'clientes');
        }
?>

<form id="imagem" action="pages/clientes/envia_imagem.php" method="post" enctype="multipart/form-data">
    <label>
        <p>Imagem</p>
        <input type="file" name="file" required>
        <div class="previa"></div>
    </label>
</form>

<form method="POST">
        <input type="hidden" name="imagem_cliente">
    <label>
        <p>Nome</p>
        <input type="text" name="nome_cliente" required>
    </label>
    <label>
        <p>Contato</p>
        <input type="text" name="contato_cliente" required>
    </label>
    <label>
        <p>E-mail</p>
        <input type="email" name="email_cliente" required>
    </label>
    <label>
        <p>Telefone</p>
        <input type="text" name="fone_cliente" required>
    </label>
    <button type="submit">Salvar</button>
    </form>

<script type="text/javascript">
    $(document).ready(function(){
        
        $('input[name="file"]').change(function(){
            $('#imagem').submit();
        })

        $('#imagem').ajaxForm({
            beforeSend: function() {
                $('.previa').html('Enviando...');

            },
            uploadProgress: function(event, position,total, percentComplete) {
                console.log(percentComplete);
                $('.previa').html('Enviado '+percentComplete+'%');
                
            },
            success: function () {

            },
            complete: function(retorno) {
                console.log(retorno.responseText);
                $('input[name="imagem_cliente"]').val(retorno.responseText);
                $('.previa').html('<img width="100" src="uploads/temp/'+retorno.responseText+'">');
            }

        });
    })
</script>