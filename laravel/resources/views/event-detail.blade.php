@extends('layouts.app')

@section('title', $event->title . ' - AmikomEventHub')

@section('content')

{{-- ─── HERO BLOCK ─────────────────────────────────────────────────────────── --}}
<section class="w-full bg-neutral-50 border-b border-neutral-100">
    <div class="max-w-7xl mx-auto px-6 pt-10 pb-0">

        {{-- Back breadcrumb --}}
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-1.5 text-xs font-semibold text-neutral-400 hover:text-violet-600 transition-colors duration-150 mb-10 group">
            <svg class="w-3.5 h-3.5 transition-transform duration-150 group-hover:-translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5m7 7l-7-7 7-7"/>
            </svg>
            Jelajahi Event
        </a>

        {{-- Category + Title row --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-end pb-12">

            {{-- Title block (7 cols) --}}
            <div class="lg:col-span-7 space-y-5">
                <span class="inline-flex items-center px-3 py-1 bg-violet-50 border border-violet-100 text-violet-700 rounded-full text-[11px] font-bold uppercase tracking-widest">
                    {{ $event->category->name }}
                </span>

                <h1 class="text-[2.6rem] lg:text-[3.25rem] font-bold leading-[1.1] text-neutral-900" style="letter-spacing:-0.02em">
                    {{ $event->title }}
                </h1>

            </div>

    </div>
</section>

{{-- ─── MAIN CONTENT ────────────────────────────────────────────────────────── --}}
<main class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14">

        {{-- ── LEFT COLUMN: Poster + About + Policy (8 cols) ───────────────── --}}
        <div class="lg:col-span-8 space-y-10">

            {{-- Poster Image --}}
            <div class="w-full overflow-hidden rounded-3xl border border-neutral-200 bg-neutral-100">
                @php $hasPoster = $event->poster_path && Storage::disk('public')->exists($event->poster_path); @endphp
                @if($hasPoster)
                    <img src="{{ asset('storage/' . $event->poster_path) }}"
                         alt="{{ $event->title }}"
                         class="w-full object-cover max-h-[420px] object-center">
                @else
                    <img src="https://placehold.co/800x420?text=No+Poster"
                         alt="No Poster"
                         class="w-full object-cover max-h-[420px] object-center">
                @endif
            </div>

            {{-- About Section --}}
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-1 h-5 bg-violet-500 rounded-full"></div>
                    <h2 class="text-base font-bold text-neutral-900" style="letter-spacing:-0.01em">Tentang Event</h2>
                </div>
                <p class="text-sm text-neutral-600 leading-[1.8] whitespace-pre-line pl-4">
                    {{ $event->description }}
                </p>
            </div>

            {{-- Divider --}}
            <div class="border-t border-neutral-100"></div>

            {{-- Policy Section --}}
            <div class="space-y-5">
                <div class="flex items-center gap-3">
                    <div class="w-1 h-5 bg-violet-500 rounded-full"></div>
                    <h2 class="text-base font-bold text-neutral-900" style="letter-spacing:-0.01em">Ketentuan & Kebijakan</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    {{-- Policy 1 --}}
                    <div class="group flex flex-col gap-3 p-5 rounded-2xl border border-neutral-200 bg-white hover:border-neutral-300 transition-colors duration-150">
                        <div class="w-8 h-8 rounded-xl bg-neutral-100 border border-neutral-200 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-neutral-800 mb-1 leading-tight">E-Ticket Instan</p>
                            <p class="text-[11px] text-neutral-500 leading-relaxed font-medium">
                                Dikirim otomatis ke email setelah transaksi terverifikasi.
                            </p>
                        </div>
                    </div>

                    {{-- Policy 2 --}}
                    <div class="group flex flex-col gap-3 p-5 rounded-2xl border border-neutral-200 bg-white hover:border-neutral-300 transition-colors duration-150">
                        <div class="w-8 h-8 rounded-xl bg-neutral-100 border border-neutral-200 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m0 14v1m8-9h-1m-14 0H3m2.222-5.636l.707.707m12.122 12.122l.707.707M5.05 18.95l.707-.707m12.122-12.122l.707-.707M12 9a3 3 0 110 6 3 3 0 010-6z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-neutral-800 mb-1 leading-tight">Scan & Check-in</p>
                            <p class="text-[11px] text-neutral-500 leading-relaxed font-medium">
                                Tunjukkan barcode e-ticket saat tiba di lokasi acara.
                            </p>
                        </div>
                    </div>

                    {{-- Policy 3 --}}
                    <div class="group flex flex-col gap-3 p-5 rounded-2xl border border-neutral-200 bg-white hover:border-neutral-300 transition-colors duration-150">
                        <div class="w-8 h-8 rounded-xl bg-neutral-100 border border-neutral-200 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-neutral-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-neutral-800 mb-1 leading-tight">Non-Refundable</p>
                            <p class="text-[11px] text-neutral-500 leading-relaxed font-medium">
                                Tiket yang sudah dibeli bersifat final dan tidak dapat dikembalikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- ── RIGHT COLUMN: Sticky Ticket Widget (4 cols) ─────────────────── --}}
        <div class="lg:col-span-4">
            <div class="sticky top-[100px] space-y-4">

                {{-- Main Ticket Card --}}
                <div class="rounded-3xl border border-neutral-200 bg-white overflow-hidden shadow-[0_4px_24px_0_rgba(15,23,42,0.06)]">

                    {{-- Price header --}}
                    <div class="px-7 pt-7 pb-6 border-b border-neutral-100">
                        <p class="text-[9px] font-bold uppercase tracking-widest text-neutral-400 leading-none mb-3">Harga Tiket</p>
                        @if($event->price == 0)
                            <div class="flex items-baseline gap-1.5">
                                <span class="text-3xl font-bold text-emerald-500" style="letter-spacing:-0.02em">GRATIS</span>
                            </div>
                        @else
                            <div class="flex items-baseline gap-1.5">
                                <span class="text-3xl font-bold text-neutral-900" style="letter-spacing:-0.02em">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                                <span class="text-xs text-neutral-400 font-semibold">/ orang</span>
                            </div>
                        @endif
                    </div>

                    {{-- Stock row --}}
                    <div class="px-7 py-5 border-b border-neutral-100 flex items-center">
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 {{ $event->stock > 10 ? 'text-violet-400' : ($event->stock > 0 ? 'text-amber-500' : 'text-rose-400') }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                            <div>
                                <p class="text-[9px] font-bold uppercase tracking-widest text-neutral-400 leading-none">Ketersediaan</p>
                                @if($event->stock > 0)
                                    <p class="text-[12px] font-bold text-neutral-800 mt-0.5 leading-none">{{ $event->stock }} tiket tersisa</p>
                                @else
                                    <p class="text-[12px] font-bold text-rose-500 mt-0.5 leading-none">Tiket habis</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- CTA Block --}}
                    <div class="px-7 py-6 space-y-3">
                        @if($event->stock > 0)
                            <a href="{{ route('checkout.create', $event->id) }}"
                               class="flex items-center justify-center w-full px-5 py-3.5 bg-violet-600 hover:bg-violet-500 active:bg-violet-700 text-white font-semibold text-sm rounded-xl transition-all duration-150 shadow-sm hover:shadow-md hover:shadow-violet-500/20"
                               style="letter-spacing:-0.005em">
                                Pesan Tiket Sekarang
                            </a>
                        @else
                            <button disabled
                                    class="flex items-center justify-center w-full px-5 py-3.5 bg-neutral-100 text-neutral-400 font-semibold text-sm rounded-xl cursor-not-allowed border border-neutral-200">
                                Tiket Habis Terjual
                            </button>
                        @endif

                        <p class="text-center text-[10px] text-neutral-400 font-medium">
                            Pembayaran aman melalui <span class="font-bold text-neutral-500">Midtrans</span>
                        </p>
                    </div>
                </div>

                {{-- Organizer Card --}}
                <div class="rounded-2xl border border-neutral-200 bg-white px-5 py-4 flex items-center gap-3.5">
                    <div class="w-10 h-10 rounded-xl bg-violet-50 border border-violet-100 flex items-center justify-center font-bold text-violet-700 text-xs flex-shrink-0">
                        AB
                    </div>
                    <div class="min-w-0">
                        <p class="text-[9px] text-neutral-400 font-bold uppercase tracking-widest leading-none mb-1">Penyelenggara</p>
                        <p class="text-xs font-bold text-neutral-800 truncate leading-tight">ABP Productions</p>
                        <p class="text-[10px] font-semibold text-emerald-600 mt-0.5 leading-none">✓ Terverifikasi</p>
                    </div>
                </div>

                {{-- Datetime + Location Cards --}}
                <div class="rounded-2xl border border-neutral-200 bg-white px-5 py-4 space-y-3.5">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-neutral-100 border border-neutral-200 flex items-center justify-center text-neutral-400 flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-neutral-400 leading-none">Tanggal & Waktu</p>
                            <p class="text-xs font-bold text-neutral-800 mt-1 leading-tight">{{ \Carbon\Carbon::parse($event->date)->format('l, d M Y') }}</p>
                            <p class="text-[10px] font-semibold text-neutral-500 mt-0.5">{{ \Carbon\Carbon::parse($event->date)->format('H:i') }} WIB</p>
                        </div>
                    </div>

                    <div class="border-t border-neutral-100"></div>

                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-neutral-100 border border-neutral-200 flex items-center justify-center text-neutral-400 flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-neutral-400 leading-none">Lokasi</p>
                            <p class="text-xs font-bold text-neutral-800 mt-1 leading-tight">{{ $event->location }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

{{-- ─── MOBILE BOTTOM BAR ───────────────────────────────────────────────────── --}}
<div class="fixed bottom-0 inset-x-0 z-50 lg:hidden bg-white border-t border-neutral-200 px-5 py-3.5 flex items-center justify-between gap-4 shadow-[0_-4px_20px_rgba(15,23,42,0.06)]">
    <div>
        <p class="text-[9px] font-bold uppercase tracking-widest text-neutral-400 leading-none">Harga / orang</p>
        @if($event->price == 0)
            <p class="text-base font-bold text-emerald-600 mt-1">GRATIS</p>
        @else
            <p class="text-base font-bold text-neutral-900 mt-1">Rp {{ number_format($event->price, 0, ',', '.') }}</p>
        @endif
    </div>

    @if($event->stock > 0)
        <a href="{{ route('checkout.create', $event->id) }}"
           class="flex-shrink-0 px-6 py-3 bg-violet-600 hover:bg-violet-500 text-white text-sm font-semibold rounded-xl transition-all duration-150 active:scale-95">
            Pesan Tiket
        </a>
    @else
        <button disabled class="flex-shrink-0 px-6 py-3 bg-neutral-100 text-neutral-400 text-sm font-semibold rounded-xl cursor-not-allowed border border-neutral-200">
            Tiket Habis
        </button>
    @endif
</div>

@endsection