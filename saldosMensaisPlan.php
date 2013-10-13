 <?php
 include "valida_sessao.inc";
 include "conectar_banco.inc";
 $nome_usuario = $_SESSION ["nome_usuario"];
 $id_usuario = $_SESSION ["id_usuario"];
 $mes = $_GET["mes"];
 $meses = array ("Janeiro","Fevereiro","Marco","Abril","Maio","Junho","Julho", 
		"Agosto ","Setembro","Outubro","Novembro","Dezembro");
 $resRecVar = mysql_query ("SELECT * FROM receitas_despesas
		WHERE classe=1 and mes_referencia=$mes and tipo=1 and
		usuario=$id_usuario");
 $resDesVar = mysql_query (" SELECT * FROM receitas_despesas
		WHERE classe =1 and mes_referencia = '$mes' and tipo =2 and
		usuario = '$id_usuario' ");
 $resRecFix = mysql_query (" SELECT * FROM receitas_despesas
		WHERE classe =2 and tipo =1 and usuario = $id_usuario ");
 $resDesFix = mysql_query (" SELECT * FROM receitas_despesas
		WHERE classe =2 and tipo =2 and usuario = $id_usuario ");
 // Valores Totais Receitas e Despesas
 $recVarTotal = 0; $recFixTotal = 0; $desVarTotal = 0; $desFixTotal = 0;
 mysql_close ($con);
?>
<html >
 <head><title> Controle de Financas </title></head >
 <body >
 <form method ="get" name ="fmes" action ="saldosMensaisPlan.php">
		<center >
		<img src="money2.jpg" width ="15%"/>
		<h1> Sistema de Controle de Financas Empresarial </h1>
		<hr width ="700 px"/><br/>
		<p>Favor, escolha o mes que deseja visualizar :
		<select name ="mes">
			<option value ="1" onclick ="javascript:document.fmes.submit();"> Janeiro </option>
			<option value ="2" onclick ="javascript:document.fmes.submit();"> Fevereiro </option>
			<option value ="3" onclick ="javascript:document.fmes.submit();"> Marco </option>
			<option value ="4" onclick ="javascript:document.fmes.submit();"> Abril </option>
			<option value ="5" onclick ="javascript:document.fmes.submit();"> Maio </option>
			<option value ="6" onclick ="javascript:document.fmes.submit();"> Junho </option>
			<option value ="7" onclick ="javascript:document.fmes.submit();"> Julho </option>
			<option value ="8" onclick ="javascript:document.fmes.submit();"> Agosto </option>
			<option value ="9" onclick ="javascript:document.fmes.submit();"> Setembro </option>
			<option value ="10" onclick ="javascript:document.fmes.submit();"> Outubro </option>
			<option value ="11" onclick ="javascript:document.fmes.submit();"> Novembro </option>
			<option value ="12" onclick ="javascript:document.fmes.submit();"> Dezembro </option>
		</select>
		</p>
 <?php if(isset($mes))
 {
 ?>
 <b> Lista de RECEITAS - Mes de <?php echo $meses[$mes-1] ?> </b><br><br>
	Fixas
		<hr width ="700 px" />
		<table width =700 px border =0px>
			<th> Nome </th><th> Data e Hora de Cadastro </th><th> Valor (R$)</th>
			<?php
			while ($linha = mysql_fetch_array ($resRecFix,MYSQL_ASSOC))
			{
				 echo "<tr>";
				 echo "<td align ='left' width =33%>" . $linha ["nome"] . " </td>";
				 echo "<td align ='center' width =33%>" . $linha ["datahora"] . " </td>";
				 echo "<td align ='right' width =33%>" . $linha ["valor"] . " </td>";
				 echo "</tr>";
				 
				// Incrementar o valor total
				$recFixTotal = $recFixTotal + $linha ["valor"];
			}?>
			<tr >

			<td width =33%> </td><td align ='right ' width =33% > <b> Total : <?php echo "<td align =' center ' width =33% >" . "$recFixTotal" . " </td >";?></b></td>
			</tr >
		</table ><br >
		
	 Variaveis
	 <hr width ="700 px" />
	 <table width =700 px border =0px >
			<?php
			while ($linha = mysql_fetch_array ($resRecVar,MYSQL_ASSOC))
			{
				echo "<tr>";
				echo "<td align ='left' width =33%>" . $linha ["nome"] . "</td>";
				echo "<td align ='center' width =33%>" . $linha ["datahora"] . "</td>";
				echo "<td align ='right' width =33%>" . $linha ["valor"] . "</td>";
				echo "</tr>";
				// Incrementar o valor total
				$recVarTotal = $recVarTotal + $linha ["valor"];
			}?>
			
			<tr>
				<td width =33%> </td><td align ='right ' width =33%> <b> Total : <?php echo "<td align =' center ' width =33% >" . "$recVarTotal" . " </td >";?></b></td> 
			</tr>
	</table><br/>
	
<b> Lista de DESPESAS - Mes de <?php echo $meses [$mes-1] ?> </b><br/><br/>
	
	Fixas
	 <hr width ="700 px" />
	 <table width =700 px border =0px>	 
			<th > Nome </th><th> Data e Hora de Cadastro </th><th> Valor (R$ )</th>
			<?php
			while ($linha = mysql_fetch_array ($resDesFix,MYSQL_ASSOC))
				{
					echo "<tr>";
					echo "<td align ='left' width =33%>" . $linha ["nome"] . " </td>";
					echo "<td align ='center' width =33%>" . $linha ["datahora"] . " </td>";
					echo "<td align ='right' width =33%>" . $linha ["valor"] . " </td>";
					echo "</tr>";
					// Incrementar o valor total
					$desFixTotal = $desFixTotal + $linha ["valor"];
				} ?>
				
	 <tr>
	 <td width =33%> </td><td align ='right' width =33%> <b> Total : <?php echo "<td align =' center ' width =33% >" . "$desFixTotal" . " </td >";?></b></td> 
	 </tr>
	 </table><br/>
	 
	Variaveis
	 <hr width ="700 px"/>
	 <table width =700 px border =0px >
			<?php
			while ($linha = mysql_fetch_array ($resDesVar,MYSQL_ASSOC))
			{
				 echo "<tr>";
				 echo "<td align =' center ' width =33% >" . $linha ["nome"] . " </td >";
				 echo "<td align =' center ' width =33% >" . $linha ["datahora"] . " </td>";
				 echo "<td align =' center ' width =33% >" . $linha [ "valor"] . " </td >";
				 echo " </tr>";
				// Incrementar o valor total
				$desVarTotal = $desVarTotal + $linha ["valor"];
			} ?>
			<tr>
				<td width =33% > </td ><td align ='right ' width =33% > <b> Total : <?php echo "<td align =' center ' width =33% >" . "$desVarTotal" . " </td >";?></b ></td>
			</tr >
	</table><br/>
	
	<b>SALDO </b>
	<hr width ="700 px"/>
	<table width =700 px border =0px >
		 <tr>
			 <td width ="50%">Receitas : </td >
			 <td align ="right " width ="50%"><?php echo ($recFixTotal + $recVarTotal) ?>
		 </tr>
		 <tr>
			 <td width ="50%">Despesas : </td >
			 <td align =" right " width ="50%" ><?php echo ($desFixTotal + $desVarTotal)?>
		 </tr>
		 <tr>
			 <td width ="50%">Saldo : </td >
			 <td align =" right " width ="50%">
				<b><?php echo ($recFixTotal + $recVarTotal)-($desFixTotal + $desVarTotal)?></b>
		 </tr>
		 <tr>
			<td>
				<input type ="button" onClick ="location.href = 'principal.php' " value = 'Voltar'>
			</td>
			<td>
			</td>
		 </tr>
	</table>

 <?php
 }
 ?>
 </center>
 </form>
 </body>
 </html>
