<?php
 $bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf-8;', 'root', 'root');
 if (isset($_POST['valider'])){
 	if (!empty($_POST['pseudo']) AND !empty($_POST['message'])){
         $pseudo= htmlspecialchars($_POST['pseudo']);
         $message= nl2br(htmlspecialchars($_POST['message']));

         $insererMessage= $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES(?, ?)');
         $insererMessage->execute(array($pseudo, $message));

 	}else {
 		echo "veillez completer tout les champs...";
 	}
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>messagerie instantannée</title>
	<meta charset="utf-8">

</head>
<body>
      <form method="POST" action="" align-justify= "center"> 
      	<input type="text" name="pseudo">
      	<br><br>
      	<textarea name="message"></textarea>
      	<br><br>
      	<input type="submit" name="valider">
      </form>
      <section id="messages"> </section>
</body>
</html>   