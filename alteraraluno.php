<!doctype html>
<html>
<html lang="pt-br">
<head>
<meta charset="uth-8">
<meta name= "author" content="lud">
<meta name= "description" content="introdução">
<meta name="keywords" content="tag, html, metadados">
<title> Alterar aluno </title>
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
<center> <h2> alterar aluno </h2>   
<?php
if (empty($_GET['confirmar'])){
if (empty($_GET['codigo'])) {
echo "erro ao selecionar aluno a ser alterado";
echo "<a href='gerenciaralunos.php'> cancelar </a>";
}

else {
$codalterar=$_GET['codigo'];
$DB_servidor="localhost";
$DB_login="root";
$DB_senha="";
$DB_NomeBanco="aulabanco";
$DB_charset="UTF8";
$conexaoBanco= mysqli_connect($DB_servidor, $DB_login, $DB_senha, $DB_NomeBanco) or die (mysqli_error($conexaoBanco));  //acessando o banco de dados
mysqli_set_charset($conexaoBanco, $DB_charset) or die (mysqli_error($conexaoBanco));


$RA=$_GET['codigo'];
$comandoSQL= "select * from aulabanco where RA='".$codalterar."'";
$res= mysqli_query($conexaoBanco, $comandoSQL) or die (mysqli_error($conexaoBanco));
$linha= mysqli_fetch_assoc($res);

if ($linha==NULL){
    echo "erro ao buscar aluno no banco de dados";
    echo "<a href='gerenciaralunos.php'> cancelar </a>";
    
}

else {
    ?>
<form action= "alteraraluno" method= "GET">
    <table border= "0">
        <tr>
            <th align="right" width="80px"> RA: </strong></th>
            <td> <strong> <?php echo $linha['RA']; ?>
               <input type="hidden" name="IRA" size="7" value='<?php echo $linha['RA']; ?>'> 
                             </td>
</tr>
<tr>
            <th align="right">Nome: </th>
            <td>
            <input type="text" name="Inome" size="30" value='<?php echo $linha['nome']; ?>'>
         </td>
</tr>
<tr>
            <th align="right">Email:  </th>
            <td>
                <input type="text" name="Iemail"  size="30" value='<?php echo $linha['email']; ?>'>
            </td>
</tr>
<tr>
            <th align="right">Telefone: </th>
            <td>
            <input type="text" name="Itel" size="10" value='<?php echo $linha['telefone']; ?>'>       
        </td>
</tr>
<tr>
            <th align="right">RG: </th>
            <td> 
            <input type="text" name="IRG" size="16" value='<?php echo $linha['RG']; ?>'>
            </td>
</tr>
<tr>
            <th align="right">CPF: </th>
            <td> 
            <input type="text" name="ICPF" size="16" value='<?php echo $linha['CPF']; ?>'>
            </td>
</tr>
<tr>
    <td colspan="2"> <center>
     <input class="button" type="submit" value="confirmar" name="confirmar"> 
     <a href="gerenciaralunos.php"> cancelar </a> </td> </center>

    </tr>
    </center>
    </table>
    </form>
  
<?php
}
mysqli_close($conexaoBanco) or die (mysqli_error($conexaoBanco));
}

}
else {
    $RA= $_GET['IRA'];
    $nome= $_GET['Inome'];
    $email= $_GET['Iemail'];
    $telefone= $_GET['Itel'];
    $RG= $_GET['IRG'];
    $CPF= $_GET['ICPF'];
    $DB_servidor="localhost";
    $DB_login="root";
    $DB_senha="";
    $DB_NomeBanco="aulabanco";
    $DB_charset="UTF8";
    $conexaoBanco= mysqli_connect($DB_servidor, $DB_login, $DB_senha, $DB_NomeBanco) or die (mysqli_error($conexaoBanco));  //acessando o banco de dados
    mysqli_set_charset($conexaoBanco, $DB_charset) or die (mysqli_error($conexaoBanco));
    $comandoSQL="update aulabanco".
    " set nome='".$nome."', email='".$email."', telefone='".$telefone."', RG='".$RG."',  CPF='".$CPF."' ".
    "where RA='".$RA."'";
    $res= mysqli_query($conexaoBanco, $comandoSQL) or die (mysqli_error($conexaoBanco));
    mysqli_close($conexaoBanco) or die (mysqli_error($conexaoBanco));
    echo "aluno alterado com sucesso!";
    echo "<br> <a href='gerenciaralunos.php' > voltar</a>"; 
}
?>

</body>
</html>