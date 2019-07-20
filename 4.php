<?php
    function arkaFood($harga,$kode,$jarak,$pajak){
        if($kode == "ARKAFOOD5"){
            if($harga >= 50000){
                // hitung diskon
                $diskon = $harga*0.5; 
                if($diskon > 50000){ // potongan diskon tidak boleh lebih dari 50000
                    $diskon = 50000;
                }

                // hitung jarak
                $tarif_pertama = 5000; // 1,5 kilometer pertama
                $total_tarif = $jarak * 3000 - 3000 + $tarif_pertama;

                //hitung pajak jika ada
                if($pajak == "true"){
                    $tarif_pajak = $harga * 0.05;
                    $harga = $harga - $diskon + $total_tarif + $tarif_pajak;
                }else{
                    $harga = $harga - $diskon + $total_tarif;
                }
            }else{
                echo "Pemesanan minimal 50000 untuk kode ARKAFOOD5.<br>";
            }
        }else if($kode == "DITRAKTIRDEMY"){
            if($harga >= 25000){
                //hitung diskon
                $diskon = $harga*0.6; 
                if($diskon > 30000){ // potongan diskon tidak boleh lebih dari 30000
                    $diskon = 30000;
                }

                // hitung jarak
                $tarif_pertama = 5000; // 1,5 kilometer pertama
                $total_tarif = $jarak * 3000 - 3000 + $tarif_pertama;

                //hitung pajak jika ada
                if($pajak == "true"){
                    $tarif_pajak = $harga * 0.05;
                    $harga = $harga - $diskon + $total_tarif + $tarif_pajak;
                }else{
                    $harga = $harga - $diskon + $total_tarif;
                }
            }else{
                echo "Pemesanan minimal 25000 untuk kode DITRAKTIRDEMY.<br>";
            }
        }else if($kode == "False"){
            echo "Anda tidak memakai kode promosi.<br>";
        }else{
            echo "Kode promosi anda salah.<br>";
        }
        return $harga;
    }

    $pesan = arkaFood(75000,"ARKAFOOD5",5,"false");
    echo "Total Bayar: ".$pesan;
?>