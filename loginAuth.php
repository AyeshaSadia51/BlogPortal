<?php
if(isset($_POST['login'])){
    $conn = new mysqli('localhost', 'root', '', 'blogportal');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email = $_POST['email'];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM `users` WHERE Email='$email' And Password='$password'");

    if(mysqli_num_rows($result)>0){
        session_start();
        echo "<script>alert('Login successful')</script>";
        $_SESSION['email'] = $email;
        echo "<script>location.href='index.php'</script>";
        
    }
    else{
        echo "<script>alert('Invalid email or Password!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}

?>