<?php 

require 'config/database.php';


if(isset($_POST['submit']))
{
   $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $description=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $thumbnail =$_FILES['thumbnail'];

  if(!$title){
    $_SESSION['add-category'] = "please enter the title";
  }
  elseif(!$description)
  {
    $_SESSION['add-category']="please enter the discription";
  } 
  elseif(!$thumbnail)
  {
    $_SESSION['add-category']="please add a thumbnail";
  }  else
  {
      $time =time();
      $thumbnail_name=$time.$thumbnail['name'];
      $thumbnail_tmp_name=$thumbnail['tmp_name'];
      $thumbnail_destination_path='thumbnail/'. $thumbnail_name;

      $allowed_files = ['png','jpg','jpeg'];
      $extention =explode('.',$thumbnail_name);
      $extention =end($extention);

      if(in_array($extention,$allowed_files))
      {
          
              move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
          
         
      }
      else
      {
          $_SESSION['add-category'] = 'The image file type must be in png ,jpg,jpeg format';
      }
  }


  if(isset($_SESSION['add-category']))
  {
    $_SESSION['add-category-data'] =$_POST;
    header('location:add-category.php');
    die();
  }
  else{
 
    $query ="INSERT INTO category (title,description,thumbnail) VALUES('$title','$description','$thumbnail_name')";
    $result =mysqli_query($connection,$query);
    if(mysqli_errno($connection))
    {
        $_SESSION['add-category']="couldn't add category";
        header('location:add-category.php');
        die();
    }
    else{
        $_SESSION['add-category-success']="successfully added category";
        header('location:manage-categories.php');
        die();
    }
  }
} 
