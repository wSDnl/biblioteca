<?php
session_start();
include("../function/conexao.php");
conexao();

$id = $_SESSION['id'];
$sessaoEmissor = $_SESSION['geral']['emissor'];

// VERIFICA SESSAO DE USUARIO PARA TODAS AS PEFINAS Q POSSUEM TOPO
include("../function/veriSessao.php");
veriSessao();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>

	setTimeout( function() { window.location.href = "confereMsg.php"; }, 10000 );

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<body>

<?php

	/// *** enviadas
		
			$sqlCarregaPermissao = mysql_query("select chave from mensagens_permissao where id_usuario = '$id' and permitir = '$sessaoEmissor' limit 0,50 ");
				if(mysql_num_rows($sqlCarregaPermissao) > 0){
					while($p = mysql_fetch_assoc($sqlCarregaPermissao)){
						$mostra = explode("-", $p['chave']);
						$chave  = $p['chave'];


			$sqlCarregaMsg = mysql_query("select data,hora from mensagens_chave where id_usuario = '$id' and chave = '$chave' limit 0,50 ");
				if(mysql_num_rows($sqlCarregaMsg) > 0){
					while($m = mysql_fetch_assoc($sqlCarregaMsg)){
						$x      = explode("-",$m['data']);  
					}
				}		

			$sqlCarregaMsg = mysql_query("select count(lido) from mensagens where id_usuario = '$id' and lido = '$sessaoEmissor' limit 0,50 ");
				if(mysql_num_rows($sqlCarregaMsg) > 0){
					while($m = mysql_fetch_assoc($sqlCarregaMsg)){		 
						echo $lido   = $m['count(lido)'];
					}
				}		

}}

if($lido > 0 ){
	?>
		<script>
			setTimeout( function() { parent.window.location.href = "conversas.php"; }, 10000 );
			
		</script>
	<?php
}


?>

</body>
</html>
