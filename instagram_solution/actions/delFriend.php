<?php

if (!isset($_SESSION['id']))
  header('location: index.php?action=login');

$sql = "delete from friend where idAbonne=? and idAmi=?";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id'],$_GET['id']));

header('location: index.php?action=subscription');


?>
