<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'timeline',
    ];

    public function milestones()
    {
        return $this->hasMany(Milestone::class, 'node')->orderBy('date');
    }
}
