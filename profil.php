<?php
session_start();
include_once("define.php");
require_once("pdo.php");

if(isset($_GET['id']) AND $_GET['id'] > 0){
  $getid = intval($_GET['id']);
  $requsr = $PDO->prepare('SELECT * FROM chat WHERE id = ?');
  $requsr->execute(array($getid));
  $usrinfo = $requsr->fetch();



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <title>Chat !</title>

</head>
<body>
  <div align="center">
    <h2>Profil de <?php echo $usrinfo->pseudo ?></h2>
    <br>
    <p>Ton pseudo : <?php echo $usrinfo->pseudo ?></p>
    <br>
    <p>Ton nom : <?php echo $usrinfo->nom ?></p>
    <br>
    <p>Ton prénom : <?php echo $usrinfo->prenom ?></p>
    <?php
    //  if($usrinfo->id == $_SESSION['id']){  //(isset($_SESSION['id']) AND ) /**** CF vidéo 2/3 de primefx TUTO PHP Créer un espace membre
        ?>
        <!--  <a href="#">Editer mon profil.</a> -->
          <a href="deconnexion.php">Se déconnecter.</a>
          <a href="chat.php">Acceder au chat.</a>
        <?php
    //  }
     ?>
  </div>
<?php } ?>

</body>
</html>
