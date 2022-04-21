<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Location extends Model implements HasMedia
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

    public $table = 'locations';

    protected $appends = [
        'location_imagepath',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'email_address',
        'location_name',
        'address_line_1',
        'address_line_2',
        'phone_number',
        'fax_number',
        'country',
        'state',
        'city',
        'zip_code',
        'latitude',
        'longitude',
        'accept_emergencies',
        'coming_soon',
        'active',
        'directions',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function locationUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function getLocationImagepathAttribute()
    {
        $file = $this->getMedia('location_imagepath')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
