<?php
require_once ("seguranca.php");

if(isset($_POST['cadastrar'])){
  $_POST['curso'] = isset($_POST['curso']) ? $_POST['curso'] : null;

  $nome = $_POST['nome'];
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  $telefone = $_POST['telefone'];
  $curso = $_POST['curso'];
  $tipo = "aluno";


  $sqlp = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
  $rs = mysql_query($sqlp,$conexao);
  $pesquisa = mysql_num_rows($rs);
  if ($pesquisa == 1) {
    echo '<script language="javascript">
       alert("Já existe um usuário ");
       window.location.href = "http://localhost:8080/TCC/cadastrar_aluno.php";
    </script>';
  }else{
    $sql = "INSERT INTO aluno (telefone,curso_aluno) VALUES ('$telefone','$curso')";
    $result = mysql_query( $sql,$conexao );
    $sqlpe = "SELECT * FROM aluno WHERE telefone = '$telefone'";
    $rsp = mysql_query($sqlpe,$conexao);
    while ($linha = mysql_fetch_array($rsp)) {
      $codigo = $linha["codigo"];

    }

    $sql = "INSERT INTO usuarios (nome, usuario, senha,tipo,dados_aluno)
    VALUES ('$nome', '$usuario', '$senha','$tipo','$codigo')";
    $result = mysql_query( $sql,$conexao );
    mysql_close($conexao);
    echo '<script language="javascript">
       alert("Vaga Inserida com Sucesso!!!");
       window.location.href = "http://localhost:8080/TCC/login.php";
    </script>';
}
}
 ?>
