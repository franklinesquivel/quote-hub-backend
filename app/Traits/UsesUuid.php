<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing(): false
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}