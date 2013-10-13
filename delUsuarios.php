<?php 
 include "valida_sessao.php";
 include "conectar_banco.inc";  
 $nome_usuario = $_SESSION ["nome_usuario"];
 $id_usuario = $_SESSION ["id_usuario"];
 $login = $_POST["login"];
 $senha = $_POST["senha"];


$resultado = mysql_query("SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha' ");
								
$linhas = mysql_num_rows($resultado);
		if($linhas==0) // testa se a consulta retornou algum registro
		{
			echo "<html><body >";
			echo "<p align =\" center \">Falha ao excluir. Confira se preencheu todos os campos corretamente!</p>";			
			echo " </body ></ html >";
		}
		 else{
			$sql= mysql_query("DELETE FROM usuarios WHERE login = '$login' and senha = '$senha'"); /*linha para excluir do banco de dados.*/
			echo "Dados excluidos com sucesso!";
				
			}
mysql_close ($con);
?>




<html>
 <head><title> Controle de Financas </title></head >
 <body >
 <form method ="post" name ="form" action ="delUsuarios.php">
		<center >
		<img src="money2.jpg" width ="15%"/>
		<h1> Sistema de Controle de Financas Empresarial </h1>
		<h2> Excluir usuário </h2>
		<hr width ="700 px"/><br/>
		Login do usuario a ser removido : <input type = "text" name= 'login'><br>
		Senha do usuario: <input type = "password" name = "senha"><br>
			<br><br>
			<input type="submit" value="Apagar usuario">
			<input type="reset" value="Apagar tudo">
			<input type="hidden" name = "data" value = "data">		
	
		<input type ="button" onClick ="location.href = 'principal.php' " value = 'Voltar'>		
	</center>
 </form>
	
</html>
