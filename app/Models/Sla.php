<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sla extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
