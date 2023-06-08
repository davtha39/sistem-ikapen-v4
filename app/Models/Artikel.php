<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Artikel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'artikel';
    protected $fillable = [
        'judul',
        'foto',
        'isi'
    ];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
