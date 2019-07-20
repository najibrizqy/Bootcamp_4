<?php
    function mrBrulee($jenis_operasi,$N,$digit){

        $nilai = '';
        $operasi = null;
        for($i=1;$i<=$N;$i++){
            $nilai .= $i;
        }

        // SELEKSI JENIS OPERASI
        if($jenis_operasi == "SUM"){ // Penjumlahhan
            $arr_nilai = str_split($nilai); // nilai dijadikan array
            $operasi = 0;
            foreach($digit as $key => $value){
                $ind = $value - 1;
                $operasi = $operasi + (int)$arr_nilai[$ind];
            }
        }
        else if($jenis_operasi == "MUL"){ // Perkalian
            $arr_nilai = str_split($nilai);
            $operasi = 1;
            foreach($digit as $value){
                $ind = $value - 1;
                $operasi = $operasi * (int)$arr_nilai[$ind];
            }
        }else if($jenis_operasi == "SUB"){ // Pengurangan
            $arr_nilai = str_split($nilai);
            $operasi = 0;
            $awal = '';

            foreach($digit as $key => $value){
                $ind = $value - 1;
                if($key == 0){
                    $operasi = (int)$arr_nilai[$ind] - $operasi;
                }else{
                    $operasi = $operasi - (int)$arr_nilai[$ind];
                }
                
            }
        }else if($jenis_operasi == "DIV"){ // Pembagian
            $arr_nilai = str_split($nilai);
            foreach($digit as $key => $value){
                $ind = $value - 1;
                if($key == 0){
                    $operasi = (int)$arr_nilai[$ind];
                }else{
                    $operasi = $operasi / (int)$arr_nilai[$ind];
                }
            }
        }else{
            echo "Jenis Operasi Salah!";
        }

        return $operasi;
    }

    $sum = mrBrulee('SUM',20,[11,13,15]);
    echo $sum."<br>";
    $sum = mrBrulee('MUL',20,[12,15,17]);
    echo $sum;
?>