<!doctype html>
<html>
<html lang="pt-br">
<head>
<meta charset="uth-8">
<meta name= "author" content="lud">
<meta name= "description" content="introdução">
<meta name="keywords" content="tag, html, metadados">
<title> excluir aluno </title>
<style>

.button {
  font-size: 17px;
  background-color: white;
    color: black;
    border: 2px solid #4CAF50;
    border-radius: 4px;}
</style>
</head>
<body>
<center> <h2> excluir aluno </h2>

<?php
   $DB_servidor="localhost";
   $DB_login="root";
   $DB_senha="";
   $DB_NomeBanco="aulabanco";
   $DB_charset="UTF8";
   $conexaoBanco= mysqli_connect($DB_servidor, $DB_login, $DB_senha, $DB_NomeBanco) or die (mysqli_error($conexaoBanco));  //acessando o banco de dados
   mysqli_set_charset($conexaoBanco, $DB_charset) or die (mysqli_error($conexaoBanco));

 
  $RA=$_GET['codigo'];
  $comandoSQL= "select * from aulabanco where RA='".$RA."'";
  $res= mysqli_query($conexaoBanco, $comandoSQL) or die (mysqli_error($conexaoBanco));
  $linha= mysqli_fetch_assoc($res);
  if ($linha!=NULL){
      echo "aluno a ser apagado <br>";
      echo "RA: ".$linha['RA'];
      echo "<br> nome: ".$linha['nome'];
      echo "<br> email: ".$linha['email'];
      echo " <br>RG: ".$linha['RG'];
      echo "<br> CPF: ".$linha['CPF'];
      echo "<br> confirma exclusão?";
      echo "<br><form action='' method='get'>". 
      "<input class='button' type= 'submit' name='confirmar' value='confirmar'>". 
      "<input type='hidden' name='codigo' value='".$linha['RA']."'>";
      echo "<br> <a href='gerenciaralunos.php'> cancelar </a>";
      echo "<br> <a href='gerenciaralunos.php' > voltar</a>"; 
      if (!Empty ($_GET['confirmar'])){
        $RA=$_GET['codigo'];
        $comandoSQL="delete from aulabanco where RA=".$linha['RA'];
        $res= mysqli_query($conexaoBanco, $comandoSQL) or die (mysqli_error($conexaoBanco));
        echo "aluno excluido com sucesso!";
        echo "<br> <a href='gerenciaralunos.php' > voltar</a>"; 
  }
  }
    $res= mysqli_query($conexaoBanco, $comandoSQL) or die (mysqli_error($conexaoBanco));
  mysqli_close($conexaoBanco) or die (mysqli_error($conexaoBanco));
  ?>
</body>
</html>