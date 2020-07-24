
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
include("conexao.php");
//codigo para guardar imagem na database
if (isset($_FILES['imagem'])){
$extensao =strtolower(substr($_FILES['imagem']['name'],-4));
$novo_nome = md5(time()).$extensao;
$diretorio ="upload/";
move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);
      $sql_code ="insert into tab (id,arquivo,data) values (null,'$novo_nome',NOW())";
    $resultado=mysqli_query($conn,$sql_code);
    var_dump($resultado);
}
     ?>
<h1>UpLOad imagem</h1>

<div class="">
  <h2 id="voce"></h2>
  <?php include("eu.html"); ?>
  <script type="text/javascript">
  document.querySelector('#voce').innerHTML=  document.querySelector('#pega').innerHTML;
  </script>
</div>

<form class="" action="index.php" method="post" enctype="multipart/form-data">
  <input type="file" name="imagem" value="">
  <input type="submit" name="" value="enviar">
</form>
<?php
$mysqli_code="select * from tab where id='31'";
$resul_database=mysqli_query($conn,$mysqli_code);

  $row=mysqli_fetch_assoc($resul_database);
  //   echo "ID:".$row['id'];
      echo $row['arquivo'];
    //   echo "DATA:".$row['data'];

 ?>
  <img src="upload/<?php echo $row['arquivo']; ?>" alt="nao saiu">
  </body>
</html>
