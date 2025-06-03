<?php
if(isset($_POST['blogpost'])){
    $conn = new mysqli('localhost', 'root', '', 'blogportal');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email = $_POST['email'];
    $contenttitle = $_POST['contenttitle'];
    $category = $_POST["category"];
    $p_name = $_POST["p_name"];
    $blog = $_POST["blog"];
    $image = $_FILES['image'];

    $imageLocation = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $image_des = "images/".$imageName;
    move_uploaded_file($imageLocation,$image_des);

    $insert_query ="INSERT INTO `blogs`(`email`, `title`, `category`, `publisher_name`, `image`, `blog`) VALUES ('$email','$contenttitle','$category','$p_name','$image_des','$blog')";
   
        if(!mysqli_query($conn,$insert_query)){
            die("not inserted!!");
        }
        else{
            echo "<script>alert('Your blogpost is successfully published!!')</script>";
            echo "<script>location.href='index.php'</script>";
        }  
}
?>