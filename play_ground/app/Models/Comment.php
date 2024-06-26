<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'product_id'];

    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID when creating a new record
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    /**
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
