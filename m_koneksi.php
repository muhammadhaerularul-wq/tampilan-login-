<?php

//membuat sebuah kelas pada konsep OOP
class m_koneksi{
  
//membuat variable / properti

//jenis modifier / konsep enkapsulasi pada OOP
//private
//public
//protected
  
    private $host = "127.0.0.1", //127.0.0.1 jika di hp
    $username = "root",
    $pass = "root",
    $db = "ukk_4_muhammadhaerul";
    
    public $koneksi;
    
    //membuat konstrak yg dimana fungsi ininakan dijalankan otomatis ketika kita membuat objek dari kelas koneksi
    function __construct()
    {
      //Variable $this adalah sebuah variabel khusus dalam OOP PHP yg digunakan sebagai petunjuk kepada objek, ketika kita mengakses dari dalam class
      $this->koneksi = mysqli_connect(
        $this->host,
        $this->username,
        $this->pass,
        $this->db, 3306);
        
        //mengecek properti koneksi berhasil atau gagal
        if ($this->koneksi){
          echo "koneksi ke database ".$this->db. " Berhasil";
          
          //mengembalikan nilai true jika koneksi ke database berhasil
          return $this->koneksi;
        }else{
          
          //memunculkan pesan error jika koneksi ke database gagal
          die("Koneksi ke database gagal".mysqli_connect_error());
        }
    }
}

$con = new m_koneksi();