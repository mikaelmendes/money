<?php 
 include "valida_sessao.php";
 include "conectar_banco.inc";  
 $nome_usuario = $_SESSION ["nome_usuario"];
 $id_usuario = $_SESSION ["id_usuario"];
 $query_visitap = mysql_query("SELECT nome, endereco, data, id, visitas.id_usuario, status FROM clientes INNER JOIN visitas ON clientes.id_cliente= visitas.id_cliente
										WHERE visitas.id_usuario='$id_usuario' and status=1");
$linhas = mysql_num_rows($query_visitap);
/*  if ($linhas==0) {
 echo "<b>VOCE NÃO POSSUI VISITAS PENDENTES</b>";
 } */
$option = $_POST['op'];
$cod= $_POST['codigo'];
$datanova= $_POST['datanova'];
if($option==1){

$query = mysql_query("SELECT * FROM visitas WHERE visitas.id='$cod' and id_usuario='$id_usuario'");	
	$linhas2 = mysql_num_rows($query);
	 if ($linhas2==0) {
		echo "<b>VOCE NÃO POSSUI VISITAS COM ESSE CODIGO</b>";
	 }
	else{ 
		$sql=mysql_query("UPDATE visitas SET data='$datanova' WHERE id='$cod' and id_usuario='$id_usuario'");
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=visitaPendente.php'>";
		
		echo"<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
			alert ('Reagendamento realizado com sucesso!')
			</SCRIPT>";
		/* echo"<h2><b>Reagendamento realizado com sucesso!</b></h2>";  */
		
	}
}



if($option==2){
$query = mysql_query("SELECT * FROM visitas WHERE visitas.id='$cod' and id_usuario='$id_usuario'");
	$linhas2 = mysql_num_rows($query);
	 if ($linhas2==0) {
		echo "<b>VOCE NÃO POSSUI VISITAS COM ESSE CODIGO</b>";
	 }
	else{ 
		$sql=mysql_query("UPDATE visitas SET status='2' WHERE id='$cod' and id_usuario='$id_usuario'");
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=visitaPendente.php'>";
		echo"<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
			alert ('Visita marcada como realizada!')
			</SCRIPT>";
		//echo "<h2><b>Visita marcada como realizada!</b></h2>";
		
	}
}
mysql_close ($con);

?>

<html>
 <head><title> Controle de Financas </title></head >
 <body >
 <form method ="post" name ="form" action ="visitaPendente.php">
		<center >
		<img src="money2.jpg" width ="15%"/>
		<h1> Sistema de Controle de Financas Empresarial </h1>
		<h2> Visitas Pendentes </h2>
		<hr width ="700 px"/><br/>
		
		<?php  if ($linhas==0) {
			echo "<b>VOCE NÃO POSSUI VISITAS PENDENTES</b>";
		}?>
	
	 
		<?php while($vispen = mysql_fetch_array($query_visitap)) { ?>
		
		<p STYLE="border-style: dotted ;border-color :blue;max-width:400px; float: center">
		
		<?php
				echo"<br>";
				echo "<b>Código: </b>";
				echo $vispen['id'];
				echo"<br><br>";
				echo "<b>Cliente: </b>";
				echo $vispen['nome'];
				echo " ";
				echo "<br><br>";
				echo "<b>Endereco da visita: </b>";
				echo $vispen['endereco'];
				echo"<br><br>";
				echo "<b>DATA DA VISITA: </b>";
				echo $vispen['data'];
				
				
		?>
		<br><br>					
		</p>		
		<?php 
		} 
		?>
			
		<hr width ="400 px"/>
		<h2>Opções: </h2>
		Digite a opcao desejada seguida do código da visita!<br>
		
		<select name ="op">
					<option >Selecione...</option>
					<option value ="1" > Reagendar visita </option>
					<option value ="2" > Visita realizada </option>
		</select>
		Código da visita: <input type = text, name = "codigo"> <br><br>
		<font color="red"> *Se deseja reagendar a visita, escolha a nova data: </font> 
		<input type="date" name = 'datanova'><br>		
		
		
			
		<input type="submit" value="Salvar">
		<input type ="button" onClick ="location.href = 'principal.php' " value = 'Voltar'>		
	</center>
 </form>
	

</html>
