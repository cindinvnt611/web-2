<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
require_once "nilai_mahasiswa.php"
?>
<body>
<nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" style="padding: .75rem 1.25rem;">Sistem Penilaian</a>
        </div>
    </nav>

<form action="nilai_mahasiswa.php" method="post" class="form-horizontal">
<fieldset class="card" style="border-style: none;" class="card-header bg-white">
<legend class="float-none w-auto px-3 fw-bold h3">Form Nilai</legend>
  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"></div>
        </div> 
        <input id="name" name="name" placeholder="Cindi Novianti" type="text" class="form-control" value="" size="30" required="required" minlenght="3" maxlength="50">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
    <div class="col-8">
      <select id="matkul" name="matkul" class="custom-select" required="required">
        <option value="DDP">Dasar-Dasar Pemrograman</option>
        <option value="BD1">Basis Data</option>
        <option value="WEB1">Pemrograman Web</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_uts" class="col-4 col-form-label">NIlai UTS</label> 
    <div class="col-8">
      <input id="nilai_uts" name="nilai_uts" type="number" class="form-control" value="" size="6" pattern="[0-9]{10}" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_uas" class="col-4 col-form-label">Nilai UAS</label> 
    <div class="col-8">
      <input id="nilai_uas" name="nilai_uas" type="number" class="form-control" value="" size="6" pattern="[0-9]{10}" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label> 
    <div class="col-8">
      <input id="nilai_tugas" name="nilai_tugas" type="number" class="form-control" value="" size="6" pattern="[0-9]{10}" required="required">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="simpan" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
</body>
</html>