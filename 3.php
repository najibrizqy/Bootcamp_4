<?php 

	function piliharray($masuk){
		$isi = ['pro', 'gram', 'merit', 'program', 'it', 'programer'];

		// $break = explode($isi, $user);
		$value = strtolower($masuk);//convert menjadi huruf kecil
		$jml_karakter = strlen($value);//ngitung jumlah huruf
		
		for ($i = 0 ; $i <= 5; $i++) {
			$seleksi = $isi[$i];//array isi berdasarkan $i
			echo "kata ke- " . strpos($value, $seleksi) . " " . $seleksi;
			echo "<br>";
		}		
		
	}

	$total = piliharray('programit');
	echo $total;

?>