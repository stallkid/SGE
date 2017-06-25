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
          <li><a href="logout.php" title="" class="ativo">Logout</a></li>
          <li><a href="empresa_vaga.php" title="">Ofertar Vagas</a></li>
          <li><a href="empresa_excluir.php" title="">Excluir Vagas</a></li>
          <li><a href="empresa_home.php" title="">Home</a></li>
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

      <h6>Insira uma Vaga no Formulário</h6>
      <form action="empresa_vaga.php" method="POST">
        <label class="info-form">Selecione o Curso destinado</label>
        <br><br><br><label>
          <input type="radio" name="curso" value="Administracao">Administração</label>
          <br><br><label>
            <input type="radio" name="curso" value="eletronica">Eletrônica</label>
            <br><br><label>
              <input type="radio" name="curso" value="informatica">Informática</label>
              <br><br><label>
                <input type="radio" name="curso" value="logistica">Logística</label>
                <br><br><label>
                  <input type="radio" name="curso" value="recursos humanos">Recursos Humanos</label>
              <br><br>
        <input class="textarea" type="text" name="detalhes" placeholder="Insira os Detalhes da vaga">
        <input class="form-button" type="submit" name="enviar" value="Lançar">

        <?php
        date_default_timezone_set('America/Sao_Paulo');
        if(isset($_POST['enviar'])){

          $empresa = $_SESSION['usuarioNome'];
          $dest = $_POST['curso'];
          $descri = $_POST['detalhes'];
          $data = date('y-m-d', strtotime('+60 days'));

        if(!empty($dest)){
          $sql = "INSERT INTO vaga(empresa, curso, detalhes,data) VALUES ('$empresa', '$dest', '$descri','$data')";
          $rs = mysql_query($sql,$conexao) or die ("não foi possivel efetuar a inserção");
          echo"Vaga inserida com Sucesso";
          mysql_close($conexao);
        }
        echo '<script language="javascript">
           alert("Vaga Inserida com Sucesso!");
           window.location.href = "http://localhost:8080/TCC/empresa_vaga.php";
        </script>';
      }
         ?>
       </div>
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


    <!--</div><!Fim Div Conteudo-->
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
