<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — AmikomHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Manrope', sans-serif; }

        :root {
            --violet-50:  #f3ebfe;
            --violet-100: #d9c1fb;
            --violet-200: #c6a3f9;
            --violet-400: #9d5ef5;
            --violet-500: #8436f2;
            --violet-600: #7831dc;
            --violet-700: #5e26ac;
            --violet-800: #491e85;
            --neutral-0:   #ffffff;
            --neutral-50:  #f8fafc;
            --neutral-100: #f1f5f9;
            --neutral-200: #e2e8f0;
            --neutral-400: #94a3b8;
            --neutral-600: #475569;
            --neutral-800: #1e293b;
            --neutral-950: #0f172a;
        }

        body { background-color: var(--neutral-50); color: var(--neutral-800); }

        /* Sidebar nav item */
        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 14px; border-radius: 8px;
            font-size: 14px; font-weight: 600; color: var(--neutral-600);
            text-decoration: none; transition: all 150ms ease-out;
            position: relative;
        }
        .nav-item:hover { background: var(--violet-50); color: var(--neutral-800); }
        .nav-item.active {
            background: var(--violet-50); color: var(--violet-800);
        }
        .nav-item svg { flex-shrink: 0; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--neutral-100); }
        ::-webkit-scrollbar-thumb { background: var(--neutral-200); border-radius: 3px; }
    </style>
</head>

<body class="flex min-h-screen">

    <!-- Sidebar -->
    <aside style="width:256px; background:var(--neutral-0); border-right:1px solid var(--neutral-100); flex-shrink:0;" 
           class="flex flex-col sticky top-0 h-screen">

        <!-- Logo -->
        <div style="height:72px; border-bottom:1px solid var(--neutral-100); padding:0 24px;" 
             class="flex items-center gap-3">
            <div style="width:36px;height:36px;background:var(--violet-500);border-radius:10px;color:#fff;font-weight:700;font-size:13px;"
                 class="flex items-center justify-center flex-shrink-0">AH</div>
            <span style="font-size:16px;font-weight:700;color:var(--neutral-950);letter-spacing:-0.02em;">AmikomHub</span>
        </div>

        <!-- Nav -->
        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:var(--neutral-400);padding:0 14px;margin-bottom:8px;">
                Menu Utama
            </p>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.partners.index') }}"
               class="nav-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-5.356-3.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a4 4 0 015.356-3.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Partner
            </a>

            <a href="{{ route('admin.events.index') }}"
               class="nav-item {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Kelola Event
            </a>

            <a href="{{ route('admin.transactions.index') }}"
               class="nav-item {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Laporan Transaksi
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                Kategori
            </a>
        </nav>

        <!-- Logout -->
        <div style="padding:16px;border-top:1px solid var(--neutral-100);">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    style="width:100%;display:flex;align-items:center;gap:10px;padding:10px 14px;border-radius:8px;
                           font-size:14px;font-weight:600;color:var(--neutral-600);background:transparent;border:none;cursor:pointer;
                           transition:all 150ms ease-out;text-align:left;"
                    onmouseover="this.style.background='#fff1f2';this.style.color='#e11d48';"
                    onmouseout="this.style.background='transparent';this.style.color='var(--neutral-600)';">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto" style="padding:40px; background:var(--neutral-50); min-height:100vh;">
        @yield('content')
    </main>

</body>

</html>