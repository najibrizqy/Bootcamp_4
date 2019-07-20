<?php
    include "koneksi.php";
    $edit = new Bootcamp();
    $edit->connect();

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $id_work = $_POST['work'];
        $id_salary = $_POST['salary'];
        $edit->sql("UPDATE nama SET name='$name', id_work='$id_work', id_salary='$id_salary' where id='$id'");

        $hasil = $edit->sql("SELECT * FROM nama WHERE name='$name'");

        if($hasil){
            header("Location:../7.php");    
        }else{
            echo " GAGAL ";
        }
    }
?>