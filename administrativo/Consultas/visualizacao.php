
<?php 
	require_once('funcoes.php'); 
	visualizacao($_GET['id']);
?>

<?php include(CABECALHO_TEMPLATE); ?>

<h2>Cliente: <?php echo $estagiario['nome']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>CPF :</dt>
	<dd><?php echo mask($estagiario['CPF'], '###.###.###-##'); ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>E-mail :</dt>
	<dd><?php echo $estagiario['email']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Celular :</dt>
	<dd><?php echo mask($estagiario['telefone1'],'(##) ##### ####'); ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Telefone :</dt>
	<dd><?php echo mask($estagiario['telefone2'],'(##) #### ####'); ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>CEP :</dt>
	<dd><?php echo mask($estagiario['CEP'], '##.###-###'); ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Endereco :</dt>
	<dd><?php echo $estagiario['endereco']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Setor :</dt>
	<dd><?php echo $estagiario['setor']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Cidade :</dt>
	<dd><?php echo $estagiario['cidade']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>UF :</dt>
	<dd><?php echo $estagiario['UF']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Complemento :</dt>
	<dd><?php echo $estagiario['complemento']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Banco :</dt>
	<dd><?php echo $estagiario['banco']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Agência :</dt>
	<dd><?php echo $estagiario['agencia']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Operação :</dt>
	<dd><?php echo $estagiario['operacao']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Conta :</dt>
	<dd><?php echo $estagiario['conta']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Curso :</dt>
	<dd><?php echo $estagiario['curso']; ?></dd>
</dl>
<dl class="dl-horizontal">
	<dt>Instituição :</dt>
	<dd><?php echo $estagiario['instituicao']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12" style="margin-left: 40px">
		<a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(RODAPE_TEMPLATE); ?>