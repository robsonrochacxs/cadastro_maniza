<!DOCTYPE html>
<?php
    include 'includes/config.php';
    include_once 'classes/Model.php';

    $model = new Model();

    if($_POST){

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = $model->row('SELECT * FROM usuarios WHERE email_usuario = "'.$email.'" AND senha = "'.md5($senha).'"');

    if($usuario) {

        $_SESSION['usuario'] = $usuario;
        header('Location: '.$base.'dashboard');
    } else {
        $erro = 'E-mail e senha incorretos';
    }
}

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    
    <base href="<?php echo $base; ?>"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/responsive.css">

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
  
    <div id="login">
        <form action="login" method="POST">
            <div class="box">
                <h3>Painel de Controle</h3>

                <?php if(isset($erro)){ ?>
                <h4><?php echo $erro; ?></h4>
                <?php } ?>

                <label for="email">
                    <p>E-mail</p>
                    <input type="email" id="email" name="email" require>

                    <label for="senha">
                    <p>Senha</p>
                    <input type="password" id="senha" name="senha" require>

                    <button type="submit">Entrar</button>

                </label>
            
            </div>
        </form>
    </div>
</body>
</html>