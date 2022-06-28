<?php
session_start();
include("../function/conexao.php");
conexao();

$id = $_SESSION['id'];
$telefone = $_SESSION['geral']['emissor'];

// VERIFICA SESSAO DE USUARIO PARA TODAS AS PEFINAS Q POSSUEM TOPO
include("../function/veriSessao.php");
veriSessao();


/// *** CARREGA FOTO DO CONTATO
$sqlCarregaFoto = mysql_query("  select foto from mensagens_contatos where id_usuario = '$id' and telefone = '$telefone'  ");
$resFoto = mysql_fetch_assoc($sqlCarregaFoto);


?>
<html>
<head>
<link rel="sortcut icon" href="../img/icoPNG.png" type="image/x-icon">

<style>
body{ 
	font-family:Verdana, Arial, Helvetica, sans-serif; 
	margin:0; 
	padding:0; 
	background-color: #FFFFFF; 
	overflow-x:hidden;
	height:100%;
}

.telaLateralDir{ 
		position:fixed; 
		top:0; 
		right:0; 
		width:0; 
		height:100vh; 
		background-color: #f5f5f5; 
		overflow:hidden; 
		border-left:1px solid #999999; 
		transition: 0.5s;
		z-index:1;
}
.telaLateralEsq{ 
		position:fixed; 
		top:0;
		left:0; 
		width:0; 
		height:100vh; 
		background-color: #f5f5f5; 
		overflow:hidden; 
		border-left:1px solid #999999; 
		transition: 0.5s;
		z-index:1;
}

.abaEsq{ display:inline-block; width:30%; height:100vh; background-color: #FFFFFF; position:fixed; top:0; left:0;}
.abaDir{ display:inline-block; width:70%; height:100vh; background-color: #36648b; position:fixed; top:0; right:0}
.topo{ background-color:#ededed; padding:10px}
.busca{ background-color:#f6f6f6; padding:10px; transition:0.5s; opacity:1; height:40px}
.buscaText{ display:inline-block;background-color:#FFFFFF;; height:20px; border-radius:25px; padding:10px; transition:0.5s; opacity:1}
.rodape{ background-color:#f0f0f0; height:100vh; padding:15px;}
.circulo{ border-radius:50%; }
.enviaMsg{ height:70px;width:90%; opacity:1;overflow:hidden; border:0px solid #000000 }
.iframeEnviaMsg{height:83vh; width:100%; border:0; overflow:scroll; }

.perfil{ position:fixed; top:0; left:-30%; width:30%; height:100vh; z-index:2; background-color: #FFFFFF; overflow:hidden; transition:0.3s}
.iconFoto{ position: absolute; left:60%; top:70%; font-size:30px; border:1px solid #CCCCCC ; border-radius:50%; width:40px; background-color:#f5f5f5; color:#999999; cursor:pointer; opacity:0.5; transition:0.3s}
.fotoIcon{ opacity:0; transition:0.3s}

.perfilContato{ position:fixed; top:0; right:-30%; width:30%; height:100vh; z-index:2; background-color: #FFFFFF; overflow:hidden; transition:0.5s}


/* SMARTFONE */
@media  (max-width: 500px) {

	.abaEsq{ display:inline-block; width:100%; height:100vh; background-color: #FFFFFF; position:fixed; top:0; left:0; z-index:1; transition:0.2s}
	.abaDir{ display:inline-block; width:0%; height:70vh; background-color: #CCCCCC; position:fixed; top:0; right:0; z-index:2; transition:0.2s}
	.topo{ background-color:#ededed; padding:10px}
	.busca{ background-color:#f6f6f6; padding:10px; transition:0.5s; opacity:1; height:40px}
	.buscaText{ display:inline-block;background-color:#FFFFFF;; height:20px; border-radius:25px; padding:10px; transition:0.5s; opacity:1}
	.rodape{ position:fixed; top:85%; width:100%; background-color:#f0f0f0; height:100px; padding:10px; transition:0.5s; background-color:#36648b}
	.circulo{ border-radius:50%}
	.enviaMsg{ height:70px; width:80%; opacity:1;overflow:hidden; border:0px solid #000000 }
	.iframeEnviaMsg{height:85vh; width:100%; border:0; overflow:scroll; z-index:1}

	.perfil{ position:fixed; top:0; left:-100%; width:100%; height:100vh; z-index:2; background-color: #FFFFFF; overflow:hidden; transition:0.3s}
	.perfilContato{ position:fixed; top:0; right:-100%; width:100%; height:100vh; background-color: #FFFFFF; overflow:hidden; transition:0.5s; z-index:3}

}

</style>
<link rel="stylesheet" href="../css/caixaDialogo.css" />
<link rel="stylesheet" href="../css/menuInterno.css" />
<link rel="stylesheet" href="../css/botaoPadrao.css" />
<link rel="stylesheet" href="../css/paginacao.css" />
<link rel="stylesheet" href="../css/lista.css" />


<meta name="viewport" content="width=device-width, initial-scale=1">
<title>webSystem - de Olho na lojinha ( Dnl v3 )</title>

</head>
<script>

</script>

<body>


<!--  MENSAGENS  -->
<script>

function sobeMensagem(){
	var tela = screen.width;
	if(tela < 600){
		document.getElementById('rodape').style.top = "73%";
	}
} 

function desceMensagem(){
	var tela = screen.width;
	if(tela < 600){
		document.getElementById('rodape').style.top = "85%";
	}
} 



function abrePerfil(){
	document.getElementById('perfil').style.left = "0";
	setTimeout( function() { 
		document.getElementById('fotoIcon').style.opacity = "1";
	}, 250 );
}

function fechaPerfil(){
	document.getElementById('fotoIcon').style.opacity = "0";
	
	var tela = screen.width;
	if(tela < 600){
		setTimeout( function() { 
			document.getElementById('perfil').style.left = "-100%";
		}, 250 );
	}else{
		setTimeout( function() { 
			document.getElementById('perfil').style.left = "-30%";
		}, 250 );
	
	}
}


function fechaPerfilContato(){
	document.getElementById('fotoIconContato').style.opacity = "0";
	
	var tela = screen.width;
	if(tela < 600){
		setTimeout( function() { 
			document.getElementById('perfilContato').style.right = "-100%";
		}, 500 );
	}else{
		setTimeout( function() { 
			document.getElementById('perfilContato').style.right = "-30%";
		}, 500 );
	
	}
}


function abreBusca(){
	document.getElementById('busca2').style.opacity = "1";
	setTimeout( function() { 
		document.getElementById('busca1').style.display = "none";
		document.getElementById('textBusca').focus(); 
	}, 200 );

	document.getElementById('busca1').style.opacity = "0";
	setTimeout( function() { document.getElementById('busca2').style.display = "block"; }, 200 );
	document.getElementById('busca').style.backgroundColor = "white";
	document.getElementById('busca').style.borderBottom = "1px solid #CCCCCC";
}

function fechaBusca(){
	document.getElementById('busca2').style.opacity = "0";
	setTimeout( function() { 
		document.getElementById('busca1').style.display = "block"; 
		document.getElementById('textMsg').focus(); 
		}, 200 );

	document.getElementById('busca1').style.opacity = "1";
	setTimeout( function() { document.getElementById('busca2').style.display = "none"; }, 200 );
	document.getElementById('busca').style.backgroundColor = "#f6f6f6";
	document.getElementById('busca').style.borderBottom = "1px solid #CCCCCC";
}


function busca(x){
	window.iframeConversas.location.href = "conversas.php?textBusca="+x+"";
}

</script>
<!-- PERFIL -->
<div id="perfil" class="perfil">
	<div style="height:150px; background-color:#36648b;" onClick="fechaPerfil();fechaPerfilContato()">
		<label style=" position:fixed; top:16%; font-size:20px; color:#CCCCCC"><label style="font-size:40px">
			<table width="400" border="0" style="cursor:pointer">
			  <tr>
				<td width="25"><img src="img/setaPerfil.jpg" width="20px"></td>
				<td width="365" style="color:#CCCCCC; font-size:20px">Perfil</td>
			  </tr>
			</table>
		</label>
	</div>
						
	<center><br><br>
		<div id="fotoIcon" class="fotoIcon" style="position:relative">
			<iframe src="dadosPerfil.php" id="iframePerfil" name="iframePerfil" style="border:0; width:100%; height:100vh"></iframe>
		</div>
	</center>
</div>



<!-- CONTATO -->
<div id="perfilContato" class="perfilContato">
<div style="background-color:#ededed; padding:18px"><strong><label style="font-size:20px; color: #999999; cursor:pointer" onClick="fechaPerfil();fechaPerfilContato()">&times;</label></strong>&nbsp;&nbsp;Dados do Contato</div>
	<div id="fotoIconContato" style="transition:0.3s; opacity:0">
		<iframe src="dadosContato.php" id="iframePerfilContato" name="iframePerfilContato" style="border:0; width:100%; height:100vh"></iframe>
	</div>
</div>



<div id="abaEsq" class="abaEsq">
	<!-- TOPO -->
		<div class="topo" style="border-right:1px solid #CCCCCC; cursor:pointer" onClick="abrePerfil();fechaPerfilContato()">
		<table width="95%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="3%"><img <img src="<?php echo $resFoto['foto']?>" width="40px" class="circulo"></td>
			<td width="82%">&nbsp;<?php echo $_SESSION['geral']['emissorNome']?></td>
		  </tr>
		</table>

		
		</div>
	<!-- BUSCA -->
		<div id="busca" class="busca" style=" border-bottom:1px solid #CCCCCC; border-right:1px solid #CCCCCC ">

			<div id="busca1" class="buscaText" style="position: absolute; width:90%; opacity:1" onClick="abreBusca()">
			<img src="img/lupa.jpg" style="cursor:pointer" onClick="abreBusca()">
			</div>
			<div  id="busca2" class="buscaText" style="position: absolute; opacity:0; display:none; width:90%">
			<table width="400" border="0">
			  <tr>
				<td valign="top"><img src="img/seta.jpg" style="cursor:pointer" onClick="fechaBusca()"></td>
				<td valign="middle"><input name="textBusca" id="textBusca" type="text" style="padding:5px; width:300px; border:0; outline: none; text-transform: capitalize" onKeyPress="busca(this.value)"></td>
			  </tr>
			</table>			
			</div>

		</div>
	<!-- MENU IFRAME -->
		<iframe src="conversas.php" name="iframeConversas" id="iframeConversas" style="height:100vh; width:100%; border:0; border-right:1px solid #CCCCCC">
		</iframe>
</div><div id="abaDir" class="abaDir">
	<!-- CORPO IFRAME -->
		<iframe id="iframeMensagens" name="iframeMensagens" src="mensagens.php#fim" class="iframeEnviaMsg">
		</iframe>
		<script>
			var objDiv = document.getElementById("mensagens");
			objDiv.scrollTop = objDiv.scrollHeight;
		</script>
		
	<!-- RODAPE -->	
		<div id="rodape" class="rodape">
			<div id="busca1" class="buscaText enviaMsg">
				<form action="mensagens.php?novaMensagem=1#fim" method="post" id="formEnviaMsg" target="iframeMensagens">
				<input type="hidden" id="chave" name="chave">
				<input type="hidden" id="nome" name="nome">
				<input type="hidden" id="enviar" name="enviar">
				<input type="hidden" id="por" name="por" value="<?php echo $_SESSION['geral']['emissor']?>">
				<textarea name="textMsg" id="textMsg" type="text" style=" padding:0px; height:90%; width:100%; border:0; outline: none; overflow:hidden; resize: none; font-family:Verdana, Arial, Helvetica, sans-serif; text-transform: inherit" onClick="sobeMensagem()" onFocus="sobeMensagem()" onKeyPress="sobeMensagem()" onBlur="desceMensagem()" placeholder="Digite uma Mensagem"></textarea>
				</form>
			</div><div style="display:inline-block; border:0px solid #000000; position:absolute; margin-top:35px; margin-left:15px; cursor:pointer" onClick="javascript:document.getElementById('formEnviaMsg').submit()"><img src="img/enviar.jpg" class="circulo"></div>

		</div>

</div>


<!-- JAVASCRIPT -->
<script type="text/javascript" src="../js/caixaDialogo.js"></script>

<?php mysql_close();?>
</body>
</html>
