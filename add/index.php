<?php

 include '../function.php';


if(isset($_POST['submit'])) {
    if(add($_POST) > 0) {
        echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = '../catalog/index.php';
            </script>";
    } else {
        echo "<script>
            alert('data gagal ditambahkan!')
            </script>";
    }
}
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
</head>
<body>
    <h1>Menambahkan catalog</h1>
    <table cellpadding="5">
        <form action="" method="post">
            <tr>
                <td><label for="catalog_name">Nama Catalog :</label></td>
                <td><input type="text" id="catalog_name" name="catalog_name" placeholder="Masukkan nama catalog" required></td>
            </tr>
            <tr>
                <td><label for="type">Type Catalog :</label></td>
                <td><select name="type" id="type">
                    <?php $query = query("SELECT * FROM type"); ?>
                    <?php foreach($query as $data) : ?>
                    <option value="<?= $data['type_id']; ?>"><?= $data['type_name'] ?></option>
                    <?php var_dump($data['type_name']); ?>
                    <?php endforeach;?>
                </select></td>
            </tr>
            <tr>
            <td><label for="merk">Merek :</label></td>
                <td><select name="merk" id="merk">
                    <?php $query = query("SELECT * FROM merk") ?>
                    <?php foreach($query as $data) : ?>
                    <option value="<?= $data['merk_id']; ?>"><?= $data['merk_name'] ?></option>
                    <?php endforeach;?>
                </select></td>
            </tr>
            <tr>
                <td><label for="price">Harga :</label></td>
                <td>Rp. <input type="text" id="price" name="price" placeholder="Masukkan harga" required></td>
            </tr>
            <tr>
                <td><label for="description">Deskripsi catalog :</label></td>
                <td><textarea name="description" id="description" cols="30" rows="10" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit" id="submit">Tambah Data!</button>
                </td>
            </tr>
            </form>
            <tr>
                <td></td>
                <td><a href="../catalog/index.php"><button>Kembali ke menu catalog</button></a></td>
            </tr>
    </table>
</body>
</html>