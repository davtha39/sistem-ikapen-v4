<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permohonan;
use App\Models\User;

class Approvalpermohonan extends Model
{
    use HasFactory;
    protected $table = 'approvalpermohonan';
    protected $fillable = [
        'approval', 
        'penguruscomment'
    ];
    public $timestamps = true;
    
    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
