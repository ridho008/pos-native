<?php 
function kode_randam($panjang)
{
	$data = '1234567890';
	$string = 'PJ-';

	for ($i=0; $i < $panjang ; $i++) { 
		$pos = rand(0, strlen($data) - 1);
		$string .= $data{$pos};
	}
	return $string;
}

$kode = kode_randam(10);
// echo $kode;

?>