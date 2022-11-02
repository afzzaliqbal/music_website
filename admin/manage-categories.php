
<?php
include 'partials/header.php';
$query = "SELECT * FROM category ";
$result =  mysqli_query($connection,$query);

?>


    <section class="dashboard">
        <div class="container dashboard_container">
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php">add post</a>
                    </li>
                    <li>
                        <a href="dashboard.php">manage post</a>
                    </li>
                    <?php if(isset($_SESSION['is_admin'])) : ?>
                    <li>
                        <a href="add-user.php">add user</a>
                    </li>
                    <li>
                        <a href="manage-user.php">manage user</a>
                    </li>
                    <li>
                        <a href="add-category.php">add category</a>
                    </li>
                    <li>
                        <a href="manage-categories.php" class="active">manage category</a>
                    </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>manage-categories</h2>
                <table>
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php while($category = mysqli_fetch_assoc($result)):?>
                        <tr>
                            <td><?=$category['title']?></td>
                            <td><a href="edit-category.php?id=<?=$category['id']?>" class="btn ">edit</a></td>
                            <td><a href="delete-category.php?id=<?=$category['id']?>" class="btn sm danger">delete</a></td>
                        </tr>
                       <?php endwhile ?>
                    </tbody>
                </table>
            </main>
        </div>
    </section>
   

    <?php
include '../partials/footer.php';

?>