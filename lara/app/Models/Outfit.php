<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master;

class Outfit extends Model
{
    use HasFactory; 
    

    public function getMaster()
    {
        return $this->belongsTo(Master::class, 'master_id', 'id');
    }
}
