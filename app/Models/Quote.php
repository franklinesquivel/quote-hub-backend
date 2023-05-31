<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperQuote
 */
class Quote extends Model
{
    use UsesUuid;

    protected $fillable = [
        'quote',
        'author',
        'category_id',
        'user_id',
        'type'
    ];

    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'date:d-m-Y'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function quote_proposals(): HasOne
    {
        return $this->hasOne(QuoteProposal::class);
    }
}
