<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Master;
use App\Student;

class Master extends Model
{
    
    // use SoftDeletes;
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function student()
    {
        return $this->hasMany(Student::class, 'id');
    }
    
    protected $fillable = ['id', 'nama_cabang'];
    public static function getId($request){
        $nama_cabang = $request->nama_cabang;
        $digit = 2;
        $lastNumber = Master::orderBy('no_urut', 'desc')->first() ? Master::orderBy('no_urut', 'desc')->first()->no_urut: 0; // didata dari database get last id
        
        switch($nama_cabang){
            case $nama_cabang:
                $kode = $nama_cabang;
            break;
            default:
            $kode = 0;
        break;
    }
    
    $nol = str_repeat('0', $digit);
    $hasil =  $kode . substr( $nol . ++$lastNumber, -$digit);
    
    return $hasil;
    }
}
