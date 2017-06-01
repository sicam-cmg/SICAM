<?php require_once '../../configuracao.php'; ?>
<?php require_once 'funcoes.php'; ?>
<?php require_once DBAPI; ?>
<?php require_once VERIFICA_LOGADO; ?>
<?php require_once VERIFICA_NVCPF; ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!--Compatibilidade com versões mais antigas de navegadores-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="ttps://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login e Senha</title>
        <!--CDN do Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css-formularios/estilo.css" >
    </head>

    <body> 
<?php include(CABECALHO_TEMPLATE); ?>  

        <div class="container" id="Div-Container-Geral-Dados-Pessoais">
            
            <!--Barra de navegação da tabela com LOGIN E SENHA ativos-->  
            <div>
                <ul class="nav nav-tabs">
                    <li><a href="index-formulario.php">Dados Pessoais</a></li>
                    <li><a href="escolaridade.php">Escolaridade</a></li>
                    <li><a href="contrato.php">Dados do Contrato</a></li>
                    <li><a href="banco.php">Informações Bancárias</a></li>
                    <li class="active"><a href="#">Gerar Login e Senha</a></li>
                </ul>
            </div>
            <h6>*O login e senha a seguir devem ser usados para o primeiro acesso. Para alterar a senha ir ao menu "Perfil".</h6>
            <!-- -->
            <div class="centralizar-login-senha">
                <fieldset>

                    <!--Login-->
                    <div class="row">
                        <div class="col-md-5 col-lg-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span> 
                                    <input class="form-control" placeholder="Usuário" name="loginname" type="text" autofocus value='<?php echo $_SESSION['nvlogin']; ?>' >
                                </div>
                            </div>

                            <!--Senha-->
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                                    <input class="form-control" placeholder="Senha" name="password" type="text"  value='<?php echo $_SESSION['nvsenha']; ?>' >
                                </div>
                            </div>
                            
                            <div class="form-group" style="">
								<a href="../index.php"> <button class="btn btn-primary" >Concluir</button></a>
							</div>
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>  <!--Fim container-->

<?php include(CABECALHO_TEMPLATE); ?>  

    </body>
</html>
