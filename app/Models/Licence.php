<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Licence extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->birth_date = date('Y', strtotime($model->birth_date));
            $model->birth_date_en = date('Y', strtotime($model->birth_date_en));
            $model->user_id = auth()->user()->id ?? 1;
        });
    }
}
