<?php

$conn = mysqli_connect('localhost', 'root', '', 'merchandise') or die;

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
    // $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // return $row;
}

function add($data) {
    global $conn;
    $name = htmlspecialchars($_POST['catalog_name']);
    $type = htmlspecialchars($_POST['type']);
    $merk = htmlspecialchars($_POST['merk']);
    if(is_numeric($_POST['price']) == true) {
        $price = htmlspecialchars($_POST['price']);
    } else {
        echo "<script>
            alert('harga harus diisi dengan angka');
            document.location.href = '../add/'
            </script>";
    }
   
    $description = htmlspecialchars($_POST['description']);

    $query = "INSERT INTO catalog
    VALUES ( NULL, '2', '$name', '$type', '$merk', '$price', '$description')";


    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);
} 


function edit($data) {
    global $conn;
    $id = htmlspecialchars($_GET['id']);
    $name = htmlspecialchars($_POST['catalog_name']);
    $type = htmlspecialchars($_POST['type']);
    $merk = htmlspecialchars($_POST['merk']);
    if(is_numeric($_POST['price']) == true) {
        $price = htmlspecialchars($_POST['price']);
    } else {
        echo "<script>
            alert('harga harus diisi dengan angka');
            document.location.href = '../edit/?id=$_GET[id]'
            </script>"
            ;
        
    }
   
    $description = htmlspecialchars($_POST['description']);

    $query = "UPDATE catalog 
    SET id_catalog = $id,
        id_seller = '2',
        catalog_name = '$name',
        id_type = '$type',
        id_merk = '$merk',
        price = '$price',
        description = '$description'
    WHERE id_catalog = $id";


    mysqli_query ($conn, $query);

    return mysqli_affected_rows($conn);
} 

function delete($data) {
    global $conn;
    $id = $_GET['id_delete'];
    $query = "DELETE FROM catalog WHERE id_catalog = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function registration($data) {
    global $conn;
    $name = htmlspecialchars($data['name']);
    $username = strtolower(stripslashes($data['username']));
    $email = htmlspecialchars($data['email']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");


    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah digunakan!')
            </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
            document.location.href = 'index.php'
            </script>";
        return false;
    } else {
    
    $pw = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO user
              VALUES (NULL, '$name', '$username', '$email', '$pw', DEFAULT)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}
};

?>