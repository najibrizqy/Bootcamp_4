<?php
    include "koneksi.php";
    $add = new Bootcamp();
    $add->connect();

    if(isset($_POST['tambah'])){
        $name = $_POST['name'];
        $id_work = $_POST['work'];
        $id_salary = $_POST['salary'];
        $add->sql("INSERT INTO  nama (name, id_work, id_salary) VALUES ('$name' , '$id_work' , '$id_salary')");

        $hasil = $add->sql("SELECT * FROM nama WHERE name='$name'");

        if($hasil){
            header("Location:../7.php");    
        }else{
            echo " GAGAL ";
        }
    }
?>