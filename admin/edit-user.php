<?php
include 'partials/header.php';

?>


    <section class="form_section">
        <div class="container form_section_container">
            <h2>edit user</h2>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="first name">
                <input type="text" placeholder="last name">
                <label for="user_role">user type</label>
                <select >
                    <option value="0">seller</option>
                    <option value="1">admin</option>
                </select>
                <button class="btn" type="submit">update user</button>
            </form>
        </div>
    </section>


    <?php
include '../partials/footer.php';

?>