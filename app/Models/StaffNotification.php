<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffNotification extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'users';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'location_name',
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'notify_sms',
        'notify_voice',
        'notify_email',
        'notify_new_patient',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}