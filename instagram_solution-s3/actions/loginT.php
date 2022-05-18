<?php

// vérifier les données recues.

if (!isset($_POST['mail']) || !isset($_POST['pwd'])) {
  header('location: index.php?action=login');
} else {
  $sql = "select * from user where email=? and mdp=sha1(?)";
  $query = $pdo->prepare($sql);
  $query->execute(array($_POST['mail'],$_POST['pwd']));
  $user = $query->fetch();

  if ($user === false) {
    header('location: index.php?action=login');
  } else {
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['login'];

    if (isset($_POST['rememberme'])) {
        $token = bin2hex(random_bytes(20));
        setcookie('token', $token, time() + 86400 );
    } else {
        $token = '';
        setcookie('token', $token, time() - 3600 );
    }
    $sql = "update user set remember=? where id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$token,$_SESSION['id']]);
    header('location: index.php?action=index');
  }

}
