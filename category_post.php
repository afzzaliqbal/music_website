<?php
include 'partials/header.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $cateogy_query = "SELECT * FROM category WHERE id=$id";
    $cateogy_reslut = mysqli_query($connection,$cateogy_query);
    $category=mysqli_fetch_assoc($cateogy_reslut);

    $post_query = "SELECT * from post WHERE category_id=$id";
    $post_result = mysqli_query($connection,$post_query);
}

?>
<body>

    <!--navigation section  starts-->
  

    <!--navigation section  ends-->

    <!--featured section  starts-->

    <header class="category_title">
        
        <h2><?=$category['title']?></h2>
    
    </header>   

    <!--featured section  ends-->


       <!--post section  start-->
       <section class="posts">
            



<article class="post">
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
</article>
               
            </div>
       </section>



       




       <!---footer-->
       <?php
include 'partials/footer.php';

?>