<?php

require 'config/database.php';

if(isset($_POST['submit']))
{
    $auther_id = $_SESSION['usr-id'];
    $title = filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
    $body = filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
   elseif(!$thumbnail['name']){
    $_SESSION['add-post'] = 'please add thumbnail image';
   }elseif(!$music['name']){
    $_SESSION['add-post'] = 'please add a song';
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
                    
if(isset($_SESSION['add-post']) )
{
    $_SESSION['add-post-data'] =$_POST;
    header('location:add-post.php' );
    die();
}
else
{
    if(isset($_SESSION['is_admin']))
    {
        $zero_all_is_featured_query = "UPDATE post SET is_featured=0";
        $zero_all_is_featured_result = mysqli_query($connection,$zero_all_is_featured_query);
    }
   
    $add_post_query = "INSERT INTO post (title,body,thumbnail,music,category_id,auther_id,is_featured) VALUES ('$title','$body','$thumbnail_name','$music_name','$category_id','$auther_id','$is_featured')" ;
    $add_post_result = mysqli_query($connection,$add_post_query);
            if(!mysqli_errno($connection))
            {
                $_SESSION['add-post-success'] = "post added successfully ";
                header('location:index.php' );
                die();
            }



}
}
header('location:add-post.php' );
                die();