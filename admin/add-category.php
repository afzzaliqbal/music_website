<?php
include 'partials/header.php';

?>




    <section class="form_section">
        <div class="container form_section_container">
            <h2>Add Category</h2>
              <?php if(isset($_SESSION['add-category'])) :  ?>

            <div class="alert_message error">
                <p><?= $_SESSION['add-category']  ;
                unset($_SESSION['add-category']); ?>
                 </p>
            </div>
            
            <?php endif ?>
            
           
            <form action="add-cat-logic.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="title">
                <textarea  rows="3" name="description" placeholder="description"></textarea>
                <div class="form_control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" name="thumbnail"  id="Thumbnail">
                </div>
                <button class="btn" name="submit" type="submit">Add Category</button>
            </form>
        </div>
    </section>


    <?php


include '../partials/footer.php';

?>