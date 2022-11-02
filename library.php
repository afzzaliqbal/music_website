
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
       <section class="posts">
            <div class="container posts_container">
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

              
               
            </div>
       </section>


       <!--category section-->

       
			<!--song card end-->

			

		</section>




       <!---footer-->
  <?php
  require 'partials/footer.php';

  ?>