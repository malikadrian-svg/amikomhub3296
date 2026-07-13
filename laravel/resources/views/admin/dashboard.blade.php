@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div>
    <!-- Page Header -->
    <div style="margin-bottom:32px;">
        <h1 style="font-size:24px;font-weight:700;color:#0f172a;letter-spacing:-0.02em;margin-bottom:4px;">Dashboard</h1>
        <p style="font-size:14px;color:#475569;">Ringkasan statistik dan aktivitas terkini platform.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" style="margin-bottom:32px;">

        {{-- Total Pendapatan --}}
        <div style="background:#fff;border:1px solid #f1f5f9;border-radius:16px;padding:24px;
                    box-shadow:0 1px 3px 0 rgba(15,23,42,.03),0 1px 2px -1px rgba(15,23,42,.03);">
            <div style="width:40px;height:40px;background:#f1f5f9;border-radius:10px;
                        display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                <svg width="20" height="20" fill="none" stroke="#475569" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p style="font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:#94a3b8;margin-bottom:6px;">Total Pendapatan</p>
            <p style="font-size:22px;font-weight:700;color:#0f172a;letter-spacing:-0.02em;">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>

        {{-- Tiket Terjual --}}
        <div style="background:#fff;border:1px solid #f1f5f9;border-radius:16px;padding:24px;
                    box-shadow:0 1px 3px 0 rgba(15,23,42,.03),0 1px 2px -1px rgba(15,23,42,.03);">
            <div style="width:40px;height:40px;background:#f1f5f9;border-radius:10px;
                        display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                <svg width="20" height="20" fill="none" stroke="#475569" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
            </div>
            <p style="font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:#94a3b8;margin-bottom:6px;">Tiket Terjual</p>
            <p style="font-size:22px;font-weight:700;color:#0f172a;letter-spacing:-0.02em;">{{ number_format($ticketsSold, 0, ',', '.') }}</p>
        </div>

        {{-- Event Aktif --}}
        <div style="background:#fff;border:1px solid #f1f5f9;border-radius:16px;padding:24px;
                    box-shadow:0 1px 3px 0 rgba(15,23,42,.03),0 1px 2px -1px rgba(15,23,42,.03);">
            <div style="width:40px;height:40px;background:#f1f5f9;border-radius:10px;
                        display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                <svg width="20" height="20" fill="none" stroke="#475569" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p style="font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:#94a3b8;margin-bottom:6px;">Event Aktif</p>
            <p style="font-size:22px;font-weight:700;color:#0f172a;letter-spacing:-0.02em;">{{ $activeEvents }}</p>
        </div>

        {{-- Pesanan Pending --}}
        <div style="background:#fff;border:1px solid #f1f5f9;border-radius:16px;padding:24px;
                    box-shadow:0 1px 3px 0 rgba(15,23,42,.03),0 1px 2px -1px rgba(15,23,42,.03);">
            <div style="width:40px;height:40px;background:#f1f5f9;border-radius:10px;
                        display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
                <svg width="20" height="20" fill="none" stroke="#475569" stroke-width="1.75" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p style="font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:#94a3b8;margin-bottom:6px;">Pesanan Pending</p>
            <p style="font-size:22px;font-weight:700;color:#0f172a;letter-spacing:-0.02em;">{{ $pendingOrders }}</p>
        </div>

    </div>

    <!-- Recent Transactions -->
    <div style="background:#fff;border:1px solid #f1f5f9;border-radius:16px;overflow:hidden;
                box-shadow:0 1px 3px 0 rgba(15,23,42,.03),0 1px 2px -1px rgba(15,23,42,.03);">

        <div style="padding:20px 24px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;">
            <div>
                <h2 style="font-size:16px;font-weight:700;color:#0f172a;letter-spacing:-0.02em;">Transaksi Terakhir</h2>
                <p style="font-size:13px;color:#94a3b8;margin-top:2px;">10 transaksi paling baru</p>
            </div>
            <a href="{{ route('admin.transactions.index') }}"
               style="font-size:13px;font-weight:600;color:#8436f2;text-decoration:none;transition:color 150ms;"
               onmouseover="this.style.color='#7831dc'" onmouseout="this.style.color='#8436f2'">
                Lihat Semua →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="background:#f8fafc;border-bottom:1px solid #f1f5f9;">
                        <th style="padding:12px 20px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;text-align:left;white-space:nowrap;">Tgl Transaksi</th>
                        <th style="padding:12px 20px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;text-align:left;">Pembeli</th>
                        <th style="padding:12px 20px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;text-align:left;">Event</th>
                        <th style="padding:12px 20px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;text-align:left;">Status</th>
                        <th style="padding:12px 20px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;text-align:right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentTransactions as $trx)
                        <tr style="border-bottom:1px solid #f1f5f9;transition:background 150ms;"
                            onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding:14px 20px;">
                                <p style="font-size:13px;color:#475569;white-space:nowrap;">{{ $trx->created_at->format('d M Y') }}</p>
                                <p style="font-size:12px;color:#94a3b8;font-family:monospace;margin-top:2px;">{{ $trx->order_id }}</p>
                            </td>
                            <td style="padding:14px 20px;">
                                <p style="font-size:14px;font-weight:600;color:#1e293b;max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $trx->customer_name }}</p>
                                <p style="font-size:12px;color:#94a3b8;max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $trx->customer_email }}</p>
                            </td>
                            <td style="padding:14px 20px;font-size:14px;color:#475569;max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                {{ $trx->event->title ?? '-' }}
                            </td>
                            <td style="padding:14px 20px;">
                                @if($trx->status === 'settlement' || $trx->status === 'success')
                                    <span style="display:inline-flex;padding:3px 10px;background:#f0fdf4;color:#15803d;border-radius:6px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.04em;border:1px solid #bbf7d0;">Lunas</span>
                                @elseif($trx->status === 'pending')
                                    <span style="display:inline-flex;padding:3px 10px;background:#fffbeb;color:#b45309;border-radius:6px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.04em;border:1px solid #fde68a;">Pending</span>
                                @else
                                    <span style="display:inline-flex;padding:3px 10px;background:#fff1f2;color:#be123c;border-radius:6px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.04em;border:1px solid #fecdd3;">{{ $trx->status }}</span>
                                @endif
                            </td>
                            <td style="padding:14px 20px;text-align:right;font-size:14px;font-weight:700;color:#0f172a;white-space:nowrap;">
                                Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding:48px 24px;text-align:center;color:#94a3b8;font-size:14px;">
                                Belum ada transaksi tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection