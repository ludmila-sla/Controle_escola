<!doctype html>
<html>
<html lang="pt-br">
<head>
<meta charset="uth-8">
<meta name= "author" content="lud">
<meta name= "description" content="introdução">
<meta name="keywords" content="tag, html, metadados">
<title> gerenciar alunos </title>
<style>
table {
    border-collapse: collapse;
    width: 100%;
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
   <center> <h2> gerenciar alunos </h2> 
   
   
    
   </center>
   <?php
   $DB_servidor="localhost";
   $DB_login="root";
   $DB_senha="";
   $DB_NomeBanco="aulabanco";
   $DB_charset="UTF8";
   $conexaoBanco= mysqli_connect($DB_servidor, $DB_login, $DB_senha, $DB_NomeBanco) or die (mysqli_error($conexaoBanco));  //acessando o banco de dados
   mysqli_set_charset($conexaoBanco, $DB_charset) or die (mysqli_error($conexaoBanco));

  

  $comandoSQL= "select * from aulabanco";
  $res= mysqli_query($conexaoBanco, $comandoSQL) or die (mysqli_error($conexaoBanco));
   if (!mysqli_num_rows($res)) {
       echo "não existem alunos cadastrados";
   }
   else {
     
       ?>
       <center>
      
       <table border='1' cellpading='3' cellspacing='0'>
       
       <tr> 
       <th>RA </th> 
       <th > nome</th>
        <th > email</th>
        <th >telefone </th> 
       <th > RG</th>
        <th > CPF</th>
        <th > </th>
        <th > </th>
    
        </tr>
       <?php
       $contl=1;
       $linha=mysqli_fetch_assoc($res);
       while ($linha!=null){
       if ($contl==2){
        
        $contl = 1;
       }
       else{
         
         $contl++;
       }
 
       
        
           echo "<td>".$linha['RA']."</td>";
           echo "<td>".$linha['nome']."</td>";
           echo "<td>".$linha['email']."</td>";
           echo "<td>".$linha['telefone']."</td>";
           echo "<td>".$linha['RG']."</td>";
           echo "<td>".$linha['CPF']."</td>";
           echo "<td> ".
           " <a href='alteraraluno.php?codigo=".$linha['RA']."'>".
           "<img src='imagens/alterar.png 'width='20'>".
           
           " </a>".
           " </td>";
           echo "<td> ".
           
           " <a href='excluiraluno.php?codigo=".$linha['RA']."'> ".
           " <img src='imagens/excluir.png' width='20'>".
           "</a>".
           " </td>";
           echo "</tr>\n";
          $linha= mysqli_fetch_assoc($res);
       }
    }
   ?>
   </table> <br>
   <form action="cadaluno.php" method="GET" >
  
   <input class="button" type= "submit" value= 'NOVO'>
 
   </form>
  
   </center>
   <?php
  
   mysqli_close($conexaoBanco) or die (mysqli_error($conexaoBanco));
   ?>
</body>
</html>