<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use UsesUuid;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function quotes(): HasMany
    {
        return $this->hasMany(FavoriteQuote::class);
    }
}
