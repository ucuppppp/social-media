
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>catalog</title>
  <style>
    body {
      margin: 0px;
      background-color: #232D3F;
    }

    .container {
      width: auto;
      height: auto;
      padding: 5px;
      display: flex;
      /* flex-wrap: wrap; */
      justify-content: center;
    }

    .content {
      display: flex;
      columns: 3;
      flex-wrap: wrap;
      /* margin: auto; */
      justify-content: center;
    }

    img {
      width: 200px;
      height: 200px;
      padding: 0px;
      display: block;
    }

    .card {
      display: inline-block;
      width: 200px;
      height: 350px;
      border: none;
      padding: 5px;
      margin: 5px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.7);
    }

    .button-e {
      padding: 5px;
      background-color: rgb(255, 255, 86);
      font-family: Arial, Helvetica, sans-serif;
      border-radius: 20px;
      border-style: solid;
      font-weight: bold;
      border-width: 1px;
      cursor: pointer;
      transition: 0.3s;
    }
    .button-r {
      padding: 5px;
      background-color: #D80032;
      font-family: Arial, Helvetica, sans-serif;
      border-radius: 20px;
      border-style: solid;
      font-weight: bold;
      border-width: 1px;
      cursor: pointer;
      transition: 0.3s;
    }

    .button-e:hover {
      background-color: rgb(0, 0, 0);
      color: rgb(255, 255, 86);
      border-color: rgb(172, 172, 26);
      border-style: solid;
      border-width: 2px;
    }

    .button-e:active {
      color: black;
      background-color: white;
      opacity: 0.5;
      box-shadow: 0px 0px 5px rgb(172, 172, 26);
    }

    .prcbtn {
      display: flex;
      justify-content: end;
      padding: 2px;
      margin: 4px;
    }


    .button-grup {
      display: flex;
      justify-content: center;
    }
    .tombol-nav {
      padding: 4px;
      margin: 3px;
    }
      
    
  </style>
</head>

<body>
    <?php 
    include("function.php");


    $catalog = query("SELECT * FROM catalog 
               INNER JOIN merk ON catalog.id_merk = merk.merk_id
               INNER JOIN type ON catalog.id_type = type.type_id
               INNER JOIN user ON catalog.id_seller = user.user_id
               ");


    include 'navbar.php';



    ?>



  <h1 class="h1" style="text-align: center; font-family: Arial, Helvetica, sans-serif">
    Home Page
  </h1>
  
  <!-- <div class="container">
    <div class="content">
      <div class="card">
        <img src="img/ucup.jpg" alt="ucup" />
        <h3>Nama Produk</h3>
        <div class="prcbtn">
          <span class="price">Rp.0.000.00</span>
          <button>Beli Sekarang !</button>
        </div>
        <p>Ini adalah deskripsi dari produk</p>
      </div>
    </div>
  </div> -->
</body>

</html>