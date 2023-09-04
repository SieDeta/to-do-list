<?php
require_once __DIR__ . "/function.php";

//isset untuk mengecek
//untuk form action if else tombol submit
//mengambil data dari form lalu dikirim ke function.php
if(isset($_POST['tambahData'])) {
  $tugas = $_POST['tugas']; //mengambil form dengan [nama] tugas
  $datelineTanggal = $_POST['datelineTanggal'];
  $datelineWaktu = $_POST['datelineWaktu'];
 
  //mengirim data ke function.php
  tambahData($tugas, $datelineTanggal, $datelineWaktu);

  header ("location: index.php");
}

if (isset($_GET['id_tugas'])) {
  $id = $_GET['id_tugas'];
  //Dikirim ke happusData di function
  hapusData($id);
  header ("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TODO App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <div class="app">
      <h4 class="mb-3">Todo List</h4>

      <div id="addNew" data-bs-toggle="modal" data-bs-target="#form">
        <span>Add New Task</span>
        <i class="fas fa-plus"></i>
      </div>

      <!-- Modal -->
      <form class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" action="" method="POST">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tugas</p>
                <input type="text" class="form-control" name="tugas" id="textInput" required/>
                <div id="msg"></div>
                <br />
                <p>Dateline</p>
                <input type="date" class="form-control" name="datelineTanggal" id="dateInput" required/>
                <br />
                <p>Tenggat Waktu</p>
                <input type="time" class="form-control" name="datelineWaktu" id="timeInput" required/>
                <br />
              </div>
              <div class="modal-footer">
                <button type="submit" name="tambahData" id="add" class="btn btn-primary">Add</button>
              </div>
            </div>
          </div>
        </form>


      <h5 class="text-center my-3">List</h5>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tugas</th>
      <th scope="col">Dateline</th>
      <th scope="col">Tenggat Waktu</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

  <!-- looping untuk functionnya -->
    <?php 
    $nomor = 1; 
    foreach(ambilData() as $data) { ?>

    <tr>
      <th scope="row"><?php echo $nomor++?></th>
      <td><?php echo $data ['nama_tugas'] ?></td>
      <td><?php echo date("d F Y", strtotime($data['deadline_tanggal'])); ?></td>
      <td><?php echo date("H:i:s", strtotime($data['deadline_waktu']));  ?></td>
      
      <td>
        <a href="edit.php?id_tugas=<?php echo $data["id_tugas"] ?>" class="btn btn-success"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
        <a href="?id_tugas=<?php echo $data["id_tugas"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
      </td>
      
    </tr>
  
      <?php } ?>
  </tbody>
</table>

    </div>
  </body>
  <script src="main.js"></script>
  <script src="https://kit.fontawesome.com/738f568398.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>