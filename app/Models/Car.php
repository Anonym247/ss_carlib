<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use CrudTrait;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * @var bool
     */
    public static $ignoreMutators = false;

    /**
     * @return BelongsTo
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Model::class, 'model_id', 'id');
    }

    /**
     * @param $value
     * @return void
     */
    public function setPhotoAttribute($value): void
    {
        if (!self::$ignoreMutators) {
            $this->uploadFileToDisk($value, 'photo', 'public', 'cars');
        } else {
            $this->attributes['photo'] = $value;
        }
    }

    /**
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::deleting(static function ($car) {
            Storage::delete($car->photo);
        });
    }
}
