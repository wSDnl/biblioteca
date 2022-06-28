<?php
session_start();
include("../function/js.php");
include("../function/conexao.php");

$id = $_SESSION['id'];

conexao();


?>

<html>
<head>

<style>
body{ 
font-family:Verdana, Arial, Helvetica, sans-serif; 
margin:0; 
padding:0; 
background-color: #FFFFFF; 
overflow:hidden;
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
	left:-1;
	width:0; 
	height:100vh; 
	background-color: #f5f5f5; 
	overflow:hidden; 
	border-left:1px solid #999999; 
	transition: 0.5s;
	z-index:1;
}


.anotacoes{ display:inline-block; width:50%; height:100vh; background-color: #FFFFFF; overflow: inherit; transition: 0.5s ease-out; position:relative; }

@media  (max-width: 600px) {	

.telaLateralEsqFixa{ position:fixed; top:50px; width:410px; height:400px; background-color: #f5f5f5; overflow-x: hidden;}
.telaLateralDirFixa{ position:fixed; top:450px; width:410px; height:220px; background-color: #000099; overflow-x:hidden;}


}

</style>

<link rel="stylesheet" href="../css/menuInterno.css" />
<link rel="stylesheet" href="../css/botaoPadrao.css" />
<link rel="stylesheet" href="../css/caixaDialogo.css" />
<link rel="stylesheet" href="../css/inputCadastros.css" />

<script>

function telaLateralDir(){
	var tela = screen.width;
	if(tela > 600){
		document.getElementById("telaLateralDir").style.width = "50%";
	}else{
		document.getElementById("telaLateralDir").style.width = "100%";	
	}

	window.iframeNote.location.href = "verNote.php?n="+x+"";
}

function telaLateralEsq(){
	var tela = screen.width;
	if(tela > 600){
		document.getElementById("telaLateralEsq").style.width = "50%";
	}else{
		document.getElementById("telaLateralEsq").style.width = "100%";	
	}

	window.iframeNote.location.href = "verNote.php?n="+x+"";
}


function fechaTelas(){
	document.getElementById("telaLateralDir").style.width = "0%";		
	document.getElementById("telaLateralEsq").style.width = "0%";	

}



</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>webSystem - de Olho na lojinha ( Dnl v3 )</title>
</head>

<body>

<div style="background-color:#333333; color:#CCCCCC; padding-left:10px; padding-top:10px; padding-bottom:10px; font-size:16px">
<table width="100%" border="0" style="color: #CCCCCC">
  <tr>
    <td width="6%"><img src="../img/painel_indicadores_logo.jpg" width="49" height="28"></td>
    <td width="94%">&nbsp;&nbsp;&nbsp;Escala de Trabalho <span class="iconMenu" onClick="openNav()">&#x022EE;</span></td>
    </tr>
</table>
</div>

<!-- TELA LATERAL DIREITA -->
<div id="telaLateralDir" class="telaLateralDir">
  <span class="close" style="padding:20px" onClick="fechaTelas()">&times;</span>  
	<iframe name="iframeTelaLateralDir" width="100%" height="100%" style="border:0"></iframe>
</div>

<!-- TELA LATERAL ESQUERDA -->
<div id="telaLateralEsq" class="telaLateralEsq">
  <span class="close" style="padding:20px" onClick="fechaTelas()">&times;</span>  
	<iframe name="iframeTelaLateralEsq" width="100%" height="100%" style="border:0"></iframe>
</div>



<div id="anotacoes" class="anotacoes">
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onClick="closeNav()">x</a>
<a href="javascript:telaLateralDir()" onClick="closeNav()" target="iframeCorpo">Novo...</a>
<a href="../vendas.php" target="iframeCorpo">Sair</a>
</div>
<!--  <span class="iconMenu" onClick="openNav()">&#x022EE;</span> COLOCAR NO TOPO APOS O TITULO  -->
<script type="text/javascript" src="../js/menuInterno.js"></script>


<div class="telaLateralEsqFixa" style="background-color:#FF0000">
<button onClick="telaLateralEsq()">Abre Tela Esq</button>

</div>

<div class="telaLateralDirFixa" style="background-color: #000099">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>



</body>
</html>
