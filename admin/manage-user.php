
<?php
include 'partials/header.php';

$query ="SELECT * FROM users";
$result = mysqli_query($connection,$query);

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
                        <a href="manage-user.php" class="active">manage user</a>
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
                        <tr>
                            <th>name</th>

                            <th>edit</th>
                            <th>delete</th>
                            <th>admin</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php while($user=mysqli_fetch_assoc($result)):?>
                        <tr>
                            <td><?=$user['firstname']?></td>
                          
                            <td><a href="edit-user.php?id=<?= $user['id'] ?>" class="btn ">edit</a></td>
                            <td><a href="delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">delete</a></td>
                            <td><?= $user['is_admin']  ?'yes'  : 'NO'  ?></td>
                        </tr>
                       <?php endwhile?>
                    </tbody>
                </table>
            </main>
        </div>
    </section>
   

    <?php
include '../partials/footer.php';

?>