<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    public function milestones()
    {
        return $this->hasMany(Milestone::class, 'node'); //->sortBy('date');
    }
}
