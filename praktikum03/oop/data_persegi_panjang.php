<?php

require_once "class_persegi_panjang.php";

$persegi_panjang_1 = new PersegiPanjang(10,20);
$persegi_panjang_2 = new PersegiPanjang(4,9);

echo "Luas Persegi Panjang I ".$persegi_panjang_1->getLuas();
echo "<br>Luas Persegi Panjang II ".$persegi_panjang_2->getLuas();
echo "<br>Keliling Persegi Panjang I ".$persegi_panjang_1->getKeliling();
echo "<br>Keliling Persegi Panjang II ".$persegi_panjang_2->getKeliling();

?>