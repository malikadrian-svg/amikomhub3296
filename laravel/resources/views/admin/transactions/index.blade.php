@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Laporan Transaksi</h2>
    </div>

    {{-- Search & Filter --}}
    <form action="{{ route('admin.transactions.index') }}" method="GET" class="mb-5">
        <div class="flex gap-3 items-center">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari Order ID, pembeli, atau event..."
                class="flex-1 border border-gray-300 p-2.5 rounded focus:ring focus:ring-indigo-200 bg-white" />
            <select name="filter" class="border border-gray-300 p-2.5 rounded bg-white text-gray-700 focus:ring focus:ring-indigo-200">
                <option value="">-- Urutkan --</option>
                <option value="newest" {{ ($filter ?? '') == 'newest' ? 'selected' : '' }}>Terbaru (Tanggal Transaksi)</option>
                <option value="oldest" {{ ($filter ?? '') == 'oldest' ? 'selected' : '' }}>Terlama (Tanggal Transaksi)</option>
                <option value="price_desc" {{ ($filter ?? '') == 'price_desc' ? 'selected' : '' }}>Tagihan Terbesar</option>
                <option value="price_asc" {{ ($filter ?? '') == 'price_asc' ? 'selected' : '' }}>Tagihan Terkecil</option>
            </select>
            <button type="submit" class="bg-indigo-600 text-white px-5 py-2.5 rounded font-semibold hover:bg-indigo-700 transition">Cari Data</button>
            @if(($search ?? '') || ($filter ?? ''))
            <a href="{{ route('admin.transactions.index') }}" class="bg-gray-100 text-gray-700 border border-gray-300 px-5 py-2.5 rounded font-semibold hover:bg-gray-200 transition">Reset</a>
            @endif
        </div>
    </form>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-600 font-semibold border-b border-gray-200">
                    <tr>
                        <th class="p-4 font-semibold text-gray-600">Order ID</th>
                        <th class="p-4 font-semibold text-gray-600">Detail Pembeli</th>
                        <th class="p-4 font-semibold text-gray-600">Event</th>
                        <th class="p-4 font-semibold text-gray-600">Tgl Transaksi</th>
                        <th class="p-4 font-semibold text-gray-600">Status</th>
                        <th class="p-4 font-semibold text-gray-600 text-right">Total Tagihan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($transactions as $trx)
                    <tr class="hover:bg-gray-50 transition {{ $trx->status == 'pending' ? 'text-gray-400' : '' }}">
                        <td class="p-4">
                            <span class="font-mono font-bold px-3 py-1 rounded-lg text-sm {{ $trx->status == 'pending' ? 'bg-gray-100' : 'text-indigo-600 bg-indigo-50' }}">
                                {{ $trx->order_id }}
                            </span>
                        </td>
                        <td class="p-4">
                            <p class="font-bold text-gray-800">{{ $trx->customer_name }}</p>
                            <p class="text-xs text-gray-500">{{ $trx->customer_email }}<br>{{ $trx->customer_phone }}</p>
                        </td>
                        <td class="p-4">
                            <p class="font-medium text-gray-700">{{ $trx->event->title ?? '-' }}</p>
                        </td>
                        <td class="p-4 text-sm text-gray-500">
                            {{ $trx->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="p-4">
                            @if($trx->status === 'settlement' || $trx->status === 'success')
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase ring-1 ring-green-200">Success</span>
                            @elseif($trx->status === 'pending')
                                <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase ring-1 ring-orange-200">Pending</span>
                            @else
                                <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-bold uppercase ring-1 ring-rose-200">{{ $trx->status }}</span>
                            @endif
                        </td>
                        <td class="p-4 text-right font-black {{ $trx->status == 'pending' ? '' : 'text-gray-900' }}">
                            Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-400 font-medium">Belum ada transaksi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Custom Pagination --}}
    @if($transactions->hasPages())
    <div class="flex items-center justify-between mt-6">
        <p class="text-sm text-gray-500">
            Menampilkan <span class="font-semibold text-gray-700">{{ $transactions->firstItem() }}</span>
            - <span class="font-semibold text-gray-700">{{ $transactions->lastItem() }}</span>
            dari <span class="font-semibold text-gray-700">{{ $transactions->total() }}</span> data
        </p>
        <div class="flex items-center gap-1">
            {{-- Previous --}}
            @if($transactions->onFirstPage())
                <span class="px-3 py-2 text-sm text-gray-300 bg-gray-50 border border-gray-200 rounded cursor-not-allowed">&laquo; Prev</span>
            @else
                <a href="{{ $transactions->appends(['search' => $search, 'filter' => $filter])->previousPageUrl() }}"
                   class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition">&laquo; Prev</a>
            @endif

            {{-- Page Numbers --}}
            @foreach($transactions->getUrlRange(1, $transactions->lastPage()) as $page => $url)
                @if($page == $transactions->currentPage())
                    <span class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 border border-indigo-600 rounded">{{ $page }}</span>
                @else
                    <a href="{{ $transactions->appends(['search' => $search, 'filter' => $filter])->url($page) }}"
                       class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next --}}
            @if($transactions->hasMorePages())
                <a href="{{ $transactions->appends(['search' => $search, 'filter' => $filter])->nextPageUrl() }}"
                   class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition">Next &raquo;</a>
            @else
                <span class="px-3 py-2 text-sm text-gray-300 bg-gray-50 border border-gray-200 rounded cursor-not-allowed">Next &raquo;</span>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection
