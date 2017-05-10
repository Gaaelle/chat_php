<?php
session_start();
include_once("define.php");
require_once("pdo.php");

if(isset($_POST['submit'])){
  if(!empty($_POST['pseudo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);

    $pseudolenght = strlen($pseudo);
    $reqpseudo = $PDO->prepare('SELECT * FROM chat WHERE pseudo = ?');
    $reqpseudo->execute(array($pseudo));
    $pseudo_exist = $reqpseudo->rowCount();
    if($pseudo_exist == 0){
      if($pseudolenght <= 250){
        $insertusr = $PDO->prepare("INSERT INTO chat(pseudo, nom, prenom) VALUES(?, ?, ?)");
        $insertusr->execute(array($pseudo, $nom, $prenom));
        $erreur = "votre compte a bien été créé.";
        header("location: log_in");
      }else{
        $erreur = "Votre pseudo ne doit pas dépasser 250 caractères.";
      }
    }else{
      $erreur = "Pseudo déjà utilisé.";
    }
  }else{
    $erreur = "Vous n'avez pas rempli tous les champs.";
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
    <h2>Inscription</h2>
    <br>
    <form class="" action="log_in.php" method="post">
      <table>
        <tr>
          <td>
            <label for="pseudo">Pseudo :</label>
          </td>
          <td>
            <input type="text" placeholder="Votre pseudo" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; }?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="nom">Nom :</label>
          </td>
          <td>
            <input type="text" placeholder="Votre nom" name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; }?>">
          </td>
        </tr>
        <tr>
          <td>
            <label for="prenom">Prenom :</label>
          </td>
          <td>
            <input type="text" placeholder="Votre prénom" name="prenom" id="prenom" value="<?php if(isset($prenom)) { echo $prenom; }?>">
          </td>
        </tr>
      </table><br>
      <input type="submit" name="submit" value="Je m'inscris">
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
