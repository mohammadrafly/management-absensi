<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absen';

    protected $fillable = [
        'uid',
        'statusMsg',
        'checkType',
    ];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'uid', 'uid');
    }
}
