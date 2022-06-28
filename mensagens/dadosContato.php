<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
include("../function/conexao.php");
conexao();

$id = $_SESSION['id'];

// VERIFICA SESSAO DE USUARIO PARA TODAS AS PEFINAS Q POSSUEM TOPO
include("../function/veriSessao.php");
veriSessao();

$nome = $_REQUEST['nome'];

/// *** CARREGA FOTO DO CONTATO
$sqlCarregaFoto = mysql_query("  select foto from mensagens_contatos where id_usuario = '$id' and nome = '$nome'  ");
$resFoto = mysql_fetch_assoc($sqlCarregaFoto);

/*
	PARA CONTA PRINCIPAL ID DE USUARIO ORIGINAL EX: 1
	PARA CONTA SECUNDARIA ID DE USUARIO = ID DE FUNCIONARIO
*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body{ font-family:Verdana, Arial, Helvetica, sans-serif}
.iconFoto{ position: absolute; left:60%; top:70%; font-size:30px; border:1px solid #CCCCCC ; border-radius:50%; width:40px; background-color:#f5f5f5; color:#999999; cursor:pointer; opacity:0.5; transition:0.3s}
.fotoIcon{ opacity:0; transition:0.3s}

.perfilContato{ position:fixed; top:0; right:-30%; width:30%; height:100vh; z-index:2; background-color: #FFFFFF; overflow:hidden; transition:0.5s}
.circulo{ border-radius:50%; }

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<body>
	<center><br><br>
		<div id="fotoIconContato" class="fotoIconContato" style="position:relative">
			<img src="<?php echo $resFoto['foto']?>" width="200px" class="circulo"><br><br>
			<label style="color:#999999"><?php echo $nome?></label>
			</div>
	</center>

</body>
</html>
