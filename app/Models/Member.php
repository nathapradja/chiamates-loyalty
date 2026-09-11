<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'member_code',
        'qr_token',
        'qr_expires_at',
        'phone',
        'address',
        'birth_date',
        'gender',
        'points',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'qr_expires_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Membuat QR token otomatis jika belum ada.
     */
    protected static function booted(): void
    {
        static::creating(function (Member $member) {
            if (empty($member->qr_token)) {
                $member->qr_token = (string) Str::uuid();
            }
        });
    }
}