<?php

if (!isset($_SESSION['id']))
  header('location: index.php?action=login');


$sql = "select article.*,user.login from article inner join user on user.id = article.idAuteur where idAuteur in ( SELECT friend.idAmi FROM friend where idAbonne=? UNION select ?) order by dateEcrit desc";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id'],$_SESSION['id']));
$articles = $query->fetchAll();

echo $blade->make("actualites", ["articles" => $articles,"activeMenu" => "actu"])->render();

?>
