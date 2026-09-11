<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'kasir_id',
        'transaction_number',
        'total_amount',
        'type',
        'points_earned',
        'points_redeemed',
        'discount_amount',
        'redeem_code',
        'status',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function kasir(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kasir_id');
    }

    public function redeemHistories()
    {
        return $this->hasMany(RedeemHistory::class);
    }

    public function pointHistories()
    {
        return $this->hasMany(PointHistory::class);
    }
}
