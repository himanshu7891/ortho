<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CasesModal extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const PATIENT_GENDER_RADIO = [
        'Male'   => 'Male',
        'Female' => 'Female',
    ];

    public $table = 'casemaster';

    protected $dates = [
        'patient_dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'patient_first_name',
        'patient_last_name',
        'patient_dob',
        'patient_gender',
        'description',
        'originator_id',
        'new_msg_to_be_read',
        'status_id',
        'invite_id_to_be_read',
        'is_read',
        'colobrator_name',
        'originator_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getPatientDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPatientDobAttribute($value)
    {
        $this->attributes['patient_dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    // public function collaborator()
    // {
    //     return $this->belongsToMany('App\Models\Collaborator','casemaster','originator_id','case_id');
    // }
}