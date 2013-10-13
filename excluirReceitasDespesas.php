 <?php
 include "valida_sessao.php";
 include "conectar_banco.inc";
 $nome_usuario = $_SESSION ["nome_usuario"];
 $id_usuario = $_SESSION ["id_usuario"];
 $mes = $_GET["mes"];
 $tipo = $_GET["tipo"];
 $classe = $_GET["classe"];
 $nome = $_GET["nome"];
 $tipo = $_GET["tipo"];

 if ($classe == 1){
		$resultado = mysql_query("SELECT * FROM receitas_despesas WHERE classe = 1 and tipo = $tipo and mes_referencia = $mes 
								and usuario = $id_usuario and nome = '$nome'");
								
		$linhas = mysql_num_rows($resultado);
		if($linhas==0) // testa se a consulta retornou algum registro
		{
			echo "<html ><body >";
			echo "<p align =\" center \">Falha ao excluir. Confira se preencheu todos os campos corretamente!</p>";			
			echo " </body ></ html >";
		}
		 else{
			$sql= mysql_query("DELETE FROM receitas_despesas WHERE classe = 1 and tipo = $tipo and mes_referencia = $mes 
									and usuario = $id_usuario and nome = '$nome'"); /*linha para excluir do banco de dados.*/
			echo "Dados excluidos com sucesso!";
				
		}
	}
	else{
		 $resultado = mysql_query("SELECT * FROM receitas_despesas WHERE classe = 2 and tipo = $tipo 
				and usuario = $id_usuario and nome = '$nome'");
								
		$linhas = mysql_num_rows($resultado);
		if($linhas==0) // testa se a consulta retornou algum registro
		{
			echo "<html ><body >";
			echo "<p align =\" center \">Falha ao excluir. Confira se preencheu todos os campos corretamente!</p>";
			echo " </body ></ html >";
		}
		 else{
			$sql= mysql_query("DELETE FROM receitas_despesas WHERE classe = 2 and tipo = $tipo
									and usuario = $id_usuario and nome = '$nome'"); 
			echo "Dados excluidos com sucesso!";
				
		}
	}

mysql_close ($con);
?>

<a href = "principal.php"> Voltar</a>

