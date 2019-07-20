<?php
    function fibonacci($nilai){
        //deret fibonacci
        $fibonacci = '';
        $angka_sebelumnya=0;
        $angka_sekarang=1;
        
        for ($i=0; $i<20; $i++){
            $output = $angka_sekarang + $angka_sebelumnya;
            if($output > $nilai){
                break;
            }
            $fibonacci .= $output." ";
            
            $angka_sebelumnya = $angka_sekarang;
            $angka_sekarang = $output;
        }
        return $fibonacci;
    }

    function evenSum($maks){
        $deret = fibonacci($maks);
        echo "Deret Fibonacci : ".$deret."<br>";
        $pecah = explode(" ", $deret);
        $total = 0;

        foreach($pecah as $value){
            $value = (int)$value;
            $bil = $value % 2;
            if($bil == 0){
                $total += $value;
            }
        }
        return $total;
    }

    function oddSum($maks){
        $deret = fibonacci($maks);
        echo "Deret Fibonacci : ".$deret."<br>";
        $pecah = explode(" ", $deret);
        $total = 0;

        foreach($pecah as $value){
            $value = (int)$value;
            $bil = $value % 2;
            if($bil == 1){
                $total += $value;
            }
        }
        return $total;
    }

    $even = evenSum(100);
    echo "evenSum(100) = ".$even."<br>";
    $even = oddSum(1000);
    echo "oddSum(1000) = ".$even;
?>