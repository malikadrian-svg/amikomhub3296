@extends('layouts.app')

@section('title', 'E-Ticket Resmi')

@section('content')
    <div class="bg-neutral-950 text-white min-h-[calc(100vh-72px)] flex items-center justify-center p-6 relative overflow-hidden">
        <!-- Accent Glows -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-violet-600/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-violet-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-md w-full relative z-10 py-12">
            <!-- Success Banner -->
            <div class="text-center mb-8 space-y-2">
                <div class="w-14 h-14 bg-emerald-500/10 text-emerald-450 border border-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-extrabold text-white tracking-tight">Pembayaran Berhasil!</h1>
                <p class="text-neutral-400 text-xs font-semibold">Tiket Anda telah terbit dan siap digunakan di lokasi.</p>
            </div>

            <!-- Ticket Card -->
            <div class="bg-white text-neutral-800 rounded-[2rem] overflow-hidden shadow-2xl relative border border-neutral-100">
                <!-- Ticket Header -->
                <div class="p-8 bg-neutral-50 border-b border-dashed border-neutral-200 text-center relative">
                    <p class="text-violet-600 font-extrabold uppercase tracking-widest text-[10px] mb-2">E-Ticket Resmi</p>
                    <h2 class="text-xl font-extrabold leading-tight text-neutral-900">Jazz Night 2024: A Celebration</h2>

                    <!-- Ticket Side Cuts -->
                    <div class="absolute -left-4 -bottom-4 w-8 h-8 bg-neutral-950 rounded-full border-r border-neutral-800"></div>
                    <div class="absolute -right-4 -bottom-4 w-8 h-8 bg-neutral-950 rounded-full border-l border-neutral-800"></div>
                </div>

                <!-- Ticket Body -->
                <div class="p-8 space-y-8">
                    <div class="grid grid-cols-2 gap-y-6 gap-x-4">
                        <div>
                            <p class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider mb-1">Nama Pembeli</p>
                            <p class="font-extrabold text-neutral-800 text-sm">Donni Prabowo</p>
                        </div>
                        <div>
                            <p class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider mb-1">Tanggal & Waktu</p>
                            <p class="font-extrabold text-neutral-800 text-sm">16 Nov 2024, 19:30 WIB</p>
                        </div>
                        <div>
                            <p class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider mb-1">Order ID</p>
                            <p class="font-extrabold text-neutral-800 text-sm">TRX-99210</p>
                        </div>
                        <div>
                            <p class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider mb-1">Lokasi</p>
                            <p class="font-extrabold text-neutral-800 text-sm">Blue Note Lounge</p>
                        </div>
                    </div>

                    <div class="bg-neutral-50 p-6 rounded-2xl border border-neutral-200/60 flex flex-col items-center">
                        <p class="text-neutral-400 text-[10px] font-extrabold uppercase tracking-wide mb-4">Scan QR untuk Check-in</p>
                        <!-- Mock QR Code -->
                        <div class="w-40 h-40 bg-white p-3 rounded-xl border border-neutral-200/80 flex items-center justify-center">
                            <div class="w-full h-full border-2 border-neutral-900 flex flex-wrap p-0.5 opacity-90">
                                <!-- Mock QR pattern grid -->
                                <div class="w-1/4 h-1/4 bg-neutral-900 border border-white"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-neutral-900 border border-white"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-neutral-900 border border-white"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-neutral-900 border border-white"></div>
                                <div class="w-1/4 h-1/4 bg-neutral-900 border border-white"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-neutral-900 border border-white"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-neutral-900 border border-white"></div>
                                <div class="w-1/4 h-1/4 bg-white"></div>
                                <div class="w-1/4 h-1/4 bg-neutral-900 border border-white"></div>
                            </div>
                        </div>
                        <p class="mt-4 font-mono font-bold text-neutral-800 text-xs tracking-wider">TKT-001293848</p>
                    </div>
                </div>

                <div class="px-8 pb-8 space-y-4">
                    <button onclick="window.print()"
                        class="w-full h-11 bg-violet-600 text-white rounded-xl font-bold text-xs hover:bg-violet-750 transition duration-150 flex items-center justify-center gap-2 shadow-sm">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        Cetak / Simpan PDF
                    </button>
                    <a href="{{ route('home') }}"
                        class="block text-center text-xs font-bold text-neutral-450 hover:text-neutral-600 transition">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection