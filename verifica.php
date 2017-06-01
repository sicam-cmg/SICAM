<?php
	session_start();
	
	if(!array_key_exists('tipo', $_SESSION) || !array_key_exists('CPF', $_SESSION))
		echo '<script>location.href="../index.php"</script>';
?>