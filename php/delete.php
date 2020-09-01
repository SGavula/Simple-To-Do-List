<?php

  include("db.php");

  $note = $_POST["note"];

  $sql = "DELETE FROM notes WHERE note = '$note'";

  $result = mysqli_query($db, $sql);

 ?>
