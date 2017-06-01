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
        <title>Dados do Contrato</title>

        <!--PASTA CSS DOS FORMULÁRIOS -->
        <link rel="stylesheet" href="css-formularios/estilo.css" >


                    <!--ABAIXO: LINKs e SCRIPTs necessários para DATE PICKER do BOOTSTRAP -->
					
        <!--CDN do Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">        
        <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap Date-Picker -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"/>
        <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />        
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        

        <!--PASTA JS DOS FORMULÁRIOS -->
        <script type="text/javascript" src="js-formularios/date.js"></script>
    </head>

    <body> 
    <?php include(CABECALHO_TEMPLATE); ?>   

        <div class="container" id="Div-Container-Geral-Dados-Pessoais">
            
            <!--Barra de navegação da tabela com DADOS CONTRATO ativos-->  
            <div>
                <ul class="nav nav-tabs">
                    <li><a href="index.php">Dados Pessoais</a></li>
                    <li><a href="escolaridade.php">Escolaridade</a></li>
                    <li class="active"><a href="#">Dados do Contrato</a></li>
                    <li><a href="banco.php">Informações Bancárias</a></li>
                    <li><a href="login-senha.php">Gerar Login e Senha</a></li>
                </ul>
            </div>

            <!--Formulário do contrato-->
			<form method="POST"> 
				<div id='Formulario' class="row col col-md-12 col-lg-12">                
					<div class="row">
						<!--Linha 1 -->
							<div class="col-md-4 col-lg-4 form-group">
								<label >Convênio:</label>
								<label class="radio-inline"><input type="radio" name="optradio" required='required' value='ciee'>CIEE</label>
								<label class="radio-inline"><input type="radio" name="optradio" required='required' value='iel'>IEL</label>
							</div>
					</div>

					<div class="row">
						<!--Linha 2 -->
                        <div class="col-md-4 col-lg-4 form-group">
                            <label for="lotacao" >Lotação:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-check"></i>
                                </span> 
                                <input type="text" class="form-control" id="lotacao" name="lotacao" required='required'>
                            </div>
                        </div> 
                    
                        <div class="col-md-2 col-lg-2 form-group">
                            <label for="valor" >Valor:</label>
                             <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-usd"></i>
                                </span> 
                                <input type="text" class="form-control" id="valor" name="valor" required='required'>
                            </div>
                        </div> 
                   
                        <div class="col-md-6 col-lg-6 form-group">
                            <label for="supervisor" >Supervisor:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span> 
                                <input type="text" class="form-control" id="supervisor" name="supervisor" required='required'>
                            </div>
                        </div> 
						<!--Linha 3 -->
                        <div class="col-md-3 col-lg-3 form-group">
                            <label for="dataInicioEstagio" >Data de Início do Estágio:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input type="text" class="form-control" id="dataInicioEstagio" name='dataInicioEstagio' required='required'>
                            </div>
                        </div> 

                        <div class="col-md-3 col-lg-3 form-group">
                            <label for="dataFimEstagio" >Data do Fim do Estágio:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input type="text" class="form-control" id="dataFimEstagio" name='dataFimEstagio' required='required'>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6  form-group">
                            <label for="situacao-Contrato">Situação do Contrato</label>
                            <div>
                                <select class="form-control" id="situacao-Contrato" style="font-size: 16px" name='situacao-Contrato'>
                                    <option >Escolha uma opção</option>
                                    <option value="1">Checando CPF</option>
                                    <option value="2">Contrato está no CIEE/IEL</option>
                                    <option value="3">Contrato está com o estagiário</option>
                                    <option value="4">Estagiário contratado</option>
                                    <option value="5">Estagiário está de férias</option>
                                    <option value="6">Contrato rescindido</option>
                                </select>                                    
                            </div>
                        </div> 
					</div>
				</div><!--Fim formulario de contrato-->

				<!--Botões-->
				<div> 
					<div id="actions" class="row">
						<div class="col-md-12 col-lg-12">							
							<a href="#"> <button type="submit" class="btn btn-primary" name='continuar_contrato'>Continuar</button></a>
							<a href="../index.php" class="btn btn-default">Cancelar</a>
						</div>
					</div>
				</div>
			</form>
        </div>  <!--Fim container-->

        <?php include(RODAPE_TEMPLATE); ?>   

    </body>
</html>
