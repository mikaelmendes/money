<?php 
 include "valida_sessao.php";
 include "conectar_banco.inc";  
 $nome_usuario = $_SESSION ["nome_usuario"];
 $id_usuario = $_SESSION ["id_usuario"];

$nome = $_POST['name_user'];
$sexo = $_POST['sexo'];
$cpf= $_POST['cpf'];
$email=  $_POST['email'];
$senha= $_POST['senha'];
$login = $_POST['login'];
$tipouser= $_POST['tipouser'];
$rg= $_POST['rg'];	
$nasc= $_POST['nasc'];
$estadocivil= $_POST['estadocivil'];	
$funcao= $_POST['funcao'];
$tel= $_POST['tel'];
$cad_data= $_POST['data'];

$query = "INSERT INTO money.usuarios(
		login,
		senha,
		nome,
		sexo,
		identidade,	
		cpf,	
		nascimento,	
		estado_civil,	
		funcao_empresa,	
		email,	
		telefone,	
		perfil,
		cad_usuario,
		cad_datahora

	  ) VALUES (
		'$login',
		'$senha',
		'$nome',
		'$sexo',
		'$rg', 
		'$cpf',
		'$nasc',
		'$estadocivil',
		'$funcao',
		'$email',
		'$tel',
		'$tipouser',	
		'$id_usuario',
		'$cad_data'
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
 <form method ="post" name ="form" action ="addUsuarios.php">
		<center >
		<img src="money2.jpg" width ="15%"/>
		<h1> Sistema de Controle de Financas Empresarial </h1>
		<h2> Cadastrar novo usuário </h2>
		<hr width ="700 px"/><br/>
		<p>Favor, escolha o perfil do usuário :
		<select name ="tipouser">
			<option value ="1" > Administrador </option>
			<option value ="2" > Padrao </option>
		</select>
		</p>
	
		<hr width ="400 px"/><br/>
		<h3>Dados Pessoais:</h3>
			Nome: <input type = "text" name= 'name_user'><br>
			Sexo: 
			<select name= "sexo">
					<option value ="2" > Masculino </option>
					<option value ="1" > Feminino </option>					
				</select>
				<br>
			CPF(Somente números): <input type = "text" name = 'cpf'><br>
			Numero de Indentidade(RG) (somente numeros): <input type = text name = 'rg'><br>
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
		<hr width = "400 px"/><br/>
		<h3>Dados Profissionais:</h3>
			Funcao na Empresa: <input type = "text" name = "funcao"><br>
			Email: <input type= "email" name = "email"><br>
			Telefone: <input type="text" name = "tel"><br>
			<br><br>
			<hr width = "400 px"/><br/>
		<h3>Dados de acesso: </h3>
			Login: <input type = "text" name = "login"><br>
			Senha: <input type = "password" name = "senha"><br>
			<br><br>
			
			<input type="submit" value="Efetuar cadastro">
			<input type="reset" value="Apagar tudo">
			<input type="hidden" name = "data" value = <?php echo date("YmdGis") ?> >		
	
		<input type ="button" onClick ="location.href = 'principal.php' " value = 'Voltar'>		
	</center>
 </form>
	
</html>
