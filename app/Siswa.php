<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id','tgl_lahir'];

    public function getAvatar()
    {

        return !$this->avatar ? asset('images/default.jpg') : $this->avatar;
    //	if(!$this->avatar){
    //		return asset('images/default.jpg');
    //	}
//
  //  	return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
    	return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rataRataNilai()
    {
        // ambil nilai2
        $total = 0;
        $hitung = 0;
    if($this->mapel->isNotEmpty()){
        foreach($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
            $hitung++;
        }
        return round($total/$hitung);
    }
    return 0;
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }

}
