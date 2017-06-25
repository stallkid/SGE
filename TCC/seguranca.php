<?php
//Conexão com o Banco de dados
$conexao = mysql_connect ("localhost", "root", "root") or die ("Servidor não encontrado!");
// Conexão com a tabela do banco
$db = mysql_select_db ("sge", $conexao) or die ("Não foi possível selecionar o banco de dados!!");
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
ini_set('upload_max_filesize', '10M');

// Inicia a sessão
  session_start();

// Função para proteger as páginas
function protege(){
  if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])){
//não há usuário logado, manda pra pagina login
    expulsaVisitante();
  }
}


// Função para remover visitante
function expulsaVisitante() {
// Retiram as variaveis de sessão do usuário
  unset($_SESSION['usuariotipo'],$_SESSION['usuarioID'],$_SESSION['usuarioNome']);
// Redireciona o usuário para a página de Login
/*echo"<script language='javascript' type='text/javascript'>alert('Usuário Invalido!');window.location.href='login.php';</script>";*/
  header("Location:login.php");

}
//Função para Excluirem as vagas fora do prazo
function atualizaVaga(){
// Define o horário da data para o Padrão de São Paulo
    date_default_timezone_set('America/Sao_Paulo');
// Define a variável data como o Dia de Hoje
      $data = date('y-m-d');
/* Faz a exclusão da informação do Banco se a data do banco
 for menor que hoje*/
    $sqle = "DELETE vaga.*,interesse_vaga.* FROM vaga, interesse_vaga WHERE vaga.data < '$data'";
    mysql_query($sqle);
}

function upload_file(){

  if(isset($_POST['upload']))
  {

   $file = rand(1000,100000)."-".$_FILES['file']['name'];
      $file_loc = $_FILES['file']['tmp_name'];
   $file_size = $_FILES['file']['size'];
   $file_type = $_FILES['file']['type'];
   $folder="uploads/";

   // new file size in KB
   $new_size = $file_size/1024;
   // new file size in KB

   // make file name in lower case
   $new_file_name = strtolower($file);
   // make file name in lower case

   $final_file=str_replace(' ','-',$new_file_name);

   if(move_uploaded_file($file_loc,$folder.$final_file))
   {
    $sql = "INSERT INTO upload (file,type,size) VALUES('$final_file','$file_type','$file_size')";
    mysql_query($sql) or die('Error, query failed');
}
}
}
  ?>
