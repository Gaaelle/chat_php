<?php
session_start();
include_once("define.php");
require_once("pdo.php");

if(isset($_POST['submit'])){
  if(isset($_POST['pseudo']) AND ($_POST['text']) AND !empty(($_POST['pseudo'])) AND !empty($_POST['text'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $text = htmlspecialchars($_POST['text']);
    $insertmsg = $PDO->prepare('INSERT INTO chat2(pseudo, message) VALUES(?, ?)');
    $insertmsg->execute(array($pseudo, $text));


  }
}

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
  <div>
    Connecté en tant que : <?php echo $_SESSION['pseudo']; ?>
  </div>
  <div>
    <form class="" action="" method="post">
      <textarea type="text" placeholder="text"name="text"></textarea><br>
      <input type="submit" name="submit" value="Envoyer">
    </form>



    <?php
      if($usrinfo['id'] == $_SESSION['id']){  //(isset($_SESSION['id']) AND ) /**** CF vidéo 2/3 de primefx TUTO PHP Créer un espace membre
        ?>
        <!--  <a href="#">Editer mon profil</a> -->
          <a href="deconnexion.php">Se déconnecter</a>
        <?php
      }
     ?>
  </div>
<?php
$allmsg = $PDO->query('SELECT * FROM chat2 ORDER BY id ASC');
  while($msg = $allmsg->fetch()){

  ?>
  <b><?php echo $msg->pseudo; ?> :</b> <?php echo $msg->message; ?> <br>
  <?php
}

 ?>

</body>
</html>
