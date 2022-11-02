<?php
include 'partials/header.php';

?>



    <section class="form_section">
        <div class="container form_section_container">
            <h2>edit Category</h2>
           
            <form action="edit-category-logic.php" method="POST" enctype="multipart/form-data">
                <input type="text" placeholder="title">
                <textarea  rows="3" placeholder="description"></textarea>
                <button class="btn" type="submit">update Category</button>
            </form>
        </div>
    </section>


    <?php
include '../partials/footer.php';

?>