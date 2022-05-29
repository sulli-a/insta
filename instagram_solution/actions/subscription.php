<?php

if (!isset($_SESSION['id']))
  header('location: index.php?action=login');


$users=[];
$v="";
if (isset($_GET['search']) && isset($_GET['v'])) {
  $sql = "select user.id,user.login,friend.dateAbonnement,friend.idAmi from user left join friend on user.id=friend.idAmi where login like ? and user.id != ?";
  $query = $pdo->prepare($sql);
  $query->execute(array('%'.$_GET['v']. '%',$_SESSION['id']));
  $users = $query->fetchAll();
  $v=$_GET['v'];

}


$sql = "select user.id,user.login,friend.dateAbonnement from friend inner join user on user.id=friend.idAmi where friend.idAbonne = ?";
$query = $pdo->prepare($sql);
$query->execute(array($_SESSION['id']));
$friends = $query->fetchAll();

echo $blade->make("subscription", ["searchUsers" => $users, "v" => $v, "friendUsers" => $friends])->render();

?>
