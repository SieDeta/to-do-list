<?php

//nyambungin koneksi ke function
require_once __DIR__ . "/koneksi.php";

koneksi();

function ambilData () 
{
    $koneksi = koneksi();
    //cari syntax sql di phpmyadmin sql > insert
    $sql =  "SELECT * FROM tugas_deta";
    $result = $koneksi->query($sql);

    return $result;

}

//query untuk menampilkan result
//exec untuk CRUD

//menerima data dari index.php
function tambahData ($tugas, $datelineTanggal, $datelineWaktu) 
{
    $koneksi = koneksi();
    $sql = "INSERT INTO `tugas_deta`(`nama_tugas`, `deadline_tanggal`, `deadline_waktu`) VALUES ('$tugas','$datelineTanggal','$datelineWaktu')";
    $result = $koneksi->exec($sql);

    return $result;
}

//menerima id
function hapusData($id) 
{
    $koneksi = koneksi();
    $sql = "DELETE FROM `tugas_deta` WHERE id_tugas = $id";
    $result = $koneksi->exec($sql);

    return $result;
}

//menerima id
function ambilSatuData($id)
{
    $koneksi = koneksi();
    $sql = "SELECT * FROM `tugas_deta` WHERE id_tugas = $id";
    $result = $koneksi->query($sql);

    return $result;
}

//menerima id
function editData ($id, $tugas, $datelineTanggal, $datelineWaktu) {
    $koneksi = koneksi();
    $sql = "UPDATE `tugas_deta` SET `nama_tugas`='$tugas',`deadline_tanggal`='$datelineTanggal',`deadline_waktu`='$datelineWaktu' WHERE id_tugas = $id";
    $result = $koneksi->exec($sql);

    return $result;
}