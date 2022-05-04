<?php

if (!isset($_SESSION['id']))
  header('location: index.php?action=login');

echo $blade->make("page2")->render();

?>
