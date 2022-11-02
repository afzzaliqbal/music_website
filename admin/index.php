<?php
include 'partials/header.php';

$current_user_id =$_SESSION['usr-id'];
$query ="SELECT id,title,category_id FROM post  WHERE auther_id =$current_user_id ORDER BY id DESC";
$posts = mysqli_query($connection,$query);

?>
    <section class="dashboard">
        <div class="container dashboard_container">
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php">Add Music</a>
                    </li>
                    <li>
                        <a href="index.php" class="active">My Musics</a>
                    </li>
                    <?php if(isset($_SESSION['is_admin'])) : ?>

                    <li>
                        <a href="add-user.php">add user</a>
                    </li>
                    <li>
                        <a href="manage-user.php" >manage user</a>
                    </li>
                    <li>
                        <a href="add-category.php">add category</a>
                    </li>
                    <li>
                        <a href="manage-categories.php" >manage category</a>
                    </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>manage-users</h2>
                <table>
                    <thead>
                    <?php if(mysqli_num_rows($posts)>0) : ?>
                        <tr>
                            <th>title</th>
                            <th>category</th>
                            <th>edit</th>
                            <th>delete</th>
                            
                        </tr>

                    </thead>
                    <tbody>
                    <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                        <?php 
                                
                                $category_id = $post['category_id'];
                                $category_query = "SELECT title FROM category WHERE id=$category_id";
                                $category_result =mysqli_query($connection,$category_query);
                                $category=mysqli_fetch_assoc($category_result);

                            ?>

                        <tr>
                            <td><?= $post['title'] ?></td>
                            <td><?=$category['title'] ?></td>
                            <td><a href="edit-post.php?id=<?= $post['id'] ?>" class="btn ">edit</a></td>
                            <td><a href="delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">delete</a></td>
                        </tr>
                    <?php endwhile ?>    
                    </tbody>
                    <?php else : ?>
                        <div class="alert_message error">
                    <?= "NO musics are you uploaded" ?>
                        </div>
                    <?php endif ?>
                </table>
            </main>
        </div>
    </section>
   

  <?php
include '../partials/footer.php';

?>