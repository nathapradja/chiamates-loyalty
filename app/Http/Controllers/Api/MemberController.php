<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function show($id)
    {
        $member = Member::with('user')
            ->where('id', $id)
            ->orWhere('member_code', $id)
            ->orWhere('phone', $id)
            ->first();

        if (!$member) {
            return response()->json(['success' => false, 'message' => 'Member not found'], 404);
        }

        return response()->json([
            'success' => true,
            'member' => [
                'id' => $member->id,
                'name' => $member->user->name,
                'member_code' => $member->member_code,
                'phone' => $member->phone,
                'points' => $member->points,
            ]
        ]);
    }

    public function generateQr(Request $request)
    {
        $user = auth()->user();
        $member = optional($user)->member;
        if (!$member) {
            return response()->json(['error' => 'Member not found'], 404);
        }

        // Generate token baru
        $token = Str::random(32);
        $member->update([
            'qr_token' => $token,
            'qr_expires_at' => now()->addMinutes(5),
        ]);

        return response()->json([
            'qr_token' => $token,
            'qr_expires_at' => $member->qr_expires_at->toIso8601String()
        ]);
    }
}
