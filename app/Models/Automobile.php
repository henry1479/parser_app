<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    use HasFactory;
    protected $table = 'automobiles';
    
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'mark',
        'model',
        'year',
        'run',
        'color',
        'body-type',
        'engine-type',
        'transmission',
        'gear-type',
        'generation',
        'generation_id'
    ];
    
}
