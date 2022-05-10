<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getName($id){
        return $this->where('id',$id)->value('name');
    }
}
