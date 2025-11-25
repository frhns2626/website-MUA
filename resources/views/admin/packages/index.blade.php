@extends('admin.layouts.app')

@section('title', 'Manajemen Paket')

@section('content')
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-4 sm:mb-6 md:mb-8">
        <div class="flex-1 min-w-0">
            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-1">Manajemen Paket</h1>
            <p class="text-xs sm:text-sm text-gray-600">Kelola paket layanan makeup Anda</p>
        </div>
        <a href="{{ route('admin.packages.create') }}" 
           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-purple-600 text-white px-4 py-2.5 md:px-6 md:py-3 rounded-lg hover:bg-purple-700 transition-colors shadow-md hover:shadow-lg text-sm md:text-base font-medium whitespace-nowrap">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span class="hidden sm:inline">Tambah Paket Baru</span>
            <span class="sm:hidden">Tambah</span>
        </a>
    </div>

    <!-- Packages Grid -->
    @if($packages->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
            @foreach($packages as $package)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <!-- Header with Gradient -->
                    <div class="bg-gradient-to-r {{ $package->color_gradient ?? 'from-purple-500 to-purple-700' }} p-5 md:p-6">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg md:text-xl font-bold text-white">{{ $package->name }}</h3>
                            @if($package->order)
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-white/20 text-white">
                                    #{{ $package->order }}
                                </span>
                            @endif
                        </div>
                        @if($package->price)
                            <p class="text-2xl md:text-3xl font-bold text-white">{{ $package->price }}</p>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-4 md:p-5">
                        @if($package->description)
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $package->description }}</p>
                        @endif

                        @if($package->features && count($package->features) > 0)
                            <div class="mb-4">
                                <p class="text-xs font-semibold text-gray-700 mb-2">Fitur yang termasuk:</p>
                                <ul class="space-y-1.5">
                                    @foreach(array_slice($package->features, 0, 3) as $feature)
                                        <li class="flex items-start text-xs md:text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-purple-600 mt-0.5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                    @if(count($package->features) > 3)
                                        <li class="text-xs text-gray-400">+ {{ count($package->features) - 3 }} fitur lainnya</li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                        <!-- Status Badge -->
                        <div class="mb-4">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $package->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                {{ $package->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>

                        <!-- Actions (Mobile) -->
                        <div class="flex gap-2 sm:hidden">
                            <a href="{{ route('admin.packages.edit', $package) }}" 
                               class="flex-1 text-center px-3 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.packages.destroy', $package) }}" 
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

                        <!-- Actions (Desktop) -->
                        <div class="hidden sm:flex gap-2">
                            <a href="{{ route('admin.packages.edit', $package) }}" 
                               class="flex-1 text-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors text-sm font-medium">
                                Edit
                            </a>
                            <form action="{{ route('admin.packages.destroy', $package) }}" 
                                  method="POST" 
                                  class="flex-1"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium">
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
                <div class="w-24 h-24 mx-auto mb-6 bg-purple-100 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">Belum Ada Paket</h3>
                <p class="text-gray-600 mb-6">Mulai dengan membuat paket layanan pertama Anda untuk menampilkan layanan makeup.</p>
                <a href="{{ route('admin.packages.create') }}" 
                   class="inline-flex items-center gap-2 bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors shadow-md hover:shadow-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Buat Paket Pertama
                </a>
            </div>
        </div>
    @endif
@endsection
