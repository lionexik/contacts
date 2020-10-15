<?php

  /**
  * Soubor s funkcemi pro databazi
  */

  /**
  * Funkce pro spojeni s databazi
  * @return spojeni s datbazi
  */
  function connect() {

      $servername = "servername";
      $dbusername = "username";
      $dbpassword = "password";
      $dbname = "databaseName";

      $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);


      if ($conn->connect_error) {
          die("Cannt connect to database: " . $conn->connect_error);
      }

      return $conn;
  }

  /**
  * Funkce pro odpojeni od databaze
  * @param $conn databaze
  */
  function disconnect($conn) {
    $conn->close(); 
  }

  