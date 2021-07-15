<?php

class BmiPasien { // buka class
	private $berat, $tinggi;

	function __construct($bb, $tb)
	{
		$this->berat 	= $bb;
		$this->tinggi	= $tb/100;
	}

	function hasilBMI()
	{
		$hasil = round($this->berat/pow($this->tinggi,2),2);

		return $hasil;
	}

	function statusBMI()
	{
		$hasilBMI = $this->hasilBMI();

		if ($hasilBMI < 18.5) {
			$statusBMI = 'Kekurangan Berat Badan';
		}elseif ($hasilBMI >= 18.5 && $hasilBMI <= 24.9) {
			$statusBMI = 'Normal (Ideal)';
		}elseif ($hasilBMI >= 25.0 && $hasilBMI <= 29.9) {
			$statusBMI = 'Kelebihan Berat Badan';
		}elseif ($hasilBMI > 30) {
			$statusBMI = 'Kegemukan (Obesitas)';
		}else{
			$statusBMI = 'Not Found';
		}

		return $statusBMI;
	}

}

?>