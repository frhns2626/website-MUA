@extends('admin.layouts.app')

@section('title', 'Manajemen Blog')

@section('content')
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-4 sm:mb-6 md:mb-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-1">Manajemen Blog</h1>
            <p class="text-xs sm:text-sm text-gray-600">Kelola postingan blog dan artikel Anda</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" 
           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-blue-600 text-white px-4 py-2.5 md:px-6 md:py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg text-sm md:text-base font-medium whitespace-nowrap">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span class="hidden sm:inline">Tambah Postingan Baru</span>
            <span class="sm:hidden">Tambah</span>
        </a>
    </div>

    <!-- Blog Posts Grid -->
    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
            @foreach($posts as $post)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <!-- Image -->
                    <div class="relative aspect-video overflow-hidden bg-gray-100">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                                <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Status Badge -->
                        <div class="absolute top-3 right-3">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $post->is_published ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }}">
                                {{ $post->is_published ? 'Diterbitkan' : 'Draft' }}
                            </span>
                        </div>

                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2">
                            <a href="{{ route('admin.blogs.edit', $post) }}" 
                               class="px-4 py-2 bg-white text-gray-800 rounded-lg hover:bg-blue-600 hover:text-white transition-colors text-sm font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $post) }}" 
                                  method="POST" 
                                  class="inline"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">
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
                        <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                            {{ $post->title }}
                        </h3>
                        @if($post->excerpt)
                            <p class="text-xs md:text-sm text-gray-500 mb-3 line-clamp-2">
                                {{ $post->excerpt }}
                            </p>
                        @endif
                        
                        <div class="flex items-center justify-between text-xs text-gray-400 mb-3">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $post->published_at ? $post->published_at->format('d M Y') : 'Belum diterbitkan' }}
                            </span>
                        </div>
                        
                        <!-- Actions (Mobile) -->
                        <div class="flex gap-2 mt-4 sm:hidden">
                            <a href="{{ route('admin.blogs.edit', $post) }}" 
                               class="flex-1 text-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $post) }}" 
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
                <div class="w-24 h-24 mx-auto mb-6 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">Belum Ada Postingan Blog</h3>
                <p class="text-gray-600 mb-6">Mulai dengan membuat postingan blog pertama Anda untuk berbagi informasi dan tips.</p>
                <a href="{{ route('admin.blogs.create') }}" 
                   class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Buat Postingan Pertama
                </a>
            </div>
        </div>
    @endif
@endsection
