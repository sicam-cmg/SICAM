
<?php	
	if(isset($_GET['logout']) == 1){
		unset($_SESSION['CPF']);
		unset($_SESSION['tipo']);
		echo '<script>location.href="../index.php"</script>';
	}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tabela de Consulta</title>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style type="text/css">
        
            .icones{
                color: #FFF;
                -webkit-border-radius: 50px;
                -moz-border-radius: 50px;
            }

            .icones:hover {
                background: #FFF;
            }

        </style>

    </head>

    <body>
    <!--Barra de navegação superior das telas -->
        <nav class="navbar navbar-fixed-top" role="navigation" style="background: #1D2D6B; padding: 10px">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Barra de Navegação - SICAM</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php echo BASEURL; ?>index.php" class="navbar-left navbar-brand icones">SICAM</a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo BASEURL; ?>index.php"><span class="glyphicon glyphicon-home"></span> Início</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                    <li><a href="?logout=1"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                </ul>

            </div>
        </nav>

        <div style="padding-bottom: 100px">            
            <!--ESPAÇAMENTO NECESSÁRIO ENTRE A BARRA DE NAVEGAÇÃO PRINCIPAL E OS DEMAIS COMPONENTES NA TELA-->
        </div>

    </body>

</html