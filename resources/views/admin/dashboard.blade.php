@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6 md:mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Dashboard</h1>
        <p class="text-sm md:text-base text-gray-600">Selamat datang kembali! Berikut ringkasan aktivitas Anda.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
        <!-- Portfolio Card -->
        <div class="bg-white p-5 md:p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-l-4 border-pink-500">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 bg-pink-100 rounded-lg">
                    <svg class="w-6 h-6 md:w-7 md:h-7 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <a href="{{ route('admin.portfolios.index') }}" class="text-gray-400 hover:text-pink-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <h3 class="text-gray-600 text-xs md:text-sm font-semibold mb-1">Total Portfolio</h3>
            <p class="text-2xl md:text-3xl font-bold text-pink-600 mb-1">{{ $stats['portfolios'] }}</p>
            <p class="text-xs md:text-sm text-gray-500">
                <span class="inline-flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                    {{ $stats['active_portfolios'] }} Aktif
                </span>
            </p>
        </div>

        <!-- Packages Card -->
        <div class="bg-white p-5 md:p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-l-4 border-purple-500">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 md:w-7 md:h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                </div>
                <a href="{{ route('admin.packages.index') }}" class="text-gray-400 hover:text-purple-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <h3 class="text-gray-600 text-xs md:text-sm font-semibold mb-1">Total Paket</h3>
            <p class="text-2xl md:text-3xl font-bold text-purple-600 mb-1">{{ $stats['packages'] }}</p>
            <p class="text-xs md:text-sm text-gray-500">
                <span class="inline-flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                    {{ $stats['active_packages'] }} Aktif
                </span>
            </p>
        </div>

        <!-- Kebaya Card -->
        <div class="bg-white p-5 md:p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border-l-4 border-orange-500">
            <div class="flex items-center justify-between mb-3">
                <div class="p-3 bg-orange-100 rounded-lg">
                    <svg class="w-6 h-6 md:w-7 md:h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                </div>
                <a href="{{ route('admin.kebayas.index') }}" class="text-gray-400 hover:text-orange-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <h3 class="text-gray-600 text-xs md:text-sm font-semibold mb-1">Total Kebaya</h3>
            <p class="text-2xl md:text-3xl font-bold text-orange-600 mb-1">{{ $stats['kebayas'] }}</p>
            <p class="text-xs md:text-sm text-gray-500">
                <span class="inline-flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                    {{ $stats['active_kebayas'] }} Aktif
                </span>
            </p>
        </div>
    </div>

    <!-- Recent Items -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
        <!-- Recent Portfolios -->
        <div class="bg-white p-5 md:p-6 rounded-xl shadow-md">
            <div class="flex items-center justify-between mb-4 md:mb-5">
                <h2 class="text-lg md:text-xl font-bold text-gray-800">Portfolio Terbaru</h2>
                <a href="{{ route('admin.portfolios.index') }}" 
                   class="text-xs md:text-sm text-pink-600 hover:text-pink-700 font-medium transition-colors">
                    Lihat Semua →
                </a>
            </div>
            
            @if($recent_portfolios->count() > 0)
                <div class="space-y-3">
                    @foreach($recent_portfolios as $portfolio)
                        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors border border-gray-100">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm md:text-base font-medium text-gray-800 truncate">
                                    {{ $portfolio->title }}
                                </p>
                                <p class="text-xs text-gray-500 mt-0.5">
                                    {{ $portfolio->created_at->format('d M Y') }}
                                </p>
                            </div>
                            <span class="ml-3 px-2.5 py-1 text-xs font-medium rounded-full {{ $portfolio->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                {{ $portfolio->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-500 text-sm">Belum ada portfolio.</p>
                    <a href="{{ route('admin.portfolios.create') }}" 
                       class="inline-block mt-3 text-sm text-pink-600 hover:text-pink-700 font-medium">
                        Buat Portfolio Pertama →
                    </a>
                </div>
            @endif
        </div>

        <!-- Recent Kebayas -->
        <div class="bg-white p-5 md:p-6 rounded-xl shadow-md">
            <div class="flex items-center justify-between mb-4 md:mb-5">
                <h2 class="text-lg md:text-xl font-bold text-gray-800">Kebaya Terbaru</h2>
                <a href="{{ route('admin.kebayas.index') }}" 
                   class="text-xs md:text-sm text-orange-600 hover:text-orange-700 font-medium transition-colors">
                    Lihat Semua →
                </a>
            </div>
            
            @if($recent_kebayas->count() > 0)
                <div class="space-y-3">
                    @foreach($recent_kebayas as $kebaya)
                        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 transition-colors border border-gray-100">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm md:text-base font-medium text-gray-800 truncate">
                                    {{ $kebaya->title }}
                                </p>
                                <p class="text-xs text-gray-500 mt-0.5">
                                    {{ $kebaya->created_at->format('d M Y') }}
                                </p>
                            </div>
                            <span class="ml-3 px-2.5 py-1 text-xs font-medium rounded-full {{ $kebaya->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                {{ $kebaya->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                    <p class="text-gray-500 text-sm">Belum ada kebaya.</p>
                    <a href="{{ route('admin.kebayas.create') }}" 
                       class="inline-block mt-3 text-sm text-orange-600 hover:text-orange-700 font-medium">
                        Tambah Kebaya Pertama →
                    </a>
                </div>
            @endif
        </div>

    </div>
@endsection
