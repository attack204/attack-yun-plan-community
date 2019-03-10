<?php
    $servername = "localhost";
    $username = "root";
    $password = "lgj325188";
    $dbname = "myDB";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn -> connect_error) {
        die("连接失败: " . $conn -> connect_error);
    }
    echo "successfule！" . "<br>";
    
    /*创建数据库
    $sql = "CREATE DATABASE myDB";
    if($conn -> query($sql) == TRUE) {
        echo "crate datebase successful!";
    } else {
        echo "Error " . $conn -> error;
    }
    */

    /* 创建数据表
    $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
        )";
    if($conn->query($sql) == TRUE) {
        echo "Table created successful!";
    } else {
        echo "Table created gg" . $conn->error;
    }
    */

    /*插入一行
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@gg.com')";

    if($conn->query($sql) == TRUE) {
        echo "Insert successful <br>";
    } else {
        echo "Insert GG because ". $conn->error;
    }
    */
    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);
     
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 结果";
    }
?>