
<?php 

include 'partials/header.php';

$post_query = "SELECT * from post LIMIT 5";
$post_result = mysqli_query($connection,$post_query);

$category_query = "SELECT * FROM category";
$category_result=mysqli_query($connection,$category_query);

$featured_query = "SELECT * FROM post WHERE is_featured=1 ";
$featured_result =mysqli_query($connection,$featured_query);
$featured =mysqli_fetch_assoc($featured_result);

?>
<!--end navigation-->


		<!--start hero area-->
		<div class="hero-area text-white pt-5 mt-2">
			
			<div class="nav-spacer"></div>

			<ul class="hero-nav nav m-4 nav-pills mb-3" id="pills-tab" role="tablist">
			  <li class="nav-item" role="presentation">
			    <button class="text-white nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Featured</button>
			  </li>
			  <li class="nav-item" role="presentation">
			    <button class="text-white nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Trending</button>
			  </li>
			  <li class="nav-item" role="presentation">
			    <button class="text-white nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">New Release</button>
			  </li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
			  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

			  		<!--small song item-->
					  <?php if(mysqli_num_rows($featured_result)) : ?>
						
			  		<div class="song-small m-1 ms-4 col-md-6 row align-items-center" >
			  			<div class="col-1 h3">01</div>
			  			<div class="col d-flex">
			  				<img class="song-small-img rounded m-1" src="images/<?=$featured['thumbnail']?>" >
			  				<div class="ms-1">
			  					<div><?=$featured['title']?></div>
					  			<small><?=substr( $featured['body'],0,15)?>....</small>
					  		</div>
				  		</div>
			  			<div class="col-2">05:00 <i class="bi bi-play"></i></div>
			  		</div>
			  		<!--end small song item-->

					  <?php endif ?>

			  		

			  </div>
			  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
			  					  		<!--small song item-->
			  		<div class="song-small m-1 ms-4 col-md-6 row align-items-center" >
			  			<div class="col-1 h3">04</div>
			  			<div class="col d-flex">
			  				<img class="song-small-img rounded m-1" src="images/09.jpg" >
			  				<div class="ms-1">
			  					<div>My heart will go on</div>
					  			<small>a song description</small>
					  		</div>
				  		</div>
			  			<div class="col-2">05:00 <i class="bi bi-play"></i></div>
			  		</div>
			  		<!--end small song item-->

			  		<!--small song item-->
			  		<div class="song-small m-1 ms-4 col-md-6 row align-items-center" >
			  			<div class="col-1 h3">05</div>
			  			<div class="col d-flex">
			  				<img class="song-small-img rounded m-1" src="images/08.jpg" >
			  				<div class="ms-1">
			  					<div>Another song</div>
					  			<small>a song description</small>
					  		</div>
				  		</div>
			  			<div class="col-2">05:00 <i class="bi bi-play"></i></div>
			  		</div>
			  		<!--end small song item-->

			  		<!--small song item-->
			  		<div class="song-small m-1 ms-4 col-md-6 row align-items-center" >
			  			<div class="col-1 h3">06</div>
			  			<div class="col d-flex">
			  				<img class="song-small-img rounded m-1" src="images/10.jpg" >
			  				<div class="ms-1">
			  					<div>My confessions</div>
					  			<small>a song description</small>
					  		</div>
				  		</div>
			  			<div class="col-2">05:00 <i class="bi bi-play"></i></div>
			  		</div>
			  		<!--end small song item-->

			  		<!--small song item-->
			  		<div class="song-small m-1 ms-4 col-md-6 row align-items-center" >
			  			<div class="col-1 h3">07</div>
			  			<div class="col d-flex">
			  				<img class="song-small-img rounded m-1" src="images/12.jpg" >
			  				<div class="ms-1">
			  					<div>Hello</div>
					  			<small>a song description</small>
					  		</div>
				  		</div>
			  			<div class="col-2">05:00 <i class="bi bi-play"></i></div>
			  		</div>
			  		<!--end small song item-->
			  		
			  		
			  </div>
			  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">



			  		<!--small song item-->
					<?php 
					$latest_post_query = "SELECT * from post ORDER BY date_time LIMIT 5 ";
					$latest_post_result = mysqli_query($connection,$latest_post_query);

					?>
					<?php while($latest= mysqli_fetch_assoc($latest_post_result)) :?>
			  		<div class="song-small m-1 ms-4 col-md-6 row align-items-center" >
					
			  			<div class="col-1 h3">00</div>
			  			<div class="col d-flex">
			  				<img class="song-small-img rounded m-1" src="images/<?=$latest['thumbnail']?>" >
			  				<div class="ms-1">
			  					<div><?=$latest['title']?></div>
					  			<small><?=substr( $latest['body'],0,15)?>....</small>
					  		</div>
				  		</div>
			
			  			<div class="col-2">05:00 <i class="bi bi-play"></i></div>
			  		</div>
			  		<!--end small song item-->
<?php endwhile?>
			  		

			  		

			  	
			  		
			  		
			  		
			  </div>
			</div>


		</div>
		<!--end hero area-->

		<h5 class="song-category-title mx-5 pt-4">You may like <small class="float-end"><a href="">View more <i class="bi bi-box-arrow-up-right"></i></a></small></h5>

		<!-- start category area-->
		<section class="pt-2 p-4 mx-5 d-flex justify-content-center" style="flex-wrap: wrap;">
			
			<?php while($post = mysqli_fetch_assoc($post_result)) :?>
			<!--song card start-->
			<div class="m-4" style="width: 200px;">
				<div style="position: relative;">
					<img src="images/<?=$post['thumbnail']?>" class="big-song-img rounded img-fluid" >
					<a href="post.php?id=<?=$post['id']?>">
						<div class="big-song-hover " >
							<i class="h1 bi bi-play"></i>
						</div>
					</a>
					</div>
				<div>
					<div class="lead text-white"><?=$post['title']?></div>
					<small class="text-muted"><?=substr( $post['body'],0,15)?>....</small>
				</div>
			</div>
			<!--song card end-->

			<?php endwhile?>

		</section>
		<!-- end category area-->

		<h5 class="song-category-title mx-5 pt-4">Country Music <small class="float-end"><a href="">View more <i class="bi bi-box-arrow-up-right"></i></a></small></h5>

		<!-- start category area-->
		<section class="pt-2 p-4 mx-5 d-flex justify-content-center" style="flex-wrap: wrap;">
			<?php
            $query_cat= "SELECT * FROM category LIMIT 7";
			$result_cat =mysqli_query($connection,$query_cat);
			?>
			
			<!--song card start-->
			<?php while($category =mysqli_fetch_assoc($result_cat)):?>
			<div class="m-4" style="width: 200px;">
				<div style="position: relative;">
					<img src="admin/thumbnail/<?=$category['thumbnail']?>" class="big-song-img rounded img-fluid" >
					<a href="category_post.php?id=<?=$category['id']?>">
						<div class="big-song-hover " >
							<i class="h1 bi bi-play"></i>
						</div>
					</a>
					</div>
				<div>
					<div class="lead text-white"><?=$category['title']?></div>
					<small class="text-muted"><?=$category['description']?></small>
				</div>
			</div>
			<?php endwhile ?>
			<!--song card end-->

			

		</section>
		<!-- end category area-->

		
	</main><!--end main area-->
<?php 
include 'partials/footer.php';
?>
