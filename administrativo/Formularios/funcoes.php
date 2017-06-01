<?php
	require_once('../../configuracao.php');
	require_once(DBAPI);
	require_once VERIFICA_LOGADO;
	
	if(isset($_POST['continuar_dadospessoais'])){
		
		$result = insert_pessoa($_POST['cpf'], $_POST['nome'], $_POST['email'],
						$_POST['celular'], $_POST['tel1'], $_POST['cep'], 
						$_POST['endereco'], $_POST['bairro'], $_POST['cidade'],
						$_POST['uf'], $_POST['complemento']);
					
		if($result){
			$_SESSION['nvcpf'] = $_POST['cpf'];
			/* redirecionando */
			echo '<script>location.href="escolaridade.php"</script>';
		}
	}
	if(isset($_POST['continuar_escolaridade'])){
		$result = atualizar_pessoa($_SESSION['nvcpf'],null,null,null,null,null,
		null,null,null,null,null,null,null,null,null,$_POST['curso'], $_POST['instituicao']);
					
		if($result){
			/* redirecionando */
			echo '<script>location.href="contrato.php"</script>';
		}
	}
	if(isset($_POST['continuar_contrato'])){
		insert_lotacao($_POST['lotacao']);
		
		$id_lotacao = buscar_id_lotacao($_POST['lotacao']);
		
		$dataInicio = str_replace("/", "-", $_POST['dataInicioEstagio']);
		$dataFim = str_replace("/", "-", $_POST['dataFimEstagio']);
		
		$result = insert_contrato(date('Y-m-d', strtotime($dataInicio)), date('Y-m-d', strtotime($dataFim)),
								$_POST['optradio'], $_POST['valor'], $_POST['situacao-Contrato'], $_SESSION['nvcpf'],
								$id_lotacao, $_POST['supervisor']);
		
		if($result){
			/* redirecionando */
			echo '<script>location.href="banco.php"</script>';
		}
	}
	if(isset($_POST['continuar_banco'])){
		$result = atualizar_pessoa($_SESSION['nvcpf'], null, null, null, null, null,
		null, null, null, null, null, $_POST['banco'], $_POST['agencia'], $_POST['operacaoBancaria'], $_POST['conta'], null, null);
			
		if($result){
			/* redirecionando */
			insert_login($_SESSION['nvcpf'], 5);
			$result = buscar_login($_SESSION['nvcpf']);
			
			$_SESSION['nvlogin'] = $result['login'];
			$_SESSION['nvsenha'] = $result['senha'];
			
			echo '<script>location.href="login-senha.php"</script>';
		}
	}
?>