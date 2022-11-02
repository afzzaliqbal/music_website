
<?php 

include 'partials/header.php';
$post_query = "SELECT * from post ORDER BY date_time";
$post_result = mysqli_query($connection,$post_query);

?>
<body>

    <!--navigation section  starts-->


    <!--navigation section  ends-->

    <!--search  section  starts-->
       
    <section class="search_bar">
        <form action="" class="container search_bar_container">
            <div>
               <span class="material-symbols-rounded">
                       search
                </span>
                <input type="search" name="" placeholder="serach">
            </div>
            <button type="submit" class="btn">Go</button>
        </form>
    </section>
  

    <!--search  section  ends-->


       <!--post section  start-->
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


       <!--category section-->

       
			<!--song card end-->

			

		</section>




       <!---footer-->
  <?php
  require 'partials/footer.php';

  ?>