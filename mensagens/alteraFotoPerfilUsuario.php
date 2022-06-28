<?php
session_start();
//================================================================================== PRIMEIRO ACESSO
include("../function/conexao.php");
include("../function/js.php");

conexao();

 $id = $_SESSION['id'];

// VERIFICA SESSAO DE USUARIO PARA TODAS AS PEFINAS Q POSSUEM TOPO
include("../function/veriSessao.php");
veriSessao();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Programa de Pontos</title>
<style>

.tabela_cad{
border:1px solid #cccccc; border-radius:4px; background-color:#FFFFFF;-webkit-box-shadow: 9px 7px 5px rgba(50, 50, 50, 0.3);-moz-box-shadow:9px 7px 5px rgba(50, 50, 50, 0.3);box-shadow:9px 7px 5px rgba(50, 50, 50, 0.3); font-size:16px
}


input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

body{ background-color: #FFFFFF; margin:0; padding:0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px}
.divTopo{ width:100%;}

.info{ padding:10px; background-color:rgba(255,130,71,0.2); width:200px; border-left:3px solid #FF9900; font-size: 12px}
/* LEGENDA */
.legenda{border:1px solid #666666; background-color:#F8F8FF; padding:5px; -webkit-box-shadow: 2px 2px 2px rgba(50, 50, 50, 0.3); -moz-box-shadow:2px 2px 2px rgba(50, 50, 50, 0.3); box-shadow:2px 2px 2px rgba(50, 50, 50, 0.3);}
.Estilo2{ color: #FF0000}
<?php
include("css/input.php");
?>
</style>
<!-- CSS -->
<link rel="stylesheet" href="../css/caixaDialogo.css" />
<link rel="stylesheet" href="../css/botaoPadrao.css" />

</head>

<body>

<?php

// ============================================================================== ADICIONA FOTO
	if(array_key_exists("foto",$_GET)){//f
		$foto = $_FILES['foto'];
		$cod  = $_GET['cod'];
		$telefone = $_SESSION['geral']['emissor'];
		include("function/alteraFotoPerfilUsuario.php");
		?>
		<!-- MENSAGENS DE ERRO -->
		<div class="alert">
		  <span class="close">&times;</span>  
		  <strong>Aviso</strong><br>		
			<?php
			echo $foto = novoProdutoAdicionaFoto($foto,$telefone);
			?>
		</div>		
		<?php
	}//f

?>




<!-- JAVASCRIPT -->
<script type="text/javascript" src="js/caixaDialogo.js"></script>



<!-- FORMULARIO DE CADASTRO DE USUARIO --> 
<form name="formCadUs" method="post" action="alteraFotoPerfilUsuario.php?foto=1&cod=<?php echo $cod?>"  enctype="multipart/form-data">

  <p>&nbsp;</p>
  <table width="400px" height="162" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF" style="border:1px solid; border-color:#cccccc; border-radius:4px">
  
  <tr>  
    <td height="38" align="left" valign="middle">Selecione a imagem:&nbsp;<input name="foto" id="foto" type="file" style="padding:10px; border-left:3px solid #FF9900"></td>
    </tr>


  <tr>
    <td align="center"><input type="submit" name="salvar" value="Salvar" style="width:100px"></td>
    </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>


<!-- JAVASCRIPT -->
<script type="text/javascript" src="../js/caixaDialogo.js"></script>


<?php mysql_close()?>
</body>
</html>
