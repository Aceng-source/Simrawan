@props(['username' => 'Admin', 'title' => 'Dashboard'])

<header class="topbar">
    <h1>{{ $title }}</h1>

    <div class="topbar-right">
        <!-- Notifikasi -->
        <a href="{{ route('notifikasi.index') }}" class="notif-icon">
            <i class="fas fa-bell"></i>

            @php
                $unread = \App\Models\Notifikasi::where('status','belum_dibaca')->count();
            @endphp

            @if($unread > 0)
                <span class="notif-badge">{{ $unread }}</span>
            @endif
        </a>

        <!-- Info Admin -->
        <div class="admin-info">
            <span class="name">{{ $username }}</span>
            <span class="role">Administrator</span>
        </div>

        <!-- Tombol Logout -->
        <button onclick="openModal('modal-logout')" class="btn-logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </div>
</header>

{{-- Modal Logout --}}
<div class="modal-overlay" id="modal-logout">
    <div class="modal" style="max-width:380px; text-align:center; padding: 32px 24px; border-radius: 18px;">
        <button class="modal-close" onclick="closeModal('modal-logout')" style="position:absolute;top:16px;right:16px;">
            &times;
        </button>

        <div style="font-size: 3rem; color: var(--danger); margin-bottom: 16px;">
            <i class="fas fa-sign-out-alt"></i>
        </div>

        <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--dark); margin-bottom: 8px;">Konfirmasi Logout</h3>

        <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 24px;">
            Apakah anda yakin ingin logout?
        </p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <div style="display: flex; gap: 12px;">
                <button type="submit" class="btn btn-success" style="flex: 1; justify-content: center; padding: 11px; font-weight: 700; border-radius: 10px;">
                    Ya
                </button>
                <button type="button" class="btn btn-danger" onclick="closeModal('modal-logout')" style="flex: 1; justify-content: center; padding: 11px; font-weight: 700; border-radius: 10px;">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>