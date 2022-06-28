<?php
session_start();
include("../function/conexao.php");
include("../function/js.php");

conexao();


$id = $_SESSION['id'];


// ============================================================================== DEFINE TIPO DE USUARIO

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



.desc{ display:inline-block; width:60%; height:20px; background-color: #FFFFFF; position:relative; overflow: hidden; font-size:11px}
.res{ display:inline-block; width:20%; height:20px; background-color: #FFFFFF; position:relative; overflow: hidden; font-size:11px}


.esq{  position:fixed; top:0; left:0; width:50%; height:100vh; z-index:-1}
.dir{  position:fixed; top:0; right:0; width:50%; height:100vh; z-index:-1}
@media  (max-width: 600px) {
.esq{  background-color:#FF0000; height:100vh; width:100%; z-index:-1}
.dir{  background-color:#0000CC; height:100vh; width:100%; z-index:-1}

}

</style>
<link rel="stylesheet" href="../css/caixaDialogo.css" />
<link rel="stylesheet" href="../css/setaLink.css" />
<link rel="stylesheet" href="../css/botaoPadrao.css" />
<link rel="stylesheet" href="../css/inputCadastros.css" />
<link rel="stylesheet" href="../css/lista.css" />
<link rel="stylesheet" href="../css/menuInterno.css" />


<meta name="viewport" content="width=device-width, initial-scale=1">
<title>webSystem - de Olho na lojinha ( Dnl v3 )</title>

<script type="text/JavaScript">

function abreNovoEndereco(){
		document.getElementById("cadastrar_cliente").style.display = "block";	
		setTimeout( function() { 
			document.getElementById('cadastrar_cliente').style.opacity = "1";
		}, 500 );

}

function fechaNovoEndereco(){
		document.getElementById('cadastrar_cliente').style.opacity = "0";
		setTimeout( function() { 
			document.getElementById("cadastrar_cliente").style.display = "none";				
		}, 500 );

}

function calculaFrete(id,origem){
	// ENVIA PARA A PAGINA OS DADOS PARA CALCULAR O FRETE
	window.location.href = "frete.php?calcula_frete=1&id_cliente="+id+"&origem="+origem+"";
}

</script>

</head>
<body>
<div style="background-color:#333333; color:#CCCCCC; padding-left:10px; padding-top:10px; padding-bottom:10px; font-size:16px; z-index:2">
<table width="100%" border="0" style="color: #CCCCCC">
  <tr>
    <td width="6%"><img src="../img/painel_indicadores_logo.jpg" width="49" height="28"></td>
    <td width="94%">Express <span class="iconMenu" onClick="openNav()">&#x022EE;</span>
	</td>
    </tr>
</table>
</div>

<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onClick="closeNav()">x</a>
<a href="index.php" target="iframeCorpo">Clientes</a>
<a href="javascript:telaLateralNovoProduto();closeNav()" target="iframeCorpo">Novo Produto</a>
<a href="../produtos.php" target="iframeCorpo">Produtos</a>
<a href="telaVendas.php?venda_sem_CPF_CNPJ=1" target="iframeCorpo">Venda Sem CPF/CNPJ</a>
<a href="../vendas.php" target="iframeCorpo">Sair</a>
</div>
<!--  <span class="iconMenu" onClick="openNav()">&#x022EE;</span> COLOCAR NO TOPO APOS O TITULO  -->
<script type="text/javascript" src="../js/menuInterno.js"></script>


<div class="esq"></div>
<div class="dir"></div>



	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	
<?php mysql_close(); ?>	
	
<!-- JAVASCRIPT -->
<script type="text/javascript" src="../js/caixaDialogo.js"></script>
	
</body>
</html>
