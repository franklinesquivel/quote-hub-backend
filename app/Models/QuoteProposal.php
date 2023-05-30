<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperQuoteProposal
 */
class QuoteProposal extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        "status",
        "rejected_reason",
        "rejected_at",
        "quote_id"
    ];

    protected $hidden = [
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'rejected_at' => 'date:d-m-Y'
    ];

    public function quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }

}
