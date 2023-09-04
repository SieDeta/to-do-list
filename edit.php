<?php
require_once __DIR__ . "/function.php";

if(isset($_GET['id_tugas'])  ) {
  $id = $_GET['id_tugas'];
  $data = ambilSatuData($id)->fetch();
} else {
  header ("location: index.php");
}

//fetch untuk ngambil 1 data

//isset untuk mengecek
//untuk form action if else tombol submit
//mengambil data dari form lalu dikirim ke function.php
if(isset($_POST['editData'])) {
  $tugas = $_POST['tugas']; //mengambil form dengan [nama] tugas
  $datelineTanggal = $_POST['datelineTanggal'];
  $datelineWaktu = $_POST['datelineWaktu'];
 
  //mengirim data ke function.php
  editData($data['id_tugas'], $tugas, $datelineTanggal, $datelineWaktu);

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

    <link rel="stylesheet" href="edit.css" />
  </head>

  <body>
    <div class="app">
      <h4 class="mb-3">Edit</h4>

      <!-- Modal -->
      <form action="" method="POST">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <p>Tugas</p>
                <input type="text" class="form-control" name="tugas" id="textInput" value="<?php echo $data['nama_tugas'] ?>" required/>
                <div id="msg"></div>
                <br />
                <p>Dateline</p>
                <input type="date" class="form-control" name="datelineTanggal" id="dateInput" value="<?php echo $data['deadline_tanggal'] ?>" required/>
                <br />
                <p>Tenggat Waktu</p>
                <input type= "time" class="form-control" name="datelineWaktu" id="timeInput" value="<?php echo $data['deadline_waktu'] ?>" required/>
                <br />
              </div>
              <div class="modal-footer">
                <button type="submit" name="editData" id="add" class="btn btn-primary">Edit</button>
              </div>
            </div>
          </div>
        </form>




  </body>
  <script src="main.js"></script>
  <script src="https://kit.fontawesome.com/738f568398.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>