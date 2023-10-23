
<?php

include '../function.php';

if(isset($_POST['submit'])) {
    if(edit($_POST) > 0) {
        echo "<script>
            alert('data berhasil diedit!');
            document.location.href = '../catalog/index.php';
            </script>";
    } else {
        echo "<script>
            alert('data gagal diedit!');
            </script>";
    }
}
   ?>





<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Data</title>
</head>
<body>
   <h1>Edit catalog</h1>
   <table cellpadding="5">
       <form action="" method="post">
           <tr>
           <?php $query = query("SELECT * FROM catalog
                                         JOIN type ON catalog.id_type = type.type_id
                                         JOIN merk ON catalog.id_merk = merk.merk_id
                                         WHERE id_catalog = $_GET[id]"); ?>
                   <?php foreach($query as $data) : ?>
               <td><label for="catalog_name">Nama Catalog :</label></td>
               <td><input type="text" id="catalog_name" name="catalog_name" placeholder="Masukkan nama catalog" required value="<?= $data['catalog_name'];?>"></td>
           </tr>
           <tr>
               <td><label for="type">Type Catalog :</label></td>
               <td><select name="type" id="type">
                    <?php $type = query("SELECT * FROM type"); ?>
                    <?php foreach($type as $t) { ?>
                   <option <?php if($t['type_id'] == $data['id_type']) : ?> selected="selected"  <?php endif; ?> value="<?= $t['type_id']; ?>"><?= $t['type_name'] ?></option>
                   <?php }; ?>
               </select></td>
                    
           </tr>
           <tr>
           <td><label for="merk">Merek :</label></td>
               <td><select name="merk" id="merk">
                    <?php $merk = query("SELECT * FROM merk"); ?>
                    <?php foreach($merk as $m) { ?>
                   <option <?php if($m['merk_id'] == $data['id_merk']) : ?> selected="selected" <?php endif; ?> value="<?= $m['merk_id']; ?>"><?= $m['merk_name'] ?></option>
                   <?php }; ?>
               </select></td>
           </tr>
           <tr>
               <td><label for="price">Harga :</label></td>
               <td>Rp. <input type="text" id="price" name="price" placeholder="Masukkan harga" required value="<?= $data['price']?>"></td>
           </tr>
           <tr>
               <td><label for="description">Deskripsi catalog :</label></td>
               <td><textarea name="description" id="description" cols="30" rows="10" required><?= $data['description']; ?></textarea></td>
           </tr>
           <tr>
           <?php endforeach;?>
               <td></td>
               <td><button type="submit" name="submit" id="submit">Edit Data!</button>
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






