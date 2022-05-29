<?php

// vérifier les données recues.

if (!isset($_POST['inscription']) ||
    !isset($_POST['pwd']) ||
    !isset($_POST['pwd1']) ||
    !isset($_POST['login']) ||
    !isset($_POST['mail'])  ||
    filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL) === false ||
    $_POST['pwd'] != $_POST['pwd1'] ) {
      header('location: index.php?action=register');
} else {
  $sql = "insert into user (login, mdp, email) values (?, sha1(?), ?)";
  $query = $pdo->prepare($sql);
  $result = $query->execute(array($_POST['login'],$_POST['pwd'],$_POST['mail']));

  if ($result) {
    $_SESSION['id'] = $pdo->lastInsertId();;
    $_SESSION['login'] = $_POST['login'];
    
    header('location: index.php?action=index');
  } else {
    header('location: index.php?action=register');
  }

}
