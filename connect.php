<?php
    $user_name = $_POST['userName'];
    $user_email = $_POST['userEmail'];
    $user_contact = $_POST['userContact'];
    $user_message= $_POST['userMessage'];

    //Database Connection
    $conn = new mysqli('localhost','root','','imagevision');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into feedback(userName, userEmail, userContact, userMessage)
    values(?,?,?,?)");

        $stmt->bind_param("ssis", $user_name, $user_email, $user_contact, $user_message);
        $stmt->execute();
        echo "Message sent Successfully";
        $stmt->close();
        $conn->close();

    }
?>