<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Arsip extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'arsip';
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
