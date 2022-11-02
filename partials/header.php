<?php


require 'admin/config/database.php';


 if(isset($_SESSION['usr-id']))
 {
    $id =filter_var($_SESSION['usr-id'],FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result =mysqli_query($connection,$query);
    $user = mysqli_fetch_assoc($result);
 }



?>
<!DOCTYPE html>
<html>
<head>
	<title>musically</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-icons.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" href="css/style.css">
	
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	
</head>
<body>

	<!--start main area-->
	<main>
		<!--start navigation-->
		<nav class="mainnav shadow navbar-expand-lg navbar navbar-dark bg-dark fixed-top" style="min-width: 350px">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php">
		    	<i class="bi bi-soundwave"></i> Musically
		    	<div style="font-size: 13px">World of music</div>
		    </a>

		    <div>
			    <div class="input-group ">
				  <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
				  <span class="bg-black text-white border-0 input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
				</div>
			</div>

			<div class="text-white h4 mx-3">
				<a href="">
					<i class="bi bi-facebook"></i>
				</a>
				<a href="">
					<i class="bi bi-twitter"></i>
				</a>
				<a href="">
					<i class="bi bi-instagram"></i>
				</a>
			</div>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		        <li class="nav-item"> 
		          <a class="nav-link active" aria-current="page" href="index.html">Home</a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link" href="trending.php">Trending</a>
		        </li>
				<li class="nav-item">
		          <a class="nav-link" href="library.php">Song library</a>
		        </li>
		        
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            Genre
		          </a>
		          <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
		            <li><a class="dropdown-item text-white" href="category_page.html">Pop</a></li>
		            <li><a class="dropdown-item text-white" href="category_page.html">R&B</a></li>
		            <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item text-white" href="category_page.html">Country</a></li>
		          </ul>
		        </li>
            <?php if(!isset($_SESSION['usr-id'])) : ?>
				<li class="nav-item">
		          <a class="nav-link" href="signin.php">signin</a>
		        </li>
            <?php endif ?>  
            <?php if(isset($_SESSION['usr-id'])) : ?>
		        <img class="rounded-circle"  src="<?='images/'.$user['avatar'] ?>" alt="" style="width:40px;height:40px">
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="dashboard.html" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  <?= $user['firstname']?>
		          </a>
		          <ul class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
		            <li><a class="dropdown-item text-white" href="admin/index.php"><i class="bi bi-person"></i> Profile</a></li>
		           
		            <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item text-white" href="./logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
		          </ul>
              <?php endif ?>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>