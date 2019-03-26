<?php

  $dbhost = "localhost";    
  $dbuser = "root";         
  $dbpass = "";
  $dbname = "mitralanggeng";
  $connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) 
             or die("koneksi gagal");
