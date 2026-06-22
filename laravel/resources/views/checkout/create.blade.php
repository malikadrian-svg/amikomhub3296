@extends('layouts.app')

@section('title', 'Checkout - ' . $event->title)

@section('content')
    <main class="max-w-6xl mx-auto px-6 py-16">

        {{-- Breadcrumb --}}
        <div class="mb-10">
            <a href="{{ route('events.show', $event->id) }}"
                class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-700 transition group">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Detail Event
            </a>
        </div>

        {{-- Page Header --}}
        <div class="mb-12">
            <span
                class="px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">Checkout</span>
            <h1 class="text-4xl md:text-5xl font-black mt-4 leading-tight">Selesaikan Pesanan</h1>
            <p class="text-slate-500 mt-3 text-lg">Lengkapi data di bawah untuk mendapatkan tiket Anda.</p>
        </div>

        {{-- Error Alert --}}
        @if(session('error'))
            <div
                class="mb-8 p-5 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl font-semibold flex items-center gap-3">
                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- LEFT: Form Card (2 columns) --}}
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-[2rem] border border-slate-100 p-8 md:p-10 shadow-sm">
                    <h3 class="text-xl font-bold mb-1 text-indigo-600 flex items-center gap-2">
                        <span class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center text-sm">📦</span>
                        Data Pemesan
                    </h3>
                    <p class="text-slate-400 text-sm mb-8">Isi formulir berikut tanpa perlu login terlebih dahulu.</p>

                    <form action="{{ route('checkout.store', $event->id) }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama
                                Lengkap</label>
                            <input type="text" name="customer_name" placeholder="Masukkan nama sesuai identitas"
                                class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white outline-none transition font-medium"
                                required value="{{ old('customer_name') }}">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Email --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Email
                                    Aktif</label>
                                <input type="email" name="customer_email" placeholder="contoh@gmail.com"
                                    class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white outline-none transition font-medium"
                                    required value="{{ old('customer_email') }}">
                                <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    E-Ticket akan dikirim ke email ini
                                </p>
                            </div>

                            {{-- No. WhatsApp --}}
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">No.
                                    WhatsApp</label>
                                <input type="tel" name="customer_phone" placeholder="08xxxxxxxxxx"
                                    class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white outline-none transition font-medium"
                                    required value="{{ old('customer_phone') }}">
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit"
                            class="w-full py-5 bg-indigo-600 text-white rounded-2xl font-black text-xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 hover:shadow-2xl hover:shadow-indigo-300 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Lanjut Pembayaran
                        </button>

                        <p class="text-center text-xs text-slate-400">Dengan menekan tombol di atas, Anda menyetujui Syarat
                            & Ketentuan kami.</p>
                    </form>
                </div>
            </div>

            {{-- RIGHT: Order Summary Sidebar (1 column) --}}
            <div class="lg:col-span-1">
                <div class="sticky top-32 space-y-6">

                    {{-- Event Summary Card --}}
                    <div class="bg-white rounded-[2rem] border border-slate-100 p-6 shadow-sm overflow-hidden">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-5">Pesanan Anda</h3>

                        {{-- Event Poster --}}
                        <div class="rounded-2xl overflow-hidden mb-5">
                            <img src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
        ? asset('storage/' . $event->poster_path)
        : 'https://placehold.co/400x300' }}" alt="{{ $event->title }}"
                                class="w-full h-40 object-cover">
                        </div>

                        {{-- Event Info --}}
                        <h4 class="font-extrabold text-lg leading-snug">{{ $event->title }}</h4>
                        <div class="mt-3 space-y-2">
                            <p class="text-slate-500 text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ $event->date->format('d M Y, H:i') }} WIB
                            </p>
                            <p class="text-slate-500 text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $event->location }}
                            </p>
                        </div>
                    </div>

                    {{-- Price Breakdown Card --}}
                    <div class="bg-white rounded-[2rem] border border-slate-100 p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest mb-5">Rincian Harga</h3>

                        <div class="space-y-4">
                            <div class="flex justify-between text-slate-600">
                                <span>1x Tiket Masuk</span>
                                <span class="font-semibold">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Biaya Layanan</span>
                                <span class="font-semibold">Rp 5.000</span>
                            </div>
                            <div class="border-t-2 border-dashed border-slate-100 pt-4 flex justify-between items-center">
                                <span class="text-lg font-bold text-slate-900">Total Bayar</span>
                                <span class="text-2xl font-black text-indigo-600">Rp
                                    {{ number_format($event->price + 5000, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Trust Badges --}}
                    <div class="bg-indigo-50 rounded-[2rem] p-6 border border-indigo-100">
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 text-sm text-slate-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                                <span>Transaksi aman & terenkripsi</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-slate-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>E-Ticket dikirim otomatis via email</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-slate-600">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Konfirmasi instan tanpa antri</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
@endsection