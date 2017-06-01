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
        <title>Dados Escolares</title>
        <!--CDN do Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css-formularios/estilo.css" >
    </head>

    <body> 

		<?php include(CABECALHO_TEMPLATE); ?>    

        <div class="container" id="Div-Container-Geral-Dados-Pessoais">
            
            <!--Barra de navegação da tabela com DADOS ESCOLARES ativos-->  
            <div>
                <ul class="nav nav-tabs">
                    <li><a href="index.php">Dados Pessoais</a></li>
                    <li class="active"><a href="#">Escolaridade</a></li>
                    <li><a href="contrato.php">Dados do Contrato</a></li>
                    <li><a href="banco.php">Informações Bancárias</a></li>
                    <li><a href="login-senha.php">Gerar Login e Senha</a></li>
                </ul>
            </div>

            <!--Formulário da escolaridade-->
            <div id='Formulario' class="row col col-md-12 col-lg-12">                
                <div class="row ">
                    <form method="POST"> <!--Linha 1 -->
                        <div class="col-md-6 col-lg-6 form-group">
                            <label for="curso" >Curso:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-education"></i>
                                </span> 
                                <input type="text" class="form-control" id="curso" name="curso" required='required'>
                            </div>
                        </div> 

                        <div class="col-md-6 col-lg-6 form-group">
                            <label for="instituicao" >Instituição de Ensino:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-education"></i>
                                </span> 
                                <input type="text" class="form-control" id="instituicao" name="instituicao" required='required'>
                            </div>
                        </div> 
					</div>
				</div><!--Fim formulario dados escolares-->

				<!--Botões-->
				<div> 
					<div id="actions" class="row">
						<div class="col-md-12 col-lg-12">
							<a href="#"> <button type="submit" class="btn btn-primary" name='continuar_escolaridade'>Continuar</button></a>
							<a href="../index.php" class="btn btn-default">Cancelar</a>
						</div>
					</div> 
				</div>    
            </form>
        </div>  <!--Fim container-->

		<?php include(RODAPE_TEMPLATE); ?>
        
    </body>
</html>
