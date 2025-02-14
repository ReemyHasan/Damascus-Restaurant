<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Plate extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = ['title', 'category_id', 'description', 'price'];
    protected $appends = ['image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

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
}
