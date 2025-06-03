<?php
    $conn = new mysqli('localhost', 'root', '', 'blogportal');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $fullname = $_POST['fullname'];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $insert_query ="INSERT INTO `users`(`Email`, `FullName`, `Phone`, `Password`) VALUES ('$email','$fullname','$phone','$password')";
   

    $duplicate_email = mysqli_query($conn,"SELECT * FROM `users` WHERE Email='$email'");
    if(mysqli_num_rows($duplicate_email)>0){
        echo "<script>alert('This email has already taken!!')</script>";
        echo "<script>location.href='registration.php'</script>";
    }
    else{
        if(!mysqli_query($conn,$insert_query)){
            die("not inserted!!");
        }
        else{
            echo "<script>alert('Your account is successfully created!!')</script>";
            echo "<script>location.href='login.php'</script>";
        }  
    }