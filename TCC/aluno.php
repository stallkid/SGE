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
  $sql = mysql_query("SELECT * FROM usuarios INNER JOIN aluno ON usuarios.dados_aluno = aluno.codigo WHERE  id='".$_SESSION['usuarioID']."'");
  $resultado = mysql_fetch_assoc($sql);
  $_SESSION['codAluno'] = $resultado['codigo'];
  ?>
  <div id="imagem-topo">
  <img src="img/logo cps.jpg"alt="slider 1"/>
</div>
  <div id="menu">
        <ul>
          <li><a href="logout.php" title="">Logout</a></li>
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
        <form action="aluno.php" method="POST">
      <h2>Vagas disponíveis:</h2>
      <table width="100%" border="2" cellpadding="2" cellpadding="2">
      <tr bgcolor="#33CCCC">
      <td width="10%"><b>Código</b></td>
      <td width="20%"><b>Empresa</b></td>
      <td width="20%"><b>Curso</b></td>
      <td width="40%"><b>Detalhes</b></td>
      <td width="10%"><b>Interesse</b></td>
      </tr>
      </table>
<?php
mysql_connect('localhost','root','root');
mysql_select_db('sge');
$sql=("SELECT cod, empresa, curso, detalhes FROM vaga INNER JOIN aluno ON aluno.curso_aluno = vaga.curso INNER JOIN usuarios ON usuarios.dados_aluno = aluno.codigo WHERE usuarios.nome = '".$_SESSION['usuarioNome']."'");
$rs=mysql_query($sql) or die ("Não foi possível efetuar a consulta");

while ($linha=mysql_fetch_array($rs))
{
$cod=$linha["cod"];
$empresa=$linha["empresa"];
$curso=$linha["curso"];
$detalhes=$linha["detalhes"];
?>

<table width="100%" border="2" cellpadding="2" cellpadding="2">
<tr>
<td width="10%"><?php echo "$cod" ?></td>
<td width="20%"><?php echo "$empresa" ?></td>
<td width="20%"><?php echo "$curso" ?></td>
<td width="40%"><?php echo "$detalhes" ?></td>
<td width="10%"><input type="checkbox" name="interesse[]" value='<?php echo "$cod" ?>'></td>
</tr>
</table>
<!--FIM Display da Vaga--->

<?php
}
mysql_free_result($rs);
?>
<br><br>
<div class="button-align">
<input class="form-button" type="submit" name="enviar" value="Candidatar">
</div>
<?php
/*INICIO INSERT Interessados nas vagas*/
if (isset($_POST['enviar'])){

$alunoID = $_SESSION['codAluno'];

$interesse = isset($_POST['interesse']) ? $_POST['interesse'] : array();
foreach ($interesse as $value) {
$sqli = "INSERT INTO interesse_vaga(cod_aluno,cod_vaga) VALUES ($alunoID , $value)";
$rsi = mysql_query($sqli,$conexao);
}
echo '<script language="javascript">
   alert("Cadastro efetuado com sucesso!");
   window.location.href = "http://localhost:8080/TCC/aluno.php";
</script>';
mysql_close($conexao);
}
/*FIM INSERT Interessados nas vagas*/
?>
</form>
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