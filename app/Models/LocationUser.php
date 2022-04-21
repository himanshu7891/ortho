<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LocationUser extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const ACTIVE_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const COMING_SOON_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const ACCEPT_EMERGENCIES_SELECT = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public $table = 'location_user';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'location_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
