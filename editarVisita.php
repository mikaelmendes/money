<?php 
 include "valida_sessao.php";
 include "conectar_banco.inc";  
 $nome_usuario = $_SESSION ["nome_usuario"];
 $id_usuario = $_SESSION ["id_usuario"];

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
 	echo"Reagendamento realizado com sucesso!"; 
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
		echo "Visita realizada com sucesso!";
	}
}

mysql_close ($con);
?>


<?php if ($option==1){
		?>
		Sua visita foi reagendada com sucesso!!!<br>
			
		<?php 
		} ?>
		
<?php if ($option==2){
?>
		<h2>Sua visita foi marcada como realizada!!!</h2><br>
		<?php 
		} ?>
