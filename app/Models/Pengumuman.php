<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;

class Pengumuman extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'pengumuman';
    protected $fillable = [
        'judul',
        'deskripsi',
        'file',
        'ukuran',
        'ext'
    ];
    public $timestamps = true;
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
