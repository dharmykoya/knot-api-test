<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardSwitcherTask extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "card_id", "merchant_id", "status", "previous_card_id"];

    public const PENDING = "pending";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
