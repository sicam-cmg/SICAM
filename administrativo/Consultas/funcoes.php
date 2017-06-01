<?php
	require_once('../../configuracao.php');
	require_once(DBAPI);
	
	$estagiarios = null;
	$estagiario = null;
	
	/**
	 *  Listagem de Clientes
	 */
	function index() {
		global $estagiarios;
		$estagiarios = find_all('tabela_consulta');
	}

	function visualizacao($id = null){
		global $estagiario;
		$estagiario = find($id);
	}

	function pesquisar_estagiarios($tipo, $txt){
		global $estagiarios;
		if($tipo == 'cpf')
			$estagiarios = buscar_cpf($txt);
		if($tipo == 'nome')
			$estagiarios = buscar_nome($txt);
		if($tipo == 'lotacao')
			$estagiarios = buscar_lotacao($txt);
		if($tipo == 'status')
			$estagiarios = buscar_status($txt);
	}

	function mask($val, $mask){
		$mascara = '';
		
		for($i = 0, $j = 0; $i < strlen($val); $i++, $j++)
			if($mask[$j] == '#')
				$mascara .= $val[$i];
			else{
				while($mask[$j] != '#')
					$mascara .= $mask[$j++];
				$mascara .= $val[$i];
			}
		return $mascara;
	}
?>