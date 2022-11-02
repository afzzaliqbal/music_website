<?php 
require 'admin/config/constants.php';
session_destroy();
unset($_SESSION['user-id']);
header('location:index.php');
die();