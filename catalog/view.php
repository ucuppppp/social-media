<?php 

include '../function.php';
include '../navbar.php';



    if(isset($_GET['id_delete'])) {
        $delete  = $_GET['id_delete'];
        // CHECK IF ELSE DARI DELETE
        if(delete($delete) > 0) {
            echo "<script>                              
            alert('catalog berhasil di hapus!');
            document.location.href = '../catalog/index.php';
            </script>";
        } else {
            "<script>
            alert('catalog gagal di hapus!')
            document.location.href = '../catalog/view.php?id=$_GET[id_delete]';       
            </script>";
        }

        }

    $query = query("SELECT * FROM catalog
                JOIN merk ON catalog.id_merk = merk.merk_id
                JOIN type ON catalog.id_type = type.type_id
                WHERE id_catalog = $_GET[id]");

?>


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        body {
      margin: 0px;
      background-color: #232D3F;
    }
        /* CSS untuk div postingan */
        .post-container {
            display: flex; /* Membuat div postingan menjadi flex container */
            justify-content: center;
        }
        .card {
            display: flex;
            width: 700px;
            padding: 10px;
            margin: 10px;
            background-color: #0E2954;
            color: #84A7A1;
            border: 1px solid #ddd;
            border-radius: 5px;
            justify-content: start;
        }

        /* CSS untuk judul postingan */
        .post-title {
            font-size: 35px;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* CSS untuk konten postingan */
        .post-content {
            font-size: 16px;
            line-height: 1.6;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* CSS untuk gambar */
        .post-image {
            width: 350px;
            height: 350px;
            /* max-width: 40%; Ukuran gambar 40% dari lebar parent container */
            margin-right: 20px; /* Jarak dari konten postingan */
        }

        .table {
            color: #84A7A1;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* CSS untuk responsif */
        @media (max-width: 768px) {
            .post-container {
                margin: 5px;
                padding: 10px;
                flex-direction: column; /* Mengubah tata letak menjadi kolom pada layar kecil */
            }

            .post-title {
                font-size: 20px;
            }

            .post-content {
                font-size: 14px;
            }

            .post-image {
                max-width: 100%; /* Gambar mengisi lebar penuh pada layar kecil */
                margin-right: 0; /* Menghapus jarak pada layar kecil */
                margin-bottom: 10px; /* Menambah jarak bawah pada layar kecil */
            }
        }

    </style>
</head>
<body>
    <div class="post-container">
        <div class="card">
            <?php foreach($query as $data) :?>
                <img class="post-image" src="https://source.unsplash.com/500x400?<?= $data['type_name'];?>%20<?= $data['merk_name'];?>" alt="post-image">
                <div>
                    <h2 class="post-title"><?= $data['catalog_name']; ?></h2>
                    <table class="table">
                        <tr>
                            <td>Merek </td>
                            <td>: <?= $data['merk_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Tipe </td>
                            <td>: <?= $data['type_name']; ?></td>
                        </tr>
                    </table>
                    <p class="post-content">
                        <?= $data['description']; ?>
                    </p>
                    <hr>
                    <a href="/edit/?id=<?= $data['id_catalog']?>"><button class="">Edit</button></a>
                    <a href="/catalog/view.php?id_delete=<?= $data['id_catalog']?>"><button style="background-color: #D80032;" onclick="return confirm('Yakin menghapus catalog ini?')">Hapus</button></a>
                    <a href="/catalog/"><button style="background-color: #687EFF;">Kembali</button></a>
                </div>
                <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

