<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'local_id', 'status'];

    public function local() {
        return $this->belongsTo(Local::class);
    }
    
}
