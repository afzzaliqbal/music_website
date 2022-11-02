<?php

require 'config/database.php';

if(isset($_POST['submit']))
{
    $auther_id = $_SESSION['usr-id'];
    $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
    $body = filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prev_thumbnail_name =filter_var($_POST['prev_thumbnail'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prev_music_name =filter_var($_POST['prev_music'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured=filter_var($_POST["is_featured"],FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
    $music = $_FILES['music'];

    $is_featured = $is_featured == 1 ?: 0;

    
   if(!$title){
    $_SESSION['add-post'] = 'please enter the title';
   }
   elseif(!$body){
    $_SESSION['add-post'] = 'please enter the details about the post';
   }
   
   else
                    {
                        $time =time();
                        $thumbnail_name=$time.$thumbnail['name'];
                        $thumbnail_tmp_name=$thumbnail['tmp_name'];
                        $thumbnail_destination_path='../images/'. $thumbnail_name;

                        $allowed_files = ['png','jpg','jpeg'];
                        $extention =explode('.',$thumbnail_name);
                        $extention =end($extention);

                        if(in_array($extention,$allowed_files))
                        {
                            
                                move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
                
                        }
                        else
                        {
                            $_SESSION['add-post'] = 'The image file type must be in png ,jpg,jpeg format';
                        }
                        $music_name=$time.$music['name'];
                        $music_tmp_name=$music['tmp_name'];
                        $music_destination_path='../music/'. $music_name;

                        $m_allowed_files = ['wav','mp3','mpeg','WAV','MPEG-1'];
                        $m_extention =explode('.',$music_name);
                        $m_extention =end($m_extention);

                        if(in_array($m_extention,$m_allowed_files))
                        {
                           
                                move_uploaded_file($music_tmp_name,$music_destination_path);
                        }
                        else
                        {
                            $_SESSION['add-post'] = 'The audio file type must be in mp3 format';
                        }
                    }
                    
                       
if(isset($_SESSION['edit-post-error']) )
{
    
    header('location:index.php' );
    die();
}
else
{
    if($is_featured==1)
    {
        $zero_all_is_featured_query = "UPDATE post SET is_featured=0";
        $zero_all_is_featured_result = mysqli_query($connection,$zero_all_is_featured_query);
    }

    $thumbnail_to_insert =$thumbnail_name ?? $prev_thumbnail_name;
    $music_to_insert =$thumbnail_name ?? $prev_music_name;

    $edit_post_query = "UPDATE post SET title='$title',body='$body',thumbnail='$thumbnail_to_insert',music='$music_to_insert',category_id='$category_id',is_featured='$is_featured' WHERE id='$id' LIMIT 1 ";
    $edit_post_result = mysqli_query($connection,$edit_post_query);
            if(!mysqli_errno($connection))
            {
                $_SESSION['edit-post-success'] = "post updated successfully ";
                header('location:index.php' );
                die();
            }



}


    


}
        
