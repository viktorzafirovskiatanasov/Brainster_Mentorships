<?php
session_start();
  if($_POST['paymentMethod'] === 'cash'){
    var_dump($_POST);
    $_SESSION['paymentMethod'] = $_POST['paymentMethod'];
    var_dump($_SESSION['paymentMethod']);
    header('Location: ../payment.php');
  }
  else if($_POST['paymentMethod'] === 'card') {
    $_SESSION['paymentMethod'] = $_POST['paymentMethod'];
    header('Location: ../payment.php');
  }