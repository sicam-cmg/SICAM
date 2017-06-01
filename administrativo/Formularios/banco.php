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
        <title>Dados Bancários</title>
        <!--CDN do Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css-formularios/estilo.css" >
    </head>

    <body> 

    <?php include(CABECALHO_TEMPLATE); ?>   

        <div class="container" id="Div-Container-Geral-Dados-Pessoais">
            
            <!--Barra de navegação da tabela com DADOS BANCÁRIOS ativos-->  
            <div>
                <ul class="nav nav-tabs">
                    <li><a href="index-formulario.php">Dados Pessoais</a></li>
                    <li><a href="escolaridade.php">Escolaridade</a></li>
                    <li><a href="contrato.php">Dados do Contrato</a></li>
                    <li class="active"><a href="#">Informações Bancárias</a></li>
                    <li><a href="login-senha.php">Gerar Login e Senha</a></li>
                </ul>
            </div>

            <!--Formulário de Informações Bancárias-->
            <div id='Formulario' class="row col col-md-12 col-lg-12">                
                <div class="row">

                    <form method="POST"> <!--Linha 1 -->
                        <div class="col-md-4 col-lg-4 form-group">
                            <label for="banco" >Banco:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span> 
                                <input type="text" class="form-control" id="banco" name="banco" required='required'>
                            </div>
                        </div>  

                        <div class="col-md-2 col-lg-2 form-group">
                            <label for="agencia" >Agência:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th"></i>
                                </span> 
                                <input type="text" class="form-control" id="agencia" name="agencia" required='required'>
                            </div>
                        </div> 

                        <div class="col-md-2 col-lg-2 form-group">
                            <label for="operacaoBancaria" >Operação:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-list"></i>
                                </span> 
                                <input type="text" class="form-control" id="operacaoBancaria" name="operacaoBancaria" required='required'>
                            </div>
                         </div>

                        <div class="col-md-4 col-lg-4 form-group">
                            <label for="conta" >Conta:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th"></i>
                                </span> 
                                <input type="text" class="form-control" id="conta" name="conta" required='required'>
                            </div>
                        </div>

					</div>
				</div><!--Fim formulario dados bancários-->

				<!--Botões-->
				<div> 
					<div id="actions" class="row">
						 <div class="col-md-12 col-lg-12">
							<a href="#"> <button type="submit" class="btn btn-primary" name='continuar_banco'>Continuar</button></a>
							<a href="../index.php" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</div>  
            </form>
              
        </div>  <!--Fim container-->


        <?php include(RODAPE_TEMPLATE); ?>  

    </body>
</html>
