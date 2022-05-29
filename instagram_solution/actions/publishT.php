<?php

if (!isset($_POST['titre']) ||
    !isset($_POST['tags']) ||
    !isset($_POST['publish']) ||
    !isset($_FILES['img']) ) {
      header('location: index.php?action=index');
} else {
  if ($_FILES['img']['error'] != 0 || $_FILES['img']['type'] != 'image/jpeg' ||
  filter_var($_POST['tags'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^#[a-z0-9_]+(( )+#[a-z0-9_]+)*( )*$/")))===false
) {
    header('location: index.php?action=index');
  } else {
    $dirname = "./public/upload";
    $filename = $_SESSION['id'] . "_" . time();
    $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $file = $dirname . "/" . $filename . "." . $extension;
    move_uploaded_file( $_FILES['img']['tmp_name'],$file);

    $sql = "insert into article (titre, dateEcrit, img_url, idAuteur, tags) values (?, now(), ?, ?, ?);";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['titre'],$file,$_SESSION["id"],$_POST['tags']));

    header('location: index.php?action=index');
  }
}
