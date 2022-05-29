<?php

if (!isset($_SESSION['id']))
  header('location: index.php?action=login');

$id = (isset($_GET['id']) ? $_GET['id']: $_SESSION['id']);
$menu= (!isset($_GET['id']) || $_GET['id'] == $_SESSION['id'] ? "article" : "");

$sql = "select article.*,user.login from article inner join user on user.id = article.idAuteur where idAuteur=? order by dateEcrit desc";
$query = $pdo->prepare($sql);
$query->execute(array($id));
$articles = $query->fetchAll();

echo $blade->make("articles", ["articles" => $articles,"activeMenu" => $menu])->render();

?>
