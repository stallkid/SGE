<?php
// Inclui o arquivo com o sistema de segurança
// Faz a conexão com o banco de dados
require_once ("seguranca.php");
// Recupera o valor do formulário
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
// Consulta MySQL para armazenar a variável tipo na sessão
$sql = mysql_query("SELECT * FROM usuarios WHERE  usuario='$usuario' and senha='$senha'");
$resultado = mysql_fetch_assoc($sql);

$_SESSION['usuarioID'] = $resultado['id'];
$_SESSION['usuarioNome'] = $resultado['nome'];
$_SESSION['usuariotipo'] = $resultado['tipo'];
// Pesquisando se há o usuário em questão
 $qregistro = mysql_num_rows($sql);
 if($qregistro<1 and $qregistro>1)
 // Se não encontrar o usuário, ele será dirigido até o Login novamente
 {
   header("refresh: 3; url=login.php");
 } else {
   //Se o Tipo do usuario for aluno, ele será redirecionado
switch ($_SESSION['usuariotipo']) {
  //Se o Tipo do usuario for aluno, ele será redirecionado
  case 'aluno':
    header("location: aluno.php");
    break;
  //Se o Tipo do usuario for empresa, ele será redirecionado
  case 'empresa':
    header("location: empresa_home.php");
    break;
  case 'admin':
    header("location: admin_home.php");
    break;
    default:
    echo '<script language="javascript">
         alert("Usuário Invalido!");
         window.location.href = "http://localhost:8080/TCC/login.php";
 </script>';
    //expulsaVisitante();
    break;
  }
}

 ?>
