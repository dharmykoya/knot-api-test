<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardSwitcherTask extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "card_id", "merchant_id", "status"];
}
