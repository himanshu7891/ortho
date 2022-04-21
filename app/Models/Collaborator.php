<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaborator extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'collaborators';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'originator_id',
        'collaborator_id',
        'status_id',
        'case_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}