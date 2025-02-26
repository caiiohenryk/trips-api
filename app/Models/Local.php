<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'uf'];

    public function trips() {
        return $this->hasMany(Trip::class);
    }
}
