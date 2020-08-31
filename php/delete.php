<?php

  include("db.php");

  print_r($_POST["note"]);

  $note = $_POST["note"];

  $sql = "DELETE FROM notes WHERE note = '$note'";

  $result = mysqli_query($db, $sql);

 ?>
