<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .btn{
            color: #fff
        }
    </style>
</head>
<body>
    <?php
        include "db/koneksi.php";
    ?>
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 5px 5px -4px gray;">
            <div class="container">
                <img src="img/logo.png" alt="Gambar tidak tersedia" width="90px" height="35px">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <h5><a class="nav-item nav-link active mt-3 ml-3" href="javascript:void(0)">ARKADEMY BOOTCAMP</a></h5>
                    </div>
                </div>
            </div>
        </nav>
    </section>
        
    <section class="mt-5">
        <div class="container">
            <button type="button" class="btn btn-warning float-right mb-3 pl-4 pr-4" data-toggle="modal" data-target="#modal-tambah">ADD</button>

            <!-- Modal Tambah Data -->
            <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ADD DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="db/add_data.php">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name..." name="name">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="work" name="work">
                                        <option disabled selected>Work...</option>
                                        <?php 
                                        $work = NEW Bootcamp();
                                        $work->connect();
                                        $work->sql("SELECT * FROM work");
                                        while ($data = $work->collectData()) {
                                            echo "<option value=".$data['id']."> ".$data['name']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="salary" name="salary">
                                        <option disabled selected>Salary...</option>
                                        <?php 
                                        $salary = NEW Bootcamp();
                                        $salary->connect();
                                        $salary->sql("SELECT * FROM kategori");
                                        while ($data = $salary->collectData()) {
                                            echo "<option value=".$data['id']."> Rp. ".number_format($data['salary'],0,',','.')."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning pl-4 pr-4" name="tambah">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-bordered flex">
                <thead>
                    <th>Name</th>
                    <th>Hobby</th>
                    <th>Category</th>
                    <th width="150px;">Action</th>
                </thead>
                <tbody>
                <?php 
                    $data = NEW Bootcamp();
                    $data->connect();
                    $data->sql("SELECT nama.id, nama.name as nama, nama.id_work as id_kerja, nama.id_salary as id_gaji, work.name as work_name, kategori.salary as gaji FROM nama INNER JOIN work ON nama.id_work = work.id INNER JOIN kategori ON nama.id_salary = kategori.id");

                    $no=1;
                    while($result = $data->collectData()){
                        echo"
                            <tr>
                                <td>".$result['nama']."</td>
                                <td>".$result['work_name']."</td>
                                <td> Rp. ".number_format($result['gaji'],0,',','.')."</td>
                                <td>
                                    <a href='#' class='btn btn-danger btn-hapus' title='Hapus' id-data='".$result['id']."' data-toggle='modal' data-target='#modal-delete".$result['id']."'><span class='fa fa-close'></span></a>
                                    <a href='#' class='btn btn-info' title='Ubah' data-toggle='modal' data-target='#modal-update".$result['id']."'><span class='fa fa-pencil'></span></a>
                                </td>
                            </tr>
                          ";
                ?>
                    <!-- Modal Hapus Data -->
                    <div class="modal fade modal-hapus" id="modal-delete<?php echo $result['id'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <img src="img/success.png" width="90px" class="mb-3">
                                        <h5>Data <?php echo $result['nama'] ?> telah berhasil dihapus</h5>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Ubah Data -->
                    <div class="modal fade" id="modal-update<?php echo $result['id'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">EDIT DATA</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="db/edit_data.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Name..." value="<?php echo $result['nama']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="work" name="work">
                                                <option value="<?php echo $result['id_kerja'] ?>"><?php echo $result['work_name'] ?>
                                                <?php 
                                                    $work->sql("SELECT * FROM work where name !='".$result['work_name']."'");
                                                    while ($value = $work->collectData()) {
                                                        echo "<option value=".$value['id']."> ".$value['name']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="salary" name="salary">
                                                <option value="<?php echo $result['id_gaji'] ?>">Rp. <?php echo number_format($result['gaji'],0,',','.') ?>
                                                <?php 
                                                    $salary->sql("SELECT * FROM kategori where salary !='".$result['gaji']."'");
                                                    while ($value = $salary->collectData()) {
                                                        echo "<option value=".$value['id']."> Rp. ".number_format($value['salary'],0,',','.')."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning pl-4 pr-4" name="edit">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
    

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(".btn-hapus").on("click", function(){
            var id = $(this).attr("id-data");
            setTimeout(function() {
                $('.modal-hapus').modal('hide');
                window.location.href = "db/delete_data.php?id="+id;
            }, 2000);
        });
    </script>
</body>
</html>