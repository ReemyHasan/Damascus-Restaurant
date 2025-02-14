<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Frontend extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['key', 'values'];
    protected $appends = ['image'];

    protected $casts = [
        'values' => 'array',
    ];

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model instanceof HasMedia) {
                $model->clearMediaCollection('images');
            }
        });
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('images')->last();
        if ($file) {
            $file->url = $file->getUrl();
            $file->webp = $file->getUrl('webp');
        }
        return $file;
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp');
    }

    public function elements()
    {
        return Frontend::where('key', 'like', $this->key . '.element%')->get();
    }
}
