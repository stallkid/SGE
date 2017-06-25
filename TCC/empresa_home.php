<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
    <div class="conteudo"><!--Inicio Div Conteudo-->
    </div>
      <div class="slider">


          <h2>Alunos Candidatados:</h2>
          <table width="100%" border="2" cellpadding="2" cellpadding="2">
          <tr bgcolor="#33CCCC">
          <td width="10%"><b>Código</b></td>
          <td width="20%"><b>Nome do aluno</b></td>
          <td width="20%"><b>E-mail</b></td>
          <td width="20%"><b>Curso</b></td>
          <td width="20%"><b>Telefone</b></td>
          </tr>
          </table>
    <?php
    mysql_connect('localhost','root','root');
    mysql_select_db('sge');
    $sql=("SELECT u.id, u.nome, u.usuario, a.curso_aluno, a.telefone
      FROM usuarios as u
      Inner join aluno as a on u.dados_aluno = a.codigo
      Inner join interesse_vaga as iv on a.codigo = iv.cod_aluno
      inner join vaga as v on iv.cod_vaga = v.cod
      where v.empresa = '".$_SESSION['usuarioNome']."'");

    $rs=mysql_query($sql) or die ("Não foi possível efetuar a consulta");
    while ($linha=mysql_fetch_array($rs))
    {
    $cod=$linha["id"];
    $nome=$linha["nome"];
    $usuario=$linha["usuario"];
    $curso=$linha["curso_aluno"];
    $telefone=$linha["telefone"];
    ?>

    <table width="100%" border="2" cellpadding="2">
    <tr>
    <td width="10%"><?php echo "$cod" ?></td>
    <td width="20%"><?php echo "$nome" ?></td>
    <td width="20%"><?php echo "$usuario" ?></td>
    <td width="20%"><?php echo "$curso" ?></td>
    <td width="20%"><?php echo "$telefone" ?></td>

    </td>
    </tr>
    </table>
    <?php
    }
    mysql_free_result($rs);
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
            <li><a href="a" title="">Sobre nós</a></li>
            <li><a href="a" title="">Portifólio</a></li>
            <li><a href="a" title="">Contato</a></li>
          </ul>
              <p>Todos os direitos Revervados</p>
              <h6>Centro Paula Souza</h6>
              </div>

</div><!--Fim Div Rodape-->

</body>
</html>
