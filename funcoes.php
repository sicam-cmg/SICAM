
<?php
	require_once('configuracao.php');
	require_once(DBAPI);
	
	/* Logar sistema*/
	session_start();
	
	/* Redireciondo caso já esteja logado */
	if(array_key_exists('tipo', $_SESSION) && array_key_exists('CPF', $_SESSION))
		echo '<script>location.href="administrativo"</script>';
	
	if(isset($_POST['acessar'])){
		
		$result = logar($_POST['loginname'], $_POST['password']);
		
		if($result->num_rows == 1){
			$row = mysqli_fetch_assoc($result);
			
			/* Armazenando dados temporários do usuário */
			$_SESSION['tipo'] = $row['fk_acesso'];
			$_SESSION['CPF'] = $row['fk_CPF'];
			
			/* Redirecionando */
			echo '<script>location.href="administrativo"</script>';
		}
	}
?>