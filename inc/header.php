<?php
error_reporting(0);
session_name("budget_tracker");
session_start();

require "scripts/connect.php";
require "scripts/functions.php"; 
?>



<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="../bootstrap-5.0.2/css/bootstrap.min.css">
    <script src="../bootstrap-5.0.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons  -->
    <link rel="stylesheet" href="../bootstrap-5.0.2/icons-1.7.1/font/bootstrap-icons.css">
    <!-- Swearalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- Naslov u tabu -->
    <title>Java Script</title>
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
  <span class="navbar-text float-right">
        <img src="images/aptiv.svg" alt="Aptiv Logo">
  </span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">



    <?php if($_SESSION['logged_in'] == 1 AND ($_SESSION['USRrole'] == "GlobalAdmin" OR $_SESSION['USRrole'] == "Admin")): ?>
        <li class="nav-item">
          <a class="nav-link" href="view_mnt"><b>View</b></a>
        </li>
    <?php endif; ?>


    </ul>



    </div>
  </div>
</nav><br><br><br>

