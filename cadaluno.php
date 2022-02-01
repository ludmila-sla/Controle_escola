<!doctype html>
<html>
<html lang="pt-br">
<head>
<meta charset="uth-8">
<meta name= "author" content="lud">
<meta name= "description" content="introdução">
<meta name="keywords" content="tag, html, metadados">
<title> cadastrar aluno </title>
<style>
table {
    border-collapse: collapse;
   
}
th {
    background-color: #4CAF50;
    color: white;
}
th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    
}

tr:nth-child(even) {background-color: #f2f2f2}
.button {
  font-size: 17px;
  background-color: white;
    color: black;
    border: 2px solid #4CAF50;
    border-radius: 4px;}
</style>
</head>
<body>
<center> <h2> cadastrar aluno </h2>

<form action= "" method= "GET">
    <table border= "1">
        <tr>
            <th align="right" width="80px">RA: </th>
            <td>
                <input type="text" name="IRA" size="7">
                             </td>
</tr>
<tr>
            <th align="right">Nome: </th>
            <td>
            <input type="text" name="Inome" size="30">
         </td>
</tr>
<tr>
            <th align="right">Email: </th>
            <td>
                <input type="text" name="Iemail"  size="30">
            </td>
</tr>
<tr>
            <th align="right">Telefone: </th>
            <td>
            <input type="text" name="Itel" size="10">       
        </td>
</tr>
<tr>
            <th align="right">RG: </th>
            <td> 
            <input type="text" name="IRG" size="16">
            </td>
</tr>
<tr>
            <th align="right">CPF: </th>
            <td> 
            <input type="text" name="ICPF" size="16">
            </td>
</tr>
<tr>
    <td colspan="2"> <center><input class="button" type="submit" value="cadastrar" name="cadastrar"> </center>

</td>  
</tr>
</table>
</form>
<?php

    if (!Empty ($_GET['cadastrar'])){
        $RA= $_GET['IRA'];
        $nome= $_GET['Inome'];
        $email= $_GET['Iemail'];
        $telefone= $_GET['Itel'];
        $RG= $_GET['IRG'];
        $CPF= $_GET['ICPF'];
       // echo "...".$RA."...".$nome."...".$email."...".$telefone."...".$CPF."...".$RG;
       $DB_servidor="localhost";
   $DB_login="root";
   $DB_senha="";
   $DB_NomeBanco="aulabanco";
   $DB_charset="UTF8";
   $conexaoBanco= mysqli_connect($DB_servidor, $DB_login, $DB_senha, $DB_NomeBanco) or die (mysqli_error($conexaoBanco));  //acessando o banco de dados
   mysqli_set_charset($conexaoBanco, $DB_charset) or die (mysqli_error($conexaoBanco));

   $comandoSQL= "insert into aulabanco values('".$RA."','".$nome."','".$email."', '".$telefone."', '".$RG."', '".$CPF."')";
   echo "aluno cadastrado com sucesso!";
  $res= mysqli_query($conexaoBanco, $comandoSQL) or die (mysqli_error($conexaoBanco));
  mysqli_close($conexaoBanco) or die (mysqli_error($conexaoBanco));
  echo "<br> <a href='gerenciaralunos.php' > voltar</a>"; 

    }
    
    echo "<br> <a href='gerenciaralunos.php' > cancelar</a>"; 

?>
</center>
</body>
</html>