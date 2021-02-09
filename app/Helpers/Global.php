<?php
use App\Siswa;
use App\Guru;

function rangkingTeratas()
{
	$siswa = Siswa::all();
		$siswa->map(function($s){
			$s->rataRataNilai = $s->rataRataNilai();
			return $s;
		});
		$siswa = $siswa->sortByDesc('rataRataNilai')->Take(5);
		return $siswa;
}

function totalSiswa()
{
	return Siswa::count();
}
function totalGuru()
{
	return Guru::count();
}



?>