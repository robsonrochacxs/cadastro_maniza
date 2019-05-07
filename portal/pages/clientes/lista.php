<?php

    $clientes = $model->result('SELECT * FROM clientes ORDER BY nome_cliente ASC');

?>

<a class="adicionar" href="clientes/criar">Adicionar</a>


<table>
    <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Contato</th>
            <th>Email</th>
            <th>Telefone</th>
            <th><a class="deleta-selecionados" href="#">Deletar Selecionados</a></th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($clientes as $key => $cliente) { ?>
            <tr>
                <td><input type="checkbox" data="<?php echo $cliente->id_cliente; ?>"></td>
                <td><?php echo $cliente->nome_cliente; ?></td>
                <td><?php echo $cliente->contato_cliente; ?></td>
                <td><?php echo $cliente->email_cliente; ?></td>
                <td><?php echo $cliente->fone_cliente; ?></td>
                <td><a class="editar" href="clientes/editar/<?php echo $cliente->id_cliente; ?>">Editar</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){

        $('input[type="checkbox"]').change(function(){
            $('.deleta-selecionados').fadeOut();
            $('input[type="checkbox"]').each(function(){
                if($(this).is(':checked')){
                    $('.deleta-selecionados').fadeIn();
                }
            })
        });
        $('.deleta-selecionados').click(function(event){
            event.preventDefault();
            var ids_cliente = '';
            $('input[type="checkbox"]').each(function(){
                if($(this).is(':checked')){
                    ids_cliente += $(this).attr('data')+'-';
                }
            })
            ids_cliente = ids_cliente.slice(0, -1);
            window.location.href = "<?php echo $base; ?>clientes/deletar/"+ids_cliente; 
        });
    });
</script>