<?php  session_start(); 
?>
<html>
<head>
<link rel="stylesheet" href="image.css">
</head>
   <body>
       <h1> Image Gallery</h1>
         <p> This page displays the list of uploaded images</p>
      <form action="" method="POST" enctype="multipart/form-data">
      <input type="file" name="img" value = "Upload More"/>
         <input type="submit"  name = "SUBMIT"/>
      </form>
      <?php
 
   if(isset($_FILES['img'])){
      $errors= array();
      $file_name = $_FILES['img']['name'];
      $file_size =$_FILES['img']['size'];
      $file_tmp =$_FILES['img']['tmp_name'];
      $file_type=$_FILES['img']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="this extension not allowed, please  choose a JPEG or PNG file.";
      }
      

      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB or less  then 2 MB';
      }
      

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         $_SESSION[$file_name] = $file_name;       
         foreach ($_SESSION as $key=>$val)
         {
            echo  '<div><img src = uploads/'.$_SESSION[$key].' width="200" height="200"></div>';
         }

      }
      else{
         print_r($errors);
      }
   }

?>

   </body>
</html>