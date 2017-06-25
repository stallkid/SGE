<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<link href="CSS/reset.css" rel="stylesheet" type="text/css"/>
<link href="CSS/estilo(html).css"rel="stylesheet" type="text/css" />

</head>

<body>
  <?php
  include 'seguranca.php';
  protege();
  atualizaVaga();
  ?>
  <div id="imagem-topo">
  <img src="img/logo cps.jpg"alt="slider 1"/>
  </div>
  <div id="menu">
        <ul>
          <li><a href="logout.php" title="">Logout</a></li>
          <li><a href="admin_alunos.php" title="">Alunos</a></li>
          <li><a href="cadastrar_empresa.php" title="">Cadastrar Empresa</a></li>
          <li><a href="admin_home.php" title="">Home</a></li>
       <div class="boas-vindas">
         <li class="welcome"><?php
         echo "Boas Vindas, ",$_SESSION['usuarioNome'];
         ?></li>
       </div>
        </ul>
  </div>
  <div class="geral"><!--Inicio Div Geral-->
<div class="conteudo">
</div>
  <!--INICIO Formulário de Inserção da Vaga-->
  <div class="slider">
    <div class="cadastro"><!--Inicio Div Conteudo-->
      <h2>Cadastro da Empresa</h2>
      <form method="post" action="cadastrar_empresa.php">
        <label for="nome">Nome da Empresa</label>
  				<input type="text" name="nome" placeholder="Escreva o Nome da Empresa">
        <label for="usuario">E-mail da Empresa</label>
  				<input type="text" name="usuario" placeholder="Escreva o Usuário">
        <label for="senha">Senha</label>
  				<input type="text" name="senha" placeholder="Escreva a Senha">

  			<input class="form-button" type="submit" value="Cadastrar" name="cadastrar">
    </div>
        <?php
        if(isset($_POST['cadastrar'])){

          $nome = $_POST['nome'];
          $usuario = $_POST['usuario'];
          $senha = $_POST['senha'];
          $tipo = "empresa";

          $sqlp = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
          $rs = mysql_query($sqlp,$conexao);
          $pesquisa = mysql_num_rows($rs);
          if ($pesquisa == 1) {
            echo '<script language="javascript">
               alert("Já existe um usuário ");
               window.location.href = "http://localhost:8080/TCC/cadastrar_aluno.php";
            </script>';
          }else{
            $sql = "INSERT INTO usuarios (nome,usuario,senha,tipo) VALUES ('$nome','$usuario','$senha','$tipo')";
            $result = mysql_query( $sql,$conexao );
            mysql_close($conexao);
        }
        }
         ?>


  </div><!--FIM Formulário de Inserção da Vaga-->
      </form>
      <div class="portfolio">
          <h5>Informação sobre os Cursos</h5>
            <ul>
              <li><a href="http://www.etecbayeux.com.br/?c=Inform%C3%A1tica" title=""><img class="cursosimg" src="img/informatica.jpeg" alt="" height="100px" width="100px"></a>
              <li><a href="http://www.etecbayeux.com.br/?c=Mec%C3%A2nica_" title=""><img class="cursosimg" src="img/mecanica.jpeg" alt="" height="100px" width="100px"></a></li>
              <li><a href="http://www.etecbayeux.com.br/?c=Eletroeletr%C3%B4nica" title=""><img class="cursosimg" src="img/eletroeletronica.jpeg" alt="" height="100px" width="100px"></a></li>
              <li><a href="http://www.etecbayeux.com.br/?c=Administra%C3%A7%C3%A3o" title=""><img class="cursosimg" src="img/administracao.jpeg" alt="" height="100px" width="100px"></a></li>
              <li><a href="http://www.etecbayeux.com.br/?c=Recursos_Humanos" title=""><img class="cursosimg" src="img/rh.jpeg" alt="" height="100px" width="100px"></a>
              <li><a href="http://www.etecbayeux.com.br/?c=Log%C3%ADstica" title=""><img class="cursosimg" src="img/logistica.jpeg" alt="" height="100px" width="100px"></a>
            </ul>
     </div>
     </div>

</div><!--Fim Div Geral-->

  <div class="rodape"><!--Inicio Div Rodape-->

              <div class="conteudo-footer">
              <ul>
            <li class="noborder"><a href="a" title="" class="ativo">Home</a></li>
            <li><a href="a" title="">Sobre nós</a></li>
            <li><a href="a" title="">Portifólio</a></li>
            <li><a href="a" title="">Serviços</a></li>
            <li><a href="a" title="">Blog</a></li>
            <li><a href="a" title="">Contato</a></li>
          </ul>
          <br><br>
              <h6>Centro Paula Souza</h6>
              </div>

</div><!--Fim Div Rodape-->

</body>
</html>
