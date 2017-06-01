<?php

	/*Estrutura presente em configuracao.php*/
	mysqli_report(MYSQLI_REPORT_STRICT);

	/*Função para abrir o banco de dados*/
	function open_database() {
		try {
			$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			mysqli_set_charset( $conn, 'utf8');
			return $conn;
		} catch (Exception $e) {
			echo $e->getMessage();
			return null;
		}
	}

	/*Função para fechar o banco de dados*/
	function close_database($conn) {
		try {
			mysqli_close($conn);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	/**
	 *  Pesquisa um Registro pelo ID em uma Tabela
	 */
	function find($id = null ) {
	  
		$database = open_database();
		$encontrar = null;

		/*Buscando o id informado para a pesquisa no banco*/
		try {
			$sql = "SELECT * FROM pessoa WHERE CPF = '" . $id . "'";

			$result = $database->query($sql);

			if ($result) {
				$encontrar = mysqli_fetch_array($result);
			}
		} 
		
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
		return $encontrar;
	}
	
	/**
	 *  Pesquisar Todos os Registros de uma Tabela
	 */
	function find_all( $table ) {
	  return find($table);
	}
	/*
		* Função para logar no sistema
		* recebe os parametros (string, string)
		* retorna um booleando
	*/
	function logar($login, $senha){
		$database = open_database();
		
		try{
			$sql = 'SELECT * FROM login WHERE login = "' . $login . '" and senha = "' . $senha . '"';
			
			$result = $database->query($sql);
		}
		
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		close_database($database);
		
		return $result;
	}
	/*
		* Função para inserir os dados pessoais no BD
		* recebe os parametros(string, string, string, string, string, string, string, string, string,
								string, string, string, string, string, string, string, string)
		* retorna booleano
	*/	
	function insert_pessoa($cpf = null, $nome = null, $email = null, $celular = null, $tel1 = null, $cep = null,
							$endereco = null, $bairro = null, $cidade = null, $uf = null, $complemento = null,
							$banco = null, $agencia = null, $operacao = null, $conta = null, $curso = null, $instituicao = null){
	
		$database = open_database();
		
		try{
			/*requisição*/
			$sql = 'insert into pessoa values("'
				.$cpf.'","'.$nome.'","'.$email.'","'.$celular.'","'.$tel1.'","'.$cep
				.'","'.$endereco.'","'.$bairro.'","'.$cidade.'","'.$uf.'","'.$complemento
				.'","'.$banco.'","'.$agencia.'","'.$operacao.'","'.$conta.'","'.$curso
				.'","'.$instituicao.'")';
			
			$result = $database->query($sql);
		}		
		
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		
		close_database($database);
		
		return $result;
	}
	/*
		* Função para atualizar os dados pessoais no BD
		* recebe os parametros(string, string, string, string, string, string, string, string, string,
								string, string, string, string, string, string, string, string)
		* retorna booleano
	*/
	function atualizar_pessoa($cpf, $nome = null, $email = null, $celular = null, $tel1 = null, $cep = null,
							$endereco = null, $bairro = null, $cidade = null, $uf = null, $complemento = null,
							$banco = null, $agencia = null, $operacao = null, $conta = null, $curso = null, $instituicao = null){
		
		$database = open_database();
		
		$sql = 'update pessoa set ';
		if($nome) $sql .= ' nome = "'. $nome . '"';
		if($email)
			if(!$nome) $sql .= ' email = "'. $email . '"';
			else $sql .= ', email = "'. $email . '"';
		if($celular)
			if(!$nome && !$email) $sql .= ' telefone1 = "'. $celular . '"';
			else $sql .= ', telefone1 = "'. $celular . '"';
		if($tel1)
			if(!$nome && !$email && !$celular) $sql .= ' telefone2 = "'. $tel1 . '"';
			else $sql .= ', telefone2 = "'. $tel1 . '"';
		if($cep)
			if(!$nome && !$email && !$celular && !$tel1) $sql .= ' CEP = "'. $cep . '"';
			else  $sql .= ', CEP = "'. $cep . '"';
		if($endereco)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep) $sql .= ' endereco = "'. $endereco . '"';
			else  $sql .= ', endereco = "'. $endereco . '"';
		if($bairro)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco) $sql .= ' setor = "'. $bairro . '"';
			else  $sql .= ', setor = "'. $bairro . '"';
		if($cidade)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro) $sql .= ' cidade = "'. $cidade . '"';
			else  $sql .= ', cidade = "'. $cidade . '"';
		if($uf)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro && !$cidade) $sql .= ' UF = "'. $uf . '"';
			else  $sql .= ', UF = "'. $uf . '"';
		if($complemento)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro && !$cidade && !$uf) $sql .= ' complemento = "'. $complemento . '"';
			else  $sql .= ', complemento = "'. $complemento . '"';
		if($banco)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro && !$cidade && !$uf && !$complemento) $sql .= ' banco = "'. $banco . '"';
			else  $sql .= ', banco = "'. $banco . '"';
		if($agencia)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro && !$cidade && !$uf && !$complemento && !$banco && !$agencia) $sql .= ' agencia = "'. $agencia . '"';
			else  $sql .= ', agencia = "'. $agencia . '"';
		if($operacao)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro && !$cidade && !$uf && !$complemento && !$banco && !$agencia) $sql .= ' operacao = "'. $operacao . '"';
			else  $sql .= ', operacao = "'. $operacao . '"';
		if($conta)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro && !$cidade && !$uf && !$complemento && !$banco && !$agencia && !$operacao) $sql .= ' conta = "'. $conta . '"';
			else  $sql .= ', conta = "'. $conta . '"';
		if($curso)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro && !$cidade && !$uf && !$complemento && !$banco && !$agencia && !$operacao && !$conta) $sql .= ' curso = "'. $curso . '"';
			else  $sql .= ', curso = "'. $curso . '"';
		if($instituicao)
			if(!$nome && !$email && !$celular && !$tel1 && !$cep && !$endereco && !$bairro && !$cidade && !$uf && !$complemento && !$banco && !$agencia && !$operacao && !$conta && !$curso) $sql .= ' instituicao = "'. $instituicao . '"';
			else  $sql .= ', instituicao = "'. $instituicao . '"';
		
		$sql .= ' where cpf = "' . $cpf . '"';
		
		try{
			$result = $database->query($sql);
		}		
		
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		
		
		close_database($database);
		
		return $result;
	}
	/*
		* Função para inserir uma nova lotação no BD, caso não existaos dados pessoais no BD
		* recebe o parâmetro(string)
	*/
	function insert_lotacao($nome){
		$database = open_database();
		
		try{
			$sql = 'INSERT INTO lotacao(lotacao_nome, n_contrato) select * from (select "'. $nome
				.'",5) as tmp where not exists(select lotacao_nome from lotacao where lotacao_nome = "'.$nome.'")';
			
			$database->query($sql);
		}	
		
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		
		close_database($database);
	}
	/*
		* Função para buscar o id de uma nova lotação no BD
		* recebe o parâmetro(string)
		* retorna um int
	*/
	function buscar_id_lotacao($nome){
		$database = open_database();
		
		try{
			$sql = 'select id_lotacao from lotacao where lotacao_nome = "' . $nome . '"';
			
			$result = $database->query($sql);
			
			$row = mysqli_fetch_array($result);
		
		}		
		
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		
		close_database($database);
		
		return $row['id_lotacao'];
	}
	/*
		* Função para inserir um novo contrato no BD
		* recebe os parâmetros(date, date, string, string, string, string, int, string)
		* retorna booleando
	*/
	function insert_contrato($dataInicio, $dataFim, $contrato, $valor, $situacao_contrato, $cpf, $id_lotacao, $supervisor){
		
		$database = open_database();
		
		try{
			$sql = 'INSERT INTO contrato(data_inicio, data_fim, convenio, valor_estagio, situacao_contrato, fk_CPF, fk_lotacao, supervisor) VALUES ("'
					. $dataInicio . '","' . $dataFim . '","' . $contrato
					. '","' . $valor . '","' . $situacao_contrato . '","' . $cpf 
					. '","' . $id_lotacao . '","' . $supervisor . '")';
			
			$result = $database->query($sql);
		}		
		
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		
		close_database($database);
		
		return $result;
	}
	/*
		* Função para inserir um novo login no BD
		* recebe os parâmetros(string, int)
	*/
	function insert_login($cpf, $qtd){
		$database = open_database();
		
		try{
			$sql = 'INSERT INTO `login`(senha, fk_acesso, fk_CPF)'
						. 'VALUES ("' . 12345678 . '", 4,"' . $cpf . '")';
			
			$database->query($sql);
		
		}		
		
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		close_database($database);
	}
	/*
		* Função usada para buscar o login/senha
		* recebe(string)
		* retorna null/map de string
	*/
	function buscar_login($cpf){		
		$database = open_database();
		try{
			$sql = 'select * from login where fk_CPF = "' . $cpf . '"';
			
			$result = $database->query($sql);
			
			$row = mysqli_fetch_array($result);
		
		}		
		
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		close_database($database);
		
		return $row;
	}
	/*
		* Função para pesquisar CPF no BD
		* recebe o parâmetro(string)
		* retorna uma lista(string, date, date)
	*/
	function buscar_cpf($cpf){
		
		$database = open_database();
		$encontrar = null;

		try {
			$sql = "select pessoa.CPF, pessoa.nome, contrato.data_inicio, contrato.data_fim from pessoa INNER JOIN contrato on pessoa.CPF = contrato.fk_CPF and pessoa.CPF LIKE '%" . $cpf . "%'  order by nome";

			$result = $database->query($sql);

			if ($result->num_rows > 0) {
				$encontrar = $result->fetch_all(MYSQLI_ASSOC);
			}
		} 
		
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
		
		return $encontrar;
	}
	/*
		* Função para pesquisar nome no BD
		* recebe o parâmetro(string)
		* retorna uma lista(string, date, date)
	*/
	function buscar_nome($nome){
		
		$database = open_database();
		$encontrar = null;

		try {
			$sql = "select pessoa.CPF, pessoa.nome, contrato.situacao_contrato, contrato.data_inicio, contrato.data_fim from pessoa INNER JOIN contrato on pessoa.CPF = contrato.fk_CPF and pessoa.nome LIKE '%" . $nome . "%'  order by nome";
			$result = $database->query($sql);

			if ($result->num_rows > 0) {
				$encontrar = $result->fetch_all(MYSQLI_ASSOC);
			}
		} 
		
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
		return $encontrar;
	}
	/*
		* Função para pesquisar os estagiarios de uma lotacao no BD
		* recebe o parâmetro(string)
		* retorna uma lista(string, date, date)
	*/
	function buscar_lotacao($lotacao){
		
		$database = open_database();
		$encontrar = null;

		try {
			$sql = "select pessoa.CPF, pessoa.nome, lotacao.lotacao_nome, contrato.situacao_contrato, contrato.data_inicio, contrato.data_fim from lotacao INNER JOIN contrato inner join pessoa on lotacao.lotacao_nome LIKE '%" . $lotacao . "%' and contrato.fk_lotacao = lotacao.id_lotacao and pessoa.CPF = contrato.fk_CPF order by nome";
			$result = $database->query($sql);

			if ($result->num_rows > 0) {
				$encontrar = $result->fetch_all(MYSQLI_ASSOC);
			}
		} 
		
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
		return $encontrar;
	}
	/*
		* Função para pesquisar estagiarios por status
		* recebe o parâmetro(string)
		* retorna uma lista(string, date, date)
	*/
	function buscar_status($status){
		
		$database = open_database();
		$encontrar = null;

		try {
			$sql = "select pessoa.CPF, pessoa.nome, contrato.situacao_contrato, contrato.data_inicio, contrato.data_fim from contrato inner join pessoa on contrato.situacao_contrato LIKE '%" . $status . "%' and pessoa.CPF = contrato.fk_CPF order by nome";
			$result = $database->query($sql);

			if ($result->num_rows > 0) {
				$encontrar = $result->fetch_all(MYSQLI_ASSOC);
			}
		} 
		
		/*Mensagem caso o id pesquisado não foi encontrado*/
		catch (Exception $e) {
			$_SESSION['message'] = $e->GetMessage();
			$_SESSION['type'] = 'danger';
	  	}
		

		/*Em ambas as ocasiões, fechar o banco após a pesquisa*/
		close_database($database);
		return $encontrar;
	}
?>