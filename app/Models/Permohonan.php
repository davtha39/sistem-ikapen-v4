<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Approvalpermohonan;
use App\Models\Permohonan;
use App\Models\Users;

class Permohonan extends Model
{
    use HasFactory;    
    protected $table = 'permohonan';
    protected $fillable = [
        'users_id',
        'jenis_permohonan',
        'catatan',
    ];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function approvalpermohonan()
    {
        return $this->hasOne(Approvalpermohonan::class);
    }
    
}
