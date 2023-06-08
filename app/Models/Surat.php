<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'surat';
    protected $fillable = [
        'judul',
        'deskripsi',
        'file',
        'ukuran',
        'ext',
    ];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
