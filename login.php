<?php
 // obtem os valores digitados
 	$username = $_POST['username'];
 	$senha = $_POST ['senha'];
 // acesso ao banco de dados
 	include "conectar_banco.inc";
 	$resultado = mysql_query("SELECT * FROM usuarios where login ='$username'");
 	$linhas = mysql_num_rows($resultado);
 	if($linhas==0) // testa se a consulta retornou algum registro
 	{
		 echo "<html ><body >";
		 echo "<p align =\" center \">Usuario nao encontrado !</p>";
		 echo "<p align =\" center \"><a href =\" index.html \"> Voltar </a></p>";
		 echo " </body ></ html >";
 	}
 	else
 	{
		if ($senha != mysql_result($resultado , 0, "senha")) // confere senha
			{	
				 echo "<html><body >";
				 echo "<p align =\" center \">A senha esta incorreta !</p>";
				 echo "<p align =\" center \"><a href =\" index.html \"> Voltar </a ></p>";
				 echo " </body></ html>";
			}
		else // usuario e senha corretos . Vamos gravar as informacaoes na sessao .
		{
			 $id = mysql_result ( $resultado , 0, "id"); // id do usuario .
			 $perfil = mysql_result ( $resultado , 0, "perfil"); // perfil do usuario .
			 // Iniciar ~aSesso .
			 session_start ();
			 $_SESSION ['nome_usuario'] = $username;
			 $_SESSION ['senha_usuario'] = $senha;
			 $_SESSION ['perfil_usuario'] = $perfil;
			 $_SESSION ['id_usuario'] = $id;
			 // direciona para a pagina inicial do sistema .
			 header("Location:principal.php");
		}
	}
 // Encerrar a conexao com o banco de dados .
 mysql_close ($con);
?>
