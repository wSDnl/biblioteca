<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>


<table>		  
<tr>
  <td>R$ 
  <input type="text" name="valor_unit" id="valor_unit" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['valor_unit']?>"></td>
          <tr><td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td align="left">Valor Total sem IPI<br>
			R$ 
		    <input type="text" name="valor_total_sem_ipi" id="valor_total_sem_ipi" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['valor_total_sem_ipi']?>"></td>
          </tr>
          <tr>
            <td align="left"><span class="Estilo1"> </span>CFOP<br>              
            <input type="text" name="cfop" value="<?php echo $material['cfop']?>"  style="width:350px"></td>
          </tr>

          <tr>
            <td align="left"><span class="Estilo1"> </span>ST<br>              
            <input type="text" name="st" value="<?php echo $material['st']?>"  style="width:350px"></td>
          </tr>

         <tr>
            <td align="left">Outras Disposas<br>
			R$ 
		    <input type="text" name="outras_dispesas" id="outras_dispesas" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['outras_dispesas']?>"></td>
          </tr>
 
         <tr>
            <td align="left">Base ICMS<br>
		    <input type="text" name="base_icms" id="base_icms" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['base_icms']?>"></td>
          </tr>



         <tr>
            <td align="left">Aliquota ICMS<br>
		    <input type="text" name="aliq_icms" id="aliq_icms" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['base_icms']?>"></td>
          </tr>
 

         <tr>
           <td align="left">Valor ICMS<br>
		    R$ 
	        <input type="text" name="valor_icms" id="valor_icms" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['valor_icms']?>"></td>
         </tr>


         <tr>
           <td align="left">Valor Total + IPI <br>
		    R$ 
	        <input type="text" name="valor_total_mais_ipi" id="valor_total_mais_ipi" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['valor_total_mais_ipi']?>"></td>
         </tr>


          <tr>
            <td align="left"><span class="Estilo1"> </span>CTS IPI<br>              
            <input type="text" name="cst_ipi" value="<?php echo $material['cst_ipi']?>"  style="width:350px"></td>
          </tr>



          <tr>
            <td align="left"><span class="Estilo1"> </span>Enquadramento IPI<br>              
            <input type="text" name="enquadramento_ipi" value="<?php echo $material['enquadramento_ipi']?>"  style="width:350px"></td>
          </tr>



         <tr>
            <td align="left"><span class="Estilo1"> </span>CST PIS<br>              
            <input type="text" name="cst_pis" value="<?php echo $material['cst_pis']?>"  style="width:350px"></td>
          </tr>



         <tr>
            <td align="left">Base PIS<br>
		    <input type="text" name="base_pis" id="base_pis" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['base_pis']?>"></td>
          </tr>
 


         <tr>
           <td align="left">Valor PIS <br>
		    R$ 
	        <input type="text" name="valor_pis" id="valor_pis" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['valor_pis']?>"></td>
         </tr>



         <tr>
            <td align="left"><span class="Estilo1"> </span>CST COFINS<br>              
            <input type="text" name="cst_cofins" value="<?php echo $material['cst_cofins']?>"  style="width:350px"></td>
          </tr>




         <tr>
            <td align="left">Base COFINS<br>
		    <input type="text" name="base_cofins" id="base_cofins" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['base_cofins']?>"></td>
          </tr>
 



         <tr>
           <td align="left">Valor COFINS <br>
		    R$ 
	        <input type="text" name="valor_cofins" id="valor_cofins" style="color:#009900; width:350px" onKeyDown="FormataMoeda(this,10,event)" onKeyPress="return maskKeyPress(event)"  value="<?php echo $material['valor_cofins']?>"></td>
         </tr>




         <tr>
            <td align="left"><span class="Estilo1"> </span>FCI<br>              
            <input type="text" name="fci" value="<?php echo $material['fci']?>"  style="width:350px"></td>
          </tr>



</table>


</body>
</html>
