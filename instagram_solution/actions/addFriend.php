<?php

if (!isset($_SESSION['id']))
  header('location: index.php?action=login');

$sql = "insert into friend (idAbonne, idAmi, dateAbonnement) values (?, ?, NOW())";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id'],$_GET['id']));

header('location: index.php?action=subscription');


?>
