<?php

  //Import database from separated file
  include("db.php");

  //Fetch message from ajax and save it
  $message = $_POST["message"];

  //Declarated sql command
  $sql_add = "INSERT INTO notes (note) VALUE ('$message')";

  //Connect to databse and performs a query on the database
  $result = mysqli_query($db, $sql_add);

  //Print message
  echo $message;


 ?>
