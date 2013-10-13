<?php
 include "valida_sessao.php";
 include "conectar_banco.inc";
 
 $nome_usuario = $_SESSION ["nome_usuario"];
 $perfil_usuario = $_SESSION ["perfil_usuario"];
 
 $resultado = mysql_query (" SELECT * FROM usuarios WHERE login ='$nome_usuario'");
 $sexo = mysql_result ($resultado,0,"sexo");
 $nome = mysql_result ($resultado,0,"nome");

mysql_close ($con);

 switch ( $sexo ) {
	 case 1:
		 $saud = "Oi , Sra. " . $nome ;
		 break ;
	 case 2:
		$saud = "Oi , Sr. " . $nome ;
		break ;
 }
 switch ( $perfil_usuario ) {
	 case 1:
		 $perfil = "Padrão";
		 break ;
	 case 2:
		$perfil = "Administrador";
		break ;
 }
 ?> 
 
 <html>
 <head><title> Controle de Financas </title></head>
 <body>
 <form method ="POST" action ="login.php">
	 <center>
	 <img src="money2.jpg" width ="15%"/>
	 <h1> Sistema de Controle de Financas Empresarial </h1>
	 <hr width ="700 px"/><br />
	 <?php echo $saud . " " . "[ Perfil : ". $perfil . "]";?> <a href =" logout.php">Sair </a>
	 <hr width ="700 px" />
	 <p>Favor , escolha a campo desejada : </p>
	 <b> Incluir : </b> <br/>
	 <a href =" receitas_despesas.php?t=1">Receitas </a> <br/>
	 <a href =" receitas_despesas.php?t=2">Despesas </a> <br/><br/> 
	<p STYLE="border-style: dotted ;border-color :blue;max-width:200px;">
			
			<a href =" addClientes.php">Adicionar Clientes </a> <br/>
			<a href =" agendarVisita.php">Agendar Visita </a> <br/>
			<a href =" visitaPendente.php">Visitas pendentes </a> <br/>
	</p>
	</p>
	<br>
	
	
	 <b> Visualizar : </b> <br/>
	 Saldos Mensais : <a href =" saldosMensaisPlan.php" >[ Planilha ]</a>
	 <br/>
	 <b> Excluir : </b> <br/>
	 <a href =" excluirReceitasDespesas.html">Receitas e Despesas </a> <br/> <br/>
	 <?php
	 if ( $perfil_usuario ==2){ ?>
		 <b>Campo Administracao : </b> <br />
		 <a href ="addUsuarios.php">Adicionar usuarios </a> <br/>
		 <a href ="delUsuarios.php">Excluir usuarios </a> <br/> <br/>
	 <?php } ?>
	 </center >
 </form>
 </body>
 </html>
