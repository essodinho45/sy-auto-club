<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Licence extends Model
{
    use HasFactory;

    protected $appends = ['status'];

    public function getStatusAttribute()
    {
        if ($this->api_read)
            return 'مقروءة';
        elseif ($this->approved)
            return 'مؤكدة';
        else
            return 'قيد الانتظار';
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->user_id = auth()->user()->id ?? 1;
        });
    }
}
