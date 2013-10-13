<?php 
 include "valida_sessao.php";
 include "conectar_banco.inc";  
 $nome_usuario = $_SESSION ["nome_usuario"];
 $id_usuario = $_SESSION ["id_usuario"];
$id_cliente = $_POST['id_c'];//recebo via select option
$data_visita= $_POST['data_v'];//recebo via input date
$query_cliente = mysql_query("SELECT nome, id_cliente FROM clientes");
$cad_datahora= $_POST['datetime'];
$query = "INSERT INTO money.visitas(
		id_cliente,
		id_usuario,
		status,	
		data,
		cad_datahora
	  ) VALUES (
		'$id_cliente',
		'$id_usuario',
		'1',	
		'$data_visita',
		'$cad_datahora'
)";

if(isset($id_cliente)){
$resultado = mysql_query($query) or die(mysql_error());
echo "A visita foi agendada com sucesso!";

}
mysql_close ($con);
?>

<html>
 <head><title> Controle de Financas </title></head >
 <body >
 <form method ="post" name ="form" action ="agendarVisita.php">
		<center >
		<img src="money2.jpg" width ="15%"/>
		<h1> Sistema de Controle de Financas Empresarial </h1>
		<h2> Agendar nova visita </h2>
		<hr width ="700 px"/><br/>
		<p>
	
		<label for="">Favor, escolha o cliente a ser visitado :</label>
		<select name = "id_c">
		<option>Selecione...</option>
 
		<?php while($cliente = mysql_fetch_array($query_cliente)) { ?>
				<option  value="<?php echo $cliente['id_cliente'] ?>"><?php echo $cliente['nome'] ?></option>
		<?php } ?>
 
		</select>
					
		</p>
	
		<hr width ="400 px"/><br/>
	
			Data da visita: <input type="date" name = 'data_v'><br>
			<br>
			<input type="submit" value="Agendar">
			<input type="reset" value="Apagar tudo">
			<input type="hidden" name = "datetime" value = <?php echo date("YmdGis") ?> >		
	
		<input type ="button" onClick ="location.href = 'principal.php' " value = 'Voltar'>		
	</center>
 </form>
	

</html>
