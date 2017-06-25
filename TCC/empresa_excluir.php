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
         $visitante = $_SESSION['usuarioNome'];
         echo "Boas Vindas, ",$visitante; ?></li>
       </div>
        </ul>
  </div>
  <div class="geral"><!--Inicio Div Geral-->

    <div class="conteudo"><!--Inicio Div Conteudo-->
<!--INICIO Display da Vaga--->

    </div>
<!---ANEXAR CURRICULO---->
<!--FIM ANEXAR CURRICULO-->
      <div class="slider">
        <form action="empresa_excluir.php" method="POST">
          <h2>Alunos Candidatados:</h2>
          <table width="100%" border="2" cellpadding="2" cellpadding="2">
          <tr bgcolor="#33CCCC">
          <td width="10%"><b>Código</b></td>
          <td width="20%"><b>Empresa</b></td>
          <td width="20%"><b>Curso</b></td>
          <td width="20%"><b>Detalhes</b></td>
          <td width="20%"><b>Termino da Vaga</b></td>
          <td width="10%"><b>Selecionar</b></td>
          </tr>
          </table>
    <?php
    mysql_connect('localhost','root','root');
    mysql_select_db('sge');
    $sql=("SELECT * FROM vaga WHERE empresa = '".$_SESSION['usuarioNome']."'");
    $rs=mysql_query($sql) or die ("Não foi possível efetuar a consulta");
    while ($linha=mysql_fetch_array($rs))
    {
    $cod=$linha["cod"];
    $nome=$linha["empresa"];
    $usuario=$linha["curso"];
    $curso=$linha["detalhes"];
    $telefone=$linha["data"];
    ?>

    <table width="100%" border="2" cellpadding="2">
    <tr>
    <td width="10%"><?php echo "$cod" ?></td>
    <td width="20%"><?php echo "$nome" ?></td>
    <td width="20%"><?php echo "$usuario" ?></td>
    <td width="20%"><?php echo "$curso" ?></td>
    <td width="20%"><?php echo "$telefone" ?></td>
    <td width="10%"><input type="checkbox" name="interesse[]" value='<?php echo "$cod" ?>'></td>
    </tr>
    </table>
    <?php
    }
    mysql_free_result($rs);
    ?>
    <br><br>
    <div class="button-align">
    <input class="form-button" type="submit" name="enviar" value="Excluir">
    </div>
    <?php
    /*INICIO INSERT Interessados nas vagas*/
    if (isset($_POST['enviar'])){

    $interesse = isset($_POST['interesse']) ? $_POST['interesse'] : array();
    foreach ($interesse as $value) {

    $sqldel = "DELETE FROM vaga WHERE cod ='$value'";
    $rsi = mysql_query($sqldel,$conexao);
      header("Refresh:0");
    }
    echo '<script language="javascript">
       alert("Vagas excluidas com sucesso!");
       window.location.href = "http://localhost:8080/TCC/empresa_excluir.php";
    </script>';
    mysql_close($conexao);
    }
    /*FIM INSERT Interessados nas vagas*/
    ?>
</div>
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

</div><!--Fim Div Geral-->

  <div class="rodape"><!--Inicio Div Rodape-->

              <div class="conteudo-footer">
              <ul>
            <li class="noborder"><a href="a" title="" class="ativo">Home</a></li>
            <li><a href="http://www.etecbayeux.com.br" title="">Sobre nós</a></li>
            <li><a href="http://www.etecbayeux.com.br/?p=Contato" title="">Contato</a></li>
          </ul>
              <p>Todos os direitos Revervados</p>
              <h6>Centro Paula Souza</h6>
              </div>

</div><!--Fim Div Rodape-->

</body>
</html>
