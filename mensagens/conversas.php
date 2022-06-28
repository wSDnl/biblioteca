<?php
session_start();
include("../function/conexao.php");
conexao();

$id = $_SESSION['id'];
$sessaoEmissor = $_SESSION['geral']['emissor'];
$emissorNome = $_SESSION['geral']['emissorNome'];

// VERIFICA SESSAO DE USUARIO PARA TODAS AS PEFINAS Q POSSUEM TOPO
include("../function/veriSessao.php");
veriSessao();
?>
<html>
<head>
<style>
body{ 
	font-family:Verdana, Arial, Helvetica, sans-serif; 
	margin:0; 
	padding:0; 
	background-color: #FFFFFF; 
	overflow-x:hidden;
	height:100%;
}


/* SMARTFONE */
@media  (max-width: 600px) {
}

</style>
<link rel="stylesheet" href="../css/caixaDialogo.css" />
<link rel="stylesheet" href="../css/menuInterno.css" />
<link rel="stylesheet" href="../css/botaoPadrao.css" />
<link rel="stylesheet" href="../css/paginacao.css" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>webSystem - de Olho na lojinha ( Dnl v3 )</title>

</head>
<script>

function abreMsg(nome,chave,aviso,enviar,por){
	// ABRE MSG
	parent.window.iframeMensagens.location.href="mensagens.php?chave="+chave+"&nome="+nome+"#fim";
	
	parent.document.getElementById('chave').value = ""+chave+"";
	parent.document.getElementById('nome').value = ""+nome+"";
	parent.document.getElementById('enviar').value = ""+enviar+"";
	//parent.document.getElementById('por').value = ""+por+"";
	
	var tela = screen.width;
	if(tela <= 600){
		parent.document.getElementById("abaDir").style.width = "100%";
	}

	
	
	if(aviso == 'nova'){
		// MARCA COMO LIDO
		window.location.href="conversas.php?id_chave_msg_lidas="+chave+"";
	}
	
	
}


</script>

<body onLoad="atualiza()">

<style>
.conversa{ height:60px; border-bottom:1px solid #f5f5f5; cursor:pointer}
.conversa:hover{ background-color:#f6f6f6}
.circulo{ border-radius:50%}
.nome{ display: inline-block; font-size:16px; width:70%; padding:5px}
.data{ display: inline-block; font-size:11px; color:#CCCCCC}
.textConversa{ display: inline-block; font-size:12px; color: #999999; width:80%}
.op{ display: inline-block; font-size:12px; color: #999999; width:10%; font-size:20px; color:#00CC00; position: relative;}

.contatos{ font-size:12px; color:#666666; padding:10px}

</style>

<?php

if(array_key_exists("textBusca",$_GET)){
	$busca = $_REQUEST['textBusca'];
}else{
	$busca = "";
}



$lido = 0;

if(array_key_exists("id_chave_msg_lidas",$_GET)){
	$id_chave_msg_lidas = $_REQUEST['id_chave_msg_lidas'];
	$sqlAlteraParaLido = mysql_query(" UPDATE `mensagens` SET `lido` = 's' WHERE `mensagens`.`chave` = '$id_chave_msg_lidas';  ");

}



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

			$sqlCarregaMsg = mysql_query("select count(lido) from mensagens where id_usuario = '$id' and lido = '$sessaoEmissor' and chave = '$chave' limit 0,50 ");
				if(mysql_num_rows($sqlCarregaMsg) > 0){
					while($m = mysql_fetch_assoc($sqlCarregaMsg)){		 
						$lido   = $m['count(lido)'];
					}
				}		


											if($sessaoEmissor == $mostra[0]){
												$sqlNome = mysql_query(" select nome from mensagens_contatos where upper(nome) like '%$busca%' and id_usuario = '$id' and telefone = '$mostra[1]' ");
												$resNome = mysql_fetch_assoc($sqlNome);
													$nome = $resNome['nome']; 
													$enviar = $mostra[1];
													$por    = $mostra[0]; 
										 	}


											if($sessaoEmissor == $mostra[1]){
												$sqlNome = mysql_query(" select nome from mensagens_contatos where upper(nome) like '%$busca%' and id_usuario = '$id' and telefone = '$mostra[0]' ");
												$resNome = mysql_fetch_assoc($sqlNome);
													$nome = $resNome['nome']; 
													$enviar = $mostra[0];
													$por    = $mostra[1]; 
										 	}

										
										/// *** envia aviso para js NOVA / LIDA	
										if($lido > 0 ){ $aviso = "nova"; }else{ $aviso = "lida";} 
											
										?>
							
							
							
							<div class="conversa" onClick="abreMsg('<?php echo $nome?>','<?php echo $chave?>','<?php echo $aviso?>','<?php echo $enviar?>','<?php echo $por?>')">

								<table width="100%" border="0">
								  <tr>
									<td width="40" valign="middle"><img src="imgUsuario/msgSemImagem.jpg" width="55px" class="circulo"></td>
									<td colspan="2">
										<div class="nome" style="font-size:12px">
										<?php
										if($lido > 0){?><strong><?php }
											if($sessaoEmissor == $mostra[0]){
												$sqlNome = mysql_query(" select nome from mensagens_contatos where id_usuario = '$id' and telefone = '$mostra[1]' ");
												$resNome = mysql_fetch_assoc($sqlNome);
													if($resNome['nome'] == ''){ echo "Matriz"; }else{ 
													$nomeLen = strlen( $resNome['nome'] );
													if($nomeLen > 30){ echo substr($resNome['nome'],0,30)."..."; }else{ echo $resNome['nome']; } 
													}	
												}
											if($sessaoEmissor == $mostra[1]){
												$sqlNome = mysql_query(" select nome from mensagens_contatos where id_usuario = '$id' and telefone = '$mostra[0]' ");
												$resNome = mysql_fetch_assoc($sqlNome);
													if($resNome['nome'] == ''){ echo "Matriz"; }else{ 
													$nomeLen = strlen( $resNome['nome'] );
													if($nomeLen > 30){ echo substr($resNome['nome'],0,30)."..."; }else{ echo $resNome['nome']; } 
													}	
											}
																						
										if($lido > 0){?></strong><?php }
										?>
										</div><div class="data"><?php echo $x[2]."/".$x[1]."/".$x[0]?></div><br>
										<div class="textConversa"><?php if($sessaoEmissor == $lido){ echo "Nova Mensagem"; }else{ echo "Clique Para ver a Conversa"; } ?>
										</div><div class="op">
										<?php if($lido > 0 ){?>
											<div style="background-color:#00CC00; color:#FFFFFF; text-align:center; font-size:11px; border-radius:25px"><?php echo $lido?></div>
										<?php } ?></div>
									</td>
									</tr>
								</table>
								</div>			
							<?phP	
							$lido = 0;	
			
			}
		}
			
			

?>

<!-- ATUALIZA PAGINA APENAS SE TIVER MENSAGENS NOVAS -->
<iframe src="confereMsg.php?" style="border:0px solid #000000; width:1px; height:1px"></iframe>

<br><br>
<div class="contatos">Contatos</div>

<?php
$sqlVeri = mysql_query("select id,nome,telefone from mensagens_contatos where upper(nome) like '%$busca%' and id_usuario = '$id' and telefone != '$sessaoEmissor' and telefone != '00000000000' order by nome asc") or die(mysql_error());
	if(mysql_num_rows($sqlVeri) > 0){//1
		while($linha = mysql_fetch_assoc($sqlVeri)){
			$id_func   = $linha['telefone'];
			$x = strlen ( $linha['nome'] );
			if($x > 50){ $nome = substr( $linha['nome'],0,50)."..."; }else{ $nome = $linha['nome'];}
			$nomeEnvia = $linha['nome'];
			
			?>
				<div class="conversa" onClick="abreMsg('<?php echo $nome?>','','','<?php echo $id_func?>','<?php echo $por?>')">
				<table width="100%" border="0">
				  <tr>
					<td width="40" valign="middle"><img src="imgUsuario/msgSemImagem.jpg" width="55px" class="circulo"></td> 
					<td colspan="2">
						<div class="nome" style="width:100%;font-size:12px"><?php echo $nome?></div></div><div class="textConversa">Clique para enviar uma mensagem</div>
					</td>
					</tr>
				</table>
				</div>	
			<?php
		}
}
?>

<div class="contatos">Fale conosco</div>

<?php
$sqlVeri = mysql_query("select id,nome,telefone from mensagens_contatos where telefone = '00000000000' ") or die(mysql_error());
	if(mysql_num_rows($sqlVeri) > 0){//1
		while($linha = mysql_fetch_assoc($sqlVeri)){
			$id_func   = $linha['telefone'];
			$x = strlen ( $linha['nome'] );
			if($x > 50){ $nome = substr( $linha['nome'],0,50)."..."; }else{ $nome = $linha['nome'];}
			$nomeEnvia = $linha['nome'];
			
			?>
				<div class="conversa" onClick="abreMsg('<?php echo $nome?>','','','<?php echo $id_func?>','<?php echo $por?>')">
				<table width="100%" border="0">
				  <tr>
					<td width="40" valign="middle"><img src="imgUsuario/msgSemImagem.jpg" width="55px" class="circulo"></td> 
					<td colspan="2">
						<div class="nome" style="width:100%;font-size:12px"><?php echo $nome?></div></div><div class="textConversa">Clique para enviar uma mensagem</div>
					</td>
					</tr>
				</table>
				</div>	
			<?php
		}
}
?>



<?php mysql_close();?>
</body>
</html>
