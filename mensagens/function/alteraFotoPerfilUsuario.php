<?php
function novoProdutoAdicionaFoto($foto,$telefone){//f

/*
Label erro
<label style='color:#FF0000'></label>


Label Sucesso
<label style='color:#006600'></label>

*/

// Se a foto estiver sido selecionada
	if (!empty($foto["name"])){
		
		// Largura m�xima em pixels
		$largura = 1200; // PADRAO 4000
		// Altura m�xima em pixels
		$altura = 1200; // PADRAO 3000
		// Tamanho m�ximo do arquivo em bytes
		$tamanho = 2000000; // 2 Megabyte
 
    	// Verifica se o arquivo � uma imagem
    	if(!preg_match("/^image\/(jpg|pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "<label style='color:#FF0000'>Isso n&atilde;o &eacute; uma imagem.</label>";
   	 	}else{
			$sucesso[1] = "<label style='color:#006600'>Imagem Selecionada do tipo ".$foto["type"]."</label>";
		} 
	
		// Pega as dimens�es da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem � maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "<label style='color:#FF0000'>A largura da imagem n&atilde;o deve ultrapassar ".$largura." pixels</label>";
		}else{
			$sucesso[2] = "<label style='color:#006600'>Largura ".$dimensoes[0]." pixels</label>";
		} 
 
		// Verifica se a altura da imagem � maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "<label style='color:#FF0000'>Altura da imagem n&atilde;o deve ultrapassar ".$altura." pixels</label>";
		}else{
			$sucesso[3] = "<label style='color:#006600'>Altura ".$dimensoes[1]." pixels</label>";
		} 
		
		// Verifica se o tamanho da imagem � maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "<label style='color:#FF0000'>A imagem deve ter no maximo ".$tamanho." bytes ou 2 Megabyte</label>";
		}else{
			$sucesso[4] = "<label style='color:#006600'>Tamanho ".$foto["size"]." bytes</label>";
		} 
 
 
 
 
		// Se n�o houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extens�o da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome �nico para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficar� a imagem
        	$caminho_imagem = "imgUsuario/" . $nome_imagem;
			
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			
			// =================================================================== FINALIZA SALVAMENTO DA FOTO NO BD

			// seleciona o foto atual
			$sqlVeri = mysql_query("select foto,telefone from mensagens_contatos where telefone = '$telefone' ") or die(mysql_error());
			if(mysql_num_rows($sqlVeri) > 0){//1
				while($linha = mysql_fetch_assoc($sqlVeri)){
				$fotoAtual = $linha['foto'];
				}
			}
			if(!sqlVeri){ $erro[5] = "<label style='color:#FF0000'>Erro ao Salvar, Veirifique sua internet </label>";}

			
			// SALVA PRIMEIRA FOTO
			if($fotoAtual == 'imgUsuario/msgSemImagem.jpg'){
				$sqlsalvaFoto = mysql_query("update mensagens_contatos set foto = '$caminho_imagem' where telefone = '$telefone' ");
				if(mysql_query){
					?><script>//alert("Primeira Foto Adicionada com Sucesso"); window.location="novoProdutoAdicionaFotoForm.php?cod=<?php echo $id?>#foto";</script><?php
					$sucesso[5] = "<label style='color:#006600'>Primeira Foto alterada com sucesso</label><br>";

				}
			}else{
			
	

			
			
			// ALTERA FOTO E DELETA FOTO ANTERIOR
			array_map('unlink', glob($fotoAtual));
			$sqlsalvaFoto = mysql_query("update mensagens_contatos set foto = '$caminho_imagem' where telefone = '$telefone' ");
				if(mysql_query){
					$sucesso[5] = "<label style='color:#006600'>Foto alterada com sucesso</label><br>";

				}
			}



		
		


}
	
	// Se nao houver mensagens de erro, exibe-as
		if (count($sucesso) > 0) {
				foreach ($sucesso as $ok) {
					echo $ok . "<br />";
				}
		}
			
	
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
		}}

	}
}//f
?>