<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Wajib ditambahkan untuk kelola file

class RewardController extends Controller
{
    public function index(Request $request)
    {
        $query = Reward::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $rewards = $query->latest()->paginate(15)->withQueryString();

        return view('admin.rewards.index', compact('rewards'));
    }

    public function create()
    {
        return view('admin.rewards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
            'description'     => 'nullable|string',
            'points_required' => 'required|integer|min:1',
            'stock'           => 'required|integer|min:0',
            'status'          => 'required|in:active,inactive',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
        ]);

        // Proses simpan gambar
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('rewards', 'public');
        }

        Reward::create($validated);

        return redirect()
            ->route('admin.rewards.index')
            ->with('success', 'Reward berhasil ditambahkan.');
    }

    public function show(Reward $reward)
    {
        return redirect()->route('admin.rewards.edit', $reward);
    }

    public function edit(Reward $reward)
    {
        return view('admin.rewards.edit', compact('reward'));
    }

    public function update(Request $request, Reward $reward)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
            'description'     => 'nullable|string',
            'points_required' => 'required|integer|min:1',
            'stock'           => 'required|integer|min:0',
            'status'          => 'required|in:active,inactive',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
        ]);

        // Proses update gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($reward->image) {
                Storage::disk('public')->delete($reward->image);
            }
            $validated['image'] = $request->file('image')->store('rewards', 'public');
        }

        $reward->update($validated);

        return redirect()
            ->route('admin.rewards.index')
            ->with('success', 'Reward berhasil diperbarui.');
    }

    public function destroy(Reward $reward)
    {
        // Hapus file fisik gambar jika reward dihapus
        if ($reward->image) {
            Storage::disk('public')->delete($reward->image);
        }

        $reward->delete();

        return redirect()
            ->route('admin.rewards.index')
            ->with('success', 'Reward berhasil dihapus.');
    }
}