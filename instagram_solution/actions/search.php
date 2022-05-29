<?php

if (!isset($_SESSION['id']))
  header('location: index.php?action=login');

$articles=[];
$v="";
if (isset($_GET['search']) && isset($_GET['v'])) {
  $sql = "select article.*,user.login from article inner join user on user.id = article.idAuteur where tags like ? order by dateEcrit desc";
  $query = $pdo->prepare($sql);
  $query->execute(array('%'.$_GET['v']. '%'));
  $articles = $query->fetchAll();
  $v=$_GET['v'];
}

echo $blade->make("search", ["articles" => $articles, "v" => $v,"activeMenu" => "search"])->render();

?>
