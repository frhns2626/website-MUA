@extends('admin.layouts.app')

@section('title', 'Manajemen Portfolio')

@section('content')
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-4 sm:mb-6 md:mb-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-1">Manajemen Portfolio</h1>
            <p class="text-xs sm:text-sm text-gray-600">Kelola portfolio dan karya makeup Anda</p>
        </div>
        <a href="{{ route('admin.portfolios.create') }}" 
           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-pink-600 text-white px-4 py-2.5 md:px-6 md:py-3 rounded-lg hover:bg-pink-700 transition-colors shadow-md hover:shadow-lg text-sm md:text-base font-medium whitespace-nowrap">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span class="hidden sm:inline">Tambah Portfolio Baru</span>
            <span class="sm:hidden">Tambah</span>
        </a>
    </div>

    <!-- Portfolio Grid -->
    @if($portfolios->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
            @foreach($portfolios as $portfolio)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <!-- Image -->
                    <div class="relative aspect-square overflow-hidden bg-gray-100">
                        @if($portfolio->image)
                            <img src="{{ asset('storage/' . $portfolio->image) }}" 
                                 alt="{{ $portfolio->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Status Badge -->
                        <div class="absolute top-3 right-3">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $portfolio->is_active ? 'bg-green-500 text-white' : 'bg-gray-500 text-white' }}">
                                {{ $portfolio->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <!-- Order Badge -->
                        @if($portfolio->order)
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-pink-500 text-white">
                                    #{{ $portfolio->order }}
                                </span>
                            </div>
                        @endif

                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" 
                               class="px-4 py-2 bg-white text-gray-800 rounded-lg hover:bg-pink-600 hover:text-white transition-colors text-sm font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" 
                                  method="POST" 
                                  class="inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus portfolio ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4 md:p-5">
                        <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-1 line-clamp-2">
                            {{ $portfolio->title }}
                        </h3>
                        @if($portfolio->category)
                            <p class="text-xs md:text-sm text-gray-500 mb-3">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    {{ $portfolio->category }}
                                </span>
                            </p>
                        @endif
                        
                        <!-- Actions (Mobile) -->
                        <div class="flex gap-2 mt-4 sm:hidden">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" 
                               class="flex-1 text-center px-3 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700 transition-colors text-sm font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" 
                                  method="POST" 
                                  class="flex-1"
                                  onsubmit="return confirm('Apakah Anda yakin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-xl shadow-md p-8 md:p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="w-24 h-24 mx-auto mb-6 bg-pink-100 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">Belum Ada Portfolio</h3>
                <p class="text-gray-600 mb-6">Mulai dengan membuat portfolio pertama Anda untuk menampilkan karya Anda.</p>
                <a href="{{ route('admin.portfolios.create') }}" 
                   class="inline-flex items-center gap-2 bg-pink-600 text-white px-6 py-3 rounded-lg hover:bg-pink-700 transition-colors shadow-md hover:shadow-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Buat Portfolio Pertama
                </a>
            </div>
        </div>
    @endif
@endsection
