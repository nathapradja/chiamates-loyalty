@extends('admin.layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')

<style>
    .admin-page { width: 100%; max-width: 1300px; margin: 0 auto; }
    .page-header { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-bottom: 24px; }
    .page-title h1 { margin: 0 0 4px; font-size: 26px; font-weight: 850; color: #18351c; }
    .btn-create { padding: 10px 18px; border-radius: 11px; background: #65ad20; color: #fff; font-weight: 800; font-size: 13px; text-decoration: none; }
    .table-card { background: #fff; border: 1px solid #e1eadb; border-radius: 18px; overflow: hidden; }
    .admin-table { width: 100%; border-collapse: collapse; }
    .admin-table th { padding: 14px 18px; background: #f7faf5; border-bottom: 1px solid #e3ebe0; font-size: 11px; font-weight: 800; color: #687568; text-transform: uppercase; }
    .admin-table td { padding: 14px 18px; border-bottom: 1px solid #edf2ea; font-size: 13px; color: #29422d; }
    .badge-role { padding: 4px 10px; border-radius: 20px; font-size: 10px; font-weight: 800; text-transform: uppercase; }
    .role-admin { background: #fef3c7; color: #d97706; }
    .role-kasir { background: #e0f2fe; color: #0284c7; }
    .role-member { background: #eef7e7; color: #579719; }
</style>

<div class="admin-page">
    <div class="page-header">
        <div class="page-title">
            <h1>Manajemen Pengguna & Hak Akses</h1>
            <p>Kelola daftar akun Admin, Kasir, dan Member Chiamates</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn-create">+ Tambah Pengguna Baru</a>
    </div>

    @if(session('success'))
        <div style="margin-bottom:20px; padding:12px 16px; background:#eef7e7; border:1px solid #dcebd0; color:#579719; border-radius:10px; font-size:13px; font-weight:700;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <div style="padding:16px; border-bottom:1px solid #e7eee3;">
            <form method="GET" action="{{ route('admin.users.index') }}" style="display:flex; gap:12px;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." style="padding:9px 14px; border:1px solid #dce5d7; border-radius:10px; font-size:13px; width:260px;">
                <select name="role" style="padding:9px 14px; border:1px solid #dce5d7; border-radius:10px; font-size:13px;">
                    <option value="">Semua Role</option>
                    <option value="admin" {{ request('role')=='admin'?'selected':'' }}>Admin</option>
                    <option value="kasir" {{ request('role')=='kasir'?'selected':'' }}>Kasir</option>
                    <option value="member" {{ request('role')=='member'?'selected':'' }}>Member</option>
                </select>
                <button type="submit" style="padding:9px 16px; background:#65ad20; color:#fff; border:none; border-radius:10px; font-weight:800; cursor:pointer;">Filter</button>
            </form>
        </div>

        <div style="overflow-x:auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>ID Member (jika member)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge-role role-{{ $user->role }}">{{ $user->role }}</span>
                            </td>
                            <td>{{ $user->member->member_code ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" style="padding:5px 10px; border:1px solid #dce7d8; border-radius:6px; font-size:11px; text-decoration:none; color:#3b5034;">Edit</a>
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding:5px 10px; border:1px solid #fee2e2; background:#fff; border-radius:6px; font-size:11px; color:#dc2626; cursor:pointer;">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding:16px;">
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection
