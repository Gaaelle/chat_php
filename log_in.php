<?php
session_start();
include_once("define.php");
require_once("pdo.php");

if(isset($_POST['submit'])){
  $pseudo = htmlspecialchars($_POST['pseudo']);
  if(!empty($pseudo)){
    $requsr = $PDO->prepare("SELECT * FROM chat WHERE pseudo = ?");
    $requsr->execute(array($pseudo));
    // $requsr->bindValue(":pseudo", $_POST["pseudo"]);
    $userexist = $requsr->rowCount();
    if($userexist == 1){
      $userinfo = $requsr->fetch();
      $_SESSION->id = $userinfo->id;
      $_SESSION->pseudo = $userinfo->pseudo;
  //     header("location: profil.php?id=".$_SESSION->id);
    header("location: chat.php");
    }else{
      $erreur = "Mauvais pseudo.";
    }
  }else{
    $erreur = 'Tu dois rentrer ton pseudo.';
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
  <div align="center">
    <h2>Connxion</h2>
    <br>
    <form class="" action="" method="post">
      <table>
        <tr>
          <td>
            <label for="pseudo">Pseudo :</label>
          </td>
          <td>
            <input type="text" placeholder="Votre pseudo" name="pseudo" id="pseudo">
          </td>
        </tr>
      </table>
      <br>
      <input type="submit" name="submit" value="Je me connecte">
    </form>
    <br>
    <?php
if(isset($erreur))
{
  echo "<font color='#8e2727'>" . $erreur . "</font>";
}
     ?>
  </div>


</body>
</html>
