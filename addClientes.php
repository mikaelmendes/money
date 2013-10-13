<?php 
 include "valida_sessao.php";
 include "conectar_banco.inc";  
 $nome_usuario = $_SESSION ["nome_usuario"];
 $id_usuario = $_SESSION ["id_usuario"];

$nome = $_POST['name_user'];
$sexo = $_POST['sexo'];
$cpf= $_POST['cpf'];
$email=  $_POST['email'];
$tel= $_POST['tel'];
$nasc= $_POST['nasc'];
$estadocivil= $_POST['estadocivil'];	
$endereco= $_POST['end'];

$query = "INSERT INTO money.clientes(
		nome,
		email,
		telefone,	
		sexo,	
		estado_civil,	
		cpf,	
		endereco,	
		nasc
	  ) VALUES (
		'$nome',
		'$email',
		'$tel',	
		'$sexo',	
		'$estadocivil',	
		'$cpf',	
		'$endereco',	
		'$nasc'
)";
if(isset($nome)){
$resultado = mysql_query($query) or die(mysql_error());
echo "O usuario foi cadastrado com sucesso!";
}
mysql_close ($con);
?>

<html>
 <head><title> Controle de Financas </title></head >
 <body >
 <form method ="post" name ="form" action ="addClientes.php">
		<center >
		<img src="money2.jpg" width ="15%"/>
		<h1> Sistema de Controle de Financas Empresarial </h1>
		<h2> Cadastrar novo cliente </h2>
		<hr width ="700 px"/><br/>

	
			Nome: <input type = "text" name= 'name_user' required><br>
			Sexo: 
			<select name= "sexo">
					<option value ="2" > Masculino </option>
					<option value ="1" > Feminino </option>					
				</select>
				<br>
			CPF(Somente números): <input type = "text" name = 'cpf' required><br>

			Data de Nascimento: <input type="date" name = 'nasc'><br>
			Estado Civil :
			<select name= "estadocivil">
					<option value ="1" > Solteiro </option>
					<option value ="2" > Casado </option>
					<option value ="3" > Separado </option>
					<option value ="4" > Divorciado </option>
					<option value ="5" > Viuvo </option>
					<option value ="6" > Uniao estavel </option>
				</select>
			<br><br>
			Endereco: <input type = "text" name= 'end' required><br>
			Email: <input type = "email" name = "email" required><br>
			Telefone: <input type = "text" name = "tel" required><br>
			
		<input type ="button" onClick ="location.href = 'principal.php' " value = 'Voltar'>		
			<?php $data = date("ymdGis")?>
			<input type="submit" value="Efetuar cadastro">
			<input type="reset" value="Apagar tudo">
			<input type="hidden" name = "data" value = <?php $data ?> >		
	</center>
 </form>
	
</html>
