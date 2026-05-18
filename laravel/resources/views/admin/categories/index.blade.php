@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Manajemen Kategori</h2>
        <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded font-semibold hover:bg-indigo-700">Tambah Kategori</a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-5 border border-green-200">
        {{ session('success') }}
    </div>
    @endif

    {{-- Search & Filter --}}
    <form action="{{ route('admin.categories.index') }}" method="GET" class="mb-5">
        <div class="flex gap-3 items-center">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama kategori..."
                class="flex-1 border border-gray-300 p-2.5 rounded focus:ring focus:ring-indigo-200 bg-white" />
            <select name="filter" class="border border-gray-300 p-2.5 rounded bg-white text-gray-700 focus:ring focus:ring-indigo-200">
                <option value="">-- Urutkan --</option>
                <option value="name_asc" {{ ($filter ?? '') == 'name_asc' ? 'selected' : '' }}>Nama (A → Z)</option>
                <option value="name_desc" {{ ($filter ?? '') == 'name_desc' ? 'selected' : '' }}>Nama (Z → A)</option>
                <option value="oldest" {{ ($filter ?? '') == 'oldest' ? 'selected' : '' }}>Terlama (Berdasarkan tanggal dibuat)</option>
                <option value="newest" {{ ($filter ?? '') == 'newest' ? 'selected' : '' }}>Terbaru (Berdasarkan tanggal dibuat)</option>
            </select>
            <button type="submit" class="bg-indigo-600 text-white px-5 py-2.5 rounded font-semibold hover:bg-indigo-700 transition">Cari Data</button>
            @if(($search ?? '') || ($filter ?? ''))
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-100 text-gray-700 border border-gray-300 px-5 py-2.5 rounded font-semibold hover:bg-gray-200 transition">Reset</a>
            @endif
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded-lg shadow-sm border border-gray-200 text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="p-4 font-semibold text-gray-600">No</th>
                    <th class="p-4 font-semibold text-gray-600">Nama Kategori</th>
                    <th class="p-4 font-semibold text-gray-600">Jumlah Event</th>
                    <th class="p-4 font-semibold text-gray-600">Created At</th>
                    <th class="p-4 font-semibold text-gray-600">Updated At</th>
                    <th class="p-4 font-semibold text-gray-600">Aksi Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $index => $category)
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="p-4 text-gray-800">{{ $categories->firstItem() + $index }}</td>
                    <td class="p-4 text-gray-800 font-semibold">{{ $category->name }}</td>
                    <td class="p-4 text-indigo-600">{{ $category->events_count }} Event</td>
                    <td class="p-4 text-gray-600">{{ $category->created_at->format('d M Y, H:i') }}</td>
                    <td class="p-4 text-gray-600">{{ $category->updated_at->format('d M Y, H:i') }}</td>
                    <td class="p-4 flex gap-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="bg-blue-50 text-blue-600 border border-blue-200 px-3 py-1.5 rounded text-sm font-semibold hover:bg-blue-600 hover:text-white transition">Edit Data</a>

                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus kategori ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-100 text-red-600 border border-red-200 px-3 py-1.5 rounded text-sm font-semibold hover:bg-red-600 hover:text-white transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400 font-medium">
                        Belum ada kategori. Klik tombol "Tambah Kategori" untuk menambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Custom Pagination --}}
    @if($categories->hasPages())
    <div class="flex items-center justify-between mt-6">
        <p class="text-sm text-gray-500">
            Menampilkan <span class="font-semibold text-gray-700">{{ $categories->firstItem() }}</span>
            - <span class="font-semibold text-gray-700">{{ $categories->lastItem() }}</span>
            dari <span class="font-semibold text-gray-700">{{ $categories->total() }}</span> data
        </p>
        <div class="flex items-center gap-1">
            {{-- Previous --}}
            @if($categories->onFirstPage())
                <span class="px-3 py-2 text-sm text-gray-300 bg-gray-50 border border-gray-200 rounded cursor-not-allowed">&laquo; Prev</span>
            @else
                <a href="{{ $categories->appends(['search' => $search, 'filter' => $filter])->previousPageUrl() }}"
                   class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition">&laquo; Prev</a>
            @endif

            {{-- Page Numbers --}}
            @foreach($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                @if($page == $categories->currentPage())
                    <span class="px-3 py-2 text-sm font-semibold text-white bg-indigo-600 border border-indigo-600 rounded">{{ $page }}</span>
                @else
                    <a href="{{ $categories->appends(['search' => $search, 'filter' => $filter])->url($page) }}"
                       class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next --}}
            @if($categories->hasMorePages())
                <a href="{{ $categories->appends(['search' => $search, 'filter' => $filter])->nextPageUrl() }}"
                   class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-200 rounded hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition">Next &raquo;</a>
            @else
                <span class="px-3 py-2 text-sm text-gray-300 bg-gray-50 border border-gray-200 rounded cursor-not-allowed">Next &raquo;</span>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection
