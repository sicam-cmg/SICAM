<?php require_once '../../configuracao.php'; ?>
<?php require_once 'funcoes.php'; ?>
<?php require_once DBAPI; ?>
<?php require_once VERIFICA_LOGADO; ?>

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CDN do Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>

	<body>	

		<?php include(CABECALHO_TEMPLATE); ?>

		<header>
			<h3 style="padding-left: 10px">Informe a consulta: </h3>
			<form method="POST">
				<div class="col-md-3 col-lg-3 form-group">
                    <label class="radio-inline"><input type="radio" name="opcao_consulta" value='cpf'>CPF</label>
                    <label class="radio-inline"><input type="radio" name="opcao_consulta" value='nome'>Nome</label>
                    <label class="radio-inline"><input type="radio" name="opcao_consulta" value='lotacao'>Lotação</label>
                    <label class="radio-inline"><input type="radio" name="opcao_consulta" value='status'>Status</label>
                </div>

                <div class="col-md-3 col-lg-3 form-group">
                    <div class="input">
                        <input type="text" class="form-control " id="resposta_consulta" name="campo_pesquisa">
                    </div>
                </div> 
               
                 <div class="col-md-2 col-lg-2 form-group">                     
                    <a href="index.php"> <button type="submit" class="btn btn-primary" name='buscar'>Buscar</button></a> 
                </div> 
			</form>	

		</header>

		<?php if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo $_SESSION['message']; ?>
			</div>
			<?php clear_messages(); ?>
		<?php endif; ?>

		<br>

		<div style="padding-top: 50px">
			<!--ESPAÇAMENTO DA TABELA E DA CONSULTA-->
		</div>

		<h3 style="padding-left: 10px">Resultado da consulta: </h3>

		<!--Tabela -->
		<table class="table table-hover">
			<?php
				echo '<thead>';
				if(isset($_POST['buscar'])){
					pesquisar_estagiarios($_POST['opcao_consulta'], $_POST['campo_pesquisa']);
					echo '<tr>';
					if($_POST['opcao_consulta'] == 'cpf') echo '<th> CPF </th>';
					echo '<th width="35%">Nome</th>';
					
					if($_POST['opcao_consulta'] == 'lotacao') echo '<th> Lotação </th>';
					if($_POST['opcao_consulta'] == 'status') echo '<th> Status do Contrato </th>';
					echo '<th> Data de Início do Contrato</th>
					<th> Data de Fim do Contrato</th>				
					</tr>';
				}
				echo '</thead><tbody>';
				if ($estagiarios){
					foreach ($estagiarios as $estagiario){
						
						echo "<tr>";
						
						if($_POST['opcao_consulta'] == 'cpf') echo '<td>' . mask($estagiario['CPF'], '###.###.###-##') . '</td>';
						
						echo "<td>" . $estagiario['nome'] ."</td>";
						
						if($_POST['opcao_consulta'] == 'lotacao') echo '<td>' . $estagiario['lotacao_nome'] . '</td>';
						
						if($_POST['opcao_consulta'] == 'status') echo '<td>' . $estagiario['situacao_contrato'] . '</td>';
						
						echo "<td>" . date("d/m/Y", strtotime($estagiario['data_inicio'])) . "</td>
						
						<td>" .date("d/m/Y", strtotime($estagiario['data_fim'])) . "</td>
						
						<td class='actions text-right'>

							<a href='visualizacao.php?id=" . $estagiario['CPF'] . "' class='btn btn-sm btn-success'><i class='material-icons'>info_outline</i></a>

							<a href='#' class='btn btn-sm btn-warning'><i class='material-icons'>mode_edit</i></a>

							<a href='#' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#delete-modal' data-customer='" . $estagiario['nome'] . "'>
								<i class='material-icons'>delete_forever</i> </a> </td> </tr>";
					}
				}else
					echo '<tr>
							<td colspan="6">Nenhum registro encontrado.</td>
						</tr>'; 
			?>

			</tbody>
		</table> <!--Fim tabela -->

		<!--Incluindo o rodapé, fazendo a chamada configurada em configuracao.php -->
		<?php include(RODAPE_TEMPLATE); ?>

	</body>
</html>