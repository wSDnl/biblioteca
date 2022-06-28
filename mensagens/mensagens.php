<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
include("../function/conexao.php");
conexao();

$id = $_SESSION['id'];

// VERIFICA SESSAO DE USUARIO PARA TODAS AS PEFINAS Q POSSUEM TOPO
include("../function/veriSessao.php");
veriSessao();

$chave = $_REQUEST['chave'];

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

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>webSystem - de Olho na lojinha ( Dnl v3 )</title>

<style>
body{font-family:Verdana, Arial, Helvetica, sans-serif; background-image:url(img/fundo1.jpg);background-attachment: fixed; overflow-x:hidden}
.topo{ background-color:#ededed; padding:10px; position:fixed; top:0; left:0; z-index:1; width:100% }
.emissor{padding:10px; border-radius:5px; background-color: #DCF8C6; color: #000000; font-size:12px; border:0; overflow:hidden;}
.receptor{padding:10px; border-radius:5px; background-color: #F8F8FF; color: #000000; border:1px solid #ffffff;font-size:12px;}
.avisos{ padding:5px; text-align:center; background-color: #00CCFF; width:200px; font-size:11px; border-radius:5px; margin-left:40% }
.voltar{ display:none}
.circulo{ border-radius:50%}


/* SMARTFONE */
@media  (max-width: 600px) {
	.voltar{ display:block}
	.topo{ background-color:#ededed; padding:5px; position:fixed; top:0px; left:0; z-index:1; width:100%; background-color:#36648b; color:#FFFFFF}
}


</style>
<script>
function fechaAbaDir(){
		parent.document.getElementById("abaDir").style.width = "0%";
}


function fechaPerfil(){
	parent.document.getElementById('fotoIcon').style.opacity = "0";
	
	var tela = screen.width;
	if(tela < 600){
		setTimeout( function() { 
			parent.document.getElementById('perfil').style.left = "-100%";
		}, 250 );
	}else{
		setTimeout( function() { 
			parent.document.getElementById('perfil').style.left = "-30%";
		}, 250 );
	
	}
}


function abrePerfilContato(nome){
	parent.document.getElementById('fotoIconContato').style.opacity = "0";
	var menu = screen.width;
	if(menu > 600){
	
			parent.window.iframePerfilContato.location.href = "dadosContato.php?nome="+nome+"";
			parent.document.getElementById("perfilContato").style.right = "0%";
			setTimeout( function() { 
			parent.document.getElementById('fotoIconContato').style.opacity = "1";
			},  1000);

		}else{
			parent.window.iframePerfilContato.location.href = "dadosContato.php?nome="+nome+"";
			parent.document.getElementById("perfilContato").style.right = "0%";
			setTimeout( function() { 
			parent.document.getElementById('fotoIconContato').style.opacity = "1";
			}, 1000 );

		}
}


</script>

</head>

<body>
	<!-- TOPO -->
<div class="topo"  style="cursor:pointer">
		<table width="95%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		  <td width="20%" valign="middle" class="voltar" onclick="fechaAbaDir()"><img src="img/setaPerfil.jpg" / width="30px" border="0" style="margin-top:5px; margin-right:10px"></td>
			<td width="3%" valign="middle" onclick="abrePerfilContato('<?php echo $nome?>');fechaPerfil()"><img src="<?php echo $resFoto['foto']?>" width="40px" class="circulo"></td>
			<td width="82%" valign="middle" onclick="abrePerfilContato('<?php echo $nome?>');fechaPerfil()">&nbsp;<?php echo $nome?></td>
			<td width="10%" valign="middle" class="voltar"><img src="img/menu.jpg" / width="30px" border="0" style="margin-top:5px; margin-right:10px"></td>
		  </tr>
  </table>
</div>
		
<div style="height:100px">&nbsp;</div>		
<?php


/*
DESCRIÇÃO DO PROCESSO

1 - CRIAR UMA PERMISSAO, ESTA PERMISSAO CRIA DOIS CAMPOS PARA CADA CHAVE PARA QUE APENAS AS DUAS PESSOAS POSSAM VER
2 - CRIA UMA CHAVE, EXISTE APENAS UMA CHAVE PARA CADA MENSAGEM
3 - CRIA MENSAGEM, AS MENSAGENS POSSUEM A CHAVE

*/

	
	$msg      = nl2br( ucwords( $_REQUEST['textMsg']) );
	$nome     = $_REQUEST['nome'];
	$enviar   = $_REQUEST['enviar'];
	$por      = $_REQUEST['por'];
	
	if($nome == ''){ 
		?><script>	window.location.href="telaInicio.php"; parent.document.getElementById('rodape').style.display = "none";	</script><?php 
	}else{
		?><script>	parent.document.getElementById('rodape').style.display = "block";	</script><?php 	
	}
	
	/// *** cria nova chave
	if($chave == ''){
		$chave = $por."-".$enviar;
	}
		
	
	$dataHoje = date("Y-m-d");
	$hora     = date("h:m:s");
	
	
	if($msg != ''){
	?>
	<script>
		parent.document.getElementById("textMsg").value="";
	</script>
	<?php
		/// *** confere permissoes enviado por 
		$sqlPermissao = mysql_query(" SELECT * from mensagens_permissao where id_usuario = '$id' AND chave = '$chave' AND permitir = '$por'  ");
		if(mysql_num_rows($sqlPermissao) > 0){
			while($m = mysql_fetch_assoc($sqlPermissao)){
				 ++$permissao_enviado_por;
			}
		}


		/// *** confere permissoes enviar para 
		$sqlPermissao = mysql_query(" SELECT * from mensagens_permissao where id_usuario = '$id' AND chave = '$chave' AND permitir = '$enviar'  ");
		if(mysql_num_rows($sqlPermissao) > 0){
			while($m = mysql_fetch_assoc($sqlPermissao)){ 
				 ++$permissao_enviar_para;
			}
		}
		
		/// *** valida resultado
		if($permissao_enviado_por == ''){
			$sqlInsere1 = mysql_query(" INSERT INTO `mensagens_permissao` (`id`, `id_usuario`, `chave`, `permitir`) VALUES (NULL, '$id', '$chave', '$por') ");
		}
		if($permissao_enviar_para == ''){
			$sqlInsere2 = mysql_query(" INSERT INTO `mensagens_permissao` (`id`, `id_usuario`, `chave`, `permitir`) VALUES (NULL, '$id', '$chave', '$enviar') ");
		}	



			/// *** CONFERE CHAVE
			$sqlChave = mysql_query(" SELECT chave from mensagens_chave where id_usuario = '$id' AND chave = '$chave' ");
			$sqlChave = mysql_fetch_assoc($sqlChave);
			
			/// *** CRIA NOVA CHAVE
			if($sqlChave['chave'] == ''){
				$sqlNovaChave = mysql_query("  INSERT INTO `mensagens_chave` (`id`, `id_usuario`, `chave`, `data`, `hora`) VALUES (NULL, '$id', '$chave', '$dataHoje', '$hora') ");
			}else{
				$sqlNovaChave = mysql_query("  UPDATE `mensagens_chave` SET `data` = '$dataHoje', `hora` = '$hora' WHERE `mensagens_chave`.`chave` = '$chave' ");
			}
			
			
			/// *** CRIA NOVA MENSAGEM
			$horaEnvio = date("h:m:s");
			$sqlCriaNovaMsg = mysql_query
			("  INSERT INTO `mensagens` (`id`, `id_usuario`, `chave`, `enviado_por`, `msg`, `hora`, `lido`) VALUES (NULL, '$id', '$chave', '$por', '$msg', '$hora','$enviar')   ");

	}

	
?>		
<!-- EXEMPLOS
<div class="emissor">
	<label class="emissorIcon">&blacktriangleright;</label>
	<label>		
		Mensagem 0 Mensagem 1 Mensagem 1 Mensagem 1 <br>
		Mensagem 0 Mensagem 1 Mensagem 1 Mensagem 1 <br>
	</label>
	
</div><br><br>


<div class="receptor">
	<label class="receptorIcon">&blacktriangleleft;</label>
	<label>
		Mensagem 1 Mensagem 1 Mensagem 1 Mensagem 1 <BR>
		Mensagem 1 Mensagem 1 Mensagem 1 Mensagem 1 
	</label></div><br><br>

-->

<?php
$sessaoEmissor = $_SESSION['geral']['emissor'];

?>
<table width="100%" border="0">
<?php

$sqlCarregaMsg = mysql_query("select * from mensagens where id_usuario = '$id' and chave = '$chave' limit 0,50 ") or die(mysql_error());
	if(mysql_num_rows($sqlCarregaMsg) > 0){
		while($m = mysql_fetch_assoc($sqlCarregaMsg)){
			$msg         = $m['msg'];
			$enviado_por = $m['enviado_por'];
			$lido        = $m['lido'];
			$h           = explode(":", $m['hora'] );
			
			if( $enviado_por == $sessaoEmissor ){
				$estilo = " emissor ";
				$tabela = "  align='right' ";	
			}else{
				$estilo = " receptor ";
				$tabela = "  align='left' ";
			}
									
			?>

  				<tr <?php echo $tabela?> >
			    <td>

						<?php
							/// *** define o tamanho do balao
							$len = strlen( $msg );
							$res = $len * 10;
							if($res > 100){ $res = "90%"; }else{ $res = $res."px"; }
							if($res < 60){ $res = "60px"; }
						?>

				<div class="<?php echo $estilo?>" style=" width:<?php echo $res?>; text-align:left">
						<label>
						<?php echo $msg?>
						<br><label style="font-size:11px; color: #999999"><?php echo $h[0].":".$h[1]?>
						<?php
						if($lido != 's'){
						?>&nbsp;<strong>&#x02713;&#x02713;</strong><?php
						 }else{
						 ?>&nbsp;<label style="color:#0099FF"><strong>&#x02713;&#x02713;</strong></label><?php
						 } ?>
					</label>
				</div>
				</td>
				</tr>
			<?php
			
			
		}
	}else{ echo "<div class='avisos'>Nova Mensagem</div>"; }


?>


</table>

<a name="fim"></a>
</body>
</html>
