@extends('layouts.app')

@section('title', 'Firliamakeup - Jasa Makeup Artist Demak')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-pink-50 to-purple-50 py-12 sm:py-16 md:py-20 lg:py-28 xl:py-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto text-center">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-gray-900 mb-5 sm:mb-6 md:mb-8 lg:mb-10 xl:mb-12 leading-tight px-2">
                    Jasa Makeup Artis - MUA<br>Demak
                </h1>
                <p class="text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl text-gray-700 mb-6 sm:mb-8 md:mb-10 lg:mb-12 xl:mb-16 max-w-4xl mx-auto leading-relaxed px-4 sm:px-6">
                    Sedang cari Jasa MUA / Professional Makeup Artis terdekat? Buat kalian yang mencari MUA di Demak bisa konsultasi dan booking layanan Makeup Artis di Firliamakeup.
                </p>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="gallery" class="py-12 md:py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 md:mb-4">Portofolio Firliamakeup</h2>
                <p class="text-sm md:text-base text-gray-600 max-w-2xl mx-auto px-4">
                    Lihat hasil karya makeup profesional kami untuk berbagai acara
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                @forelse($portfolios as $portfolio)
                <div class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow aspect-square">
                    @if($portfolio->image)
                        <img src="{{ asset('storage/' . $portfolio->image) }}" 
                             alt="{{ $portfolio->title }}" 
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                             loading="lazy"
                             onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="w-full h-full bg-gradient-to-br from-pink-200 to-purple-200 flex items-center justify-center hidden">
                            <div class="text-center p-4">
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-gray-500 text-sm block">{{ $portfolio->title }}</span>
                                <span class="text-gray-400 text-xs block mt-1">Image not found</span>
                            </div>
                        </div>
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-pink-200 to-purple-200 flex items-center justify-center">
                            <div class="text-center p-4">
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-gray-500 text-sm block">{{ $portfolio->title }}</span>
                                <span class="text-gray-400 text-xs block mt-1">No Image</span>
                            </div>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-3 px-4">
                        <span class="text-white font-semibold text-center text-sm md:text-base drop-shadow-lg">
                            {{ $portfolio->title }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-lg">Portfolio akan segera ditambahkan.</p>
                    <p class="text-sm text-gray-400 mt-2">Silakan login ke admin panel untuk menambahkan portfolio.</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="#gallery" class="text-pink-600 hover:text-pink-700 font-semibold text-lg">
                    More Portofolio →
                </a>
            </div>
        </div>
    </section>

    @push('styles')
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .packages-scroll {
            -webkit-overflow-scrolling: touch;
            scroll-behavior: smooth;
        }
    </style>
    @endpush

    <!-- Services Section -->
    <section id="services" class="py-8 sm:py-12 md:py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <div class="text-center mb-6 sm:mb-8 md:mb-12 px-2">
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-2 sm:mb-3 md:mb-4">Layanan Kami</h2>
                <p class="text-xs sm:text-sm md:text-base text-gray-600">Pilih Paket Makeup Sesuai Kebutuhan Anda</p>
            </div>
            
            <!-- Category Filters -->
            <div class="flex justify-center gap-2 sm:gap-3 md:gap-4 mb-4 sm:mb-6 md:mb-8 pb-3 sm:pb-4 border-b border-gray-300 px-2">
                <x-category-filter-button category="wisuda" emoji="🎓" label="Paket Wisuda" :isActive="true" />
                <x-category-filter-button category="wedding" emoji="💒" label="Paket Wedding" />
            </div>
            
            <!-- Packages Container -->
            <div class="packages-container">
                <!-- Wisuda Packages -->
                <div id="wisuda-packages" class="package-category active">
                    <div class="flex gap-3 sm:gap-4 md:gap-6 overflow-x-auto pb-4 scrollbar-hide packages-scroll px-2 sm:px-0">
                        @forelse($wisudaPackages as $package)
                            <x-package-card :package="$package" />
                        @empty
                        <div class="flex-shrink-0 w-full bg-white rounded-lg shadow-md p-4 sm:p-6 text-center text-gray-500">
                            <p class="text-sm sm:text-base">Paket wisuda akan segera ditambahkan.</p>
                            <p class="text-xs mt-2">Silakan login ke admin panel untuk menambahkan paket.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                
                <!-- Wedding Packages -->
                <div id="wedding-packages" class="package-category hidden">
                    <div class="flex gap-3 sm:gap-4 md:gap-6 overflow-x-auto pb-4 scrollbar-hide packages-scroll px-2 sm:px-0">
                        @forelse($weddingPackages as $package)
                            <x-package-card :package="$package" />
                        @empty
                        <div class="flex-shrink-0 w-full bg-white rounded-lg shadow-md p-4 sm:p-6 text-center text-gray-500">
                            <p class="text-sm sm:text-base">Paket wedding akan segera ditambahkan.</p>
                            <p class="text-xs mt-2">Silakan login ke admin panel untuk menambahkan paket.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            
            @push('scripts')
            <script>
                function filterPackages(category, button) {
                    // Hide all package categories
                    document.querySelectorAll('.package-category').forEach(el => {
                        el.classList.add('hidden');
                        el.classList.remove('active');
                    });
                    
                    // Show selected category
                    const selectedCategory = document.getElementById(category + '-packages');
                    if (selectedCategory) {
                        selectedCategory.classList.remove('hidden');
                        selectedCategory.classList.add('active');
                    }
                    
                    // Show/hide catatan tambahan based on category
                    const catatanTambahan = document.getElementById('catatan-tambahan');
                    if (catatanTambahan) {
                        catatanTambahan.classList.toggle('hidden', category !== 'wedding');
                    }
                    
                    // Update button states
                    document.querySelectorAll('.category-filter').forEach(btn => {
                        btn.classList.remove('bg-pink-50', 'border-pink-500', 'text-pink-700', 'shadow-sm');
                        btn.classList.add('bg-white', 'border-gray-200', 'text-gray-700');
                    });
                    
                    // Activate clicked button
                    button.classList.add('bg-pink-50', 'border-pink-500', 'text-pink-700', 'shadow-sm');
                    button.classList.remove('bg-white', 'border-gray-200', 'text-gray-700');
                }
                
                // Initialize: Hide catatan tambahan on page load (default is wisuda)
                document.addEventListener('DOMContentLoaded', function() {
                    const catatanTambahan = document.getElementById('catatan-tambahan');
                    if (catatanTambahan) {
                        catatanTambahan.classList.add('hidden');
                    }
                });
            </script>
            @endpush
            
            <!-- Catatan Tambahan Layanan -->
            <div id="catatan-tambahan" class="mt-8 md:mt-12 max-w-4xl mx-auto hidden">
                <div class="bg-white rounded-lg shadow-md p-6 md:p-8 border-l-4 border-pink-500">
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-pink-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Catatan Tambahan
                    </h3>
                    <ul class="space-y-3 md:space-y-4 text-sm md:text-base text-gray-700">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Apabila Ronce Melati naik dikenakan biaya tambahan sesuai kenaikan Ronce Melati</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span><strong>Tambah Henna + Kuku Palsu</strong> <span class="text-pink-600 font-semibold">Rp 350.000</span></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms & Conditions Section -->
    <section id="terms" class="py-12 md:py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-2 md:mb-3 text-center" style="font-family: 'Dancing Script', cursive;">
                    Firliamakeup 2026
                </h2>
                <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 md:mb-6 text-center">PRICELIST TAMBAHAN</h3>
                <p class="text-sm md:text-base text-gray-600 mb-8 md:mb-10 text-center max-w-3xl mx-auto">
                    PL tambahan hanya berlaku untuk paket Premium, Gold dan Luxury
                </p>
                
                <!-- Pricelist Tambahan -->
                <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-lg p-6 md:p-8 lg:p-10 mb-8 md:mb-10 shadow-md">
                    <h4 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6">Layanan Tambahan</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Solo Hijab & Melati</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 600.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Siger Sunda Hijab & Melati</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 400.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Solo / Jogja Paes only</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 750.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Siger Hairdo only</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 500.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Hairdo Pengantin Modern</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 450.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Hairdo Dewasa</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 250.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Busana Sepasang Pengantin</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 800.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Set Kebaya Ibu / Jaga buku</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 150.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Set Beskap / Basofi Bapak</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 150.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Set Baju Pengapit</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 100.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Makeup Anak</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 100.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Makeup Dewasa</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 200.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-sm md:text-base text-gray-700">Pranotocoro</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 600.000</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-sm md:text-base text-gray-700">Cucuk Lampah</span>
                            <span class="text-sm md:text-base font-semibold text-pink-600">Rp 750.000</span>
                        </div>
                    </div>
                </div>

                <!-- Syarat & Ketentuan dan Perhatian -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
                    <!-- Syarat & Ketentuan -->
                    <div class="bg-gray-50 rounded-lg p-6 md:p-8">
                        <h4 class="text-xl md:text-2xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-pink-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Syarat & Ketentuan
                        </h4>
                        <ul class="space-y-3 md:space-y-4 text-sm md:text-base text-gray-700">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Tidak Menerima Request Di Luar Portofolio</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>DP Minimal Satu Juta Rupiah</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Cancel sepihak = DP Hangus 100%</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Pelunasan Max. H+2 Setelah Acara</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Transport Menyesuaikan Lokasi (Grabcar PP)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Wajib Menjaga Busana Dengan Baik</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Bila Terjadi Kerusakan Pada Busana Maka Akan Dikenakan Denda Tergantung Keparahan</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Pergantian Busana Terakhir Max. Jam 2 siang (Lebih Dari Itu Dikenakan Charge Senilai 100.000/Jam)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Jam kerja max. Sampai jam 2 siang. Lebih dari itu terkena charge 100.000/jam</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Busana yg ditinggal harus dikembalikan Max. H+2</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-pink-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Kuota Harga Melati Solo max.500rb (jika harga melati naik maka akan dikenakan charge sesuai kenaikan harga. Krn harga melati bisa naik setiap hari nya)</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Perhatian -->
                    <div class="bg-red-50 border-2 border-red-200 rounded-lg p-6 md:p-8">
                        <h4 class="text-xl md:text-2xl font-bold text-red-900 mb-4 md:mb-6 flex items-center">
                            <svg class="w-6 h-6 md:w-7 md:h-7 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            PERHATIAN
                        </h4>
                        <ul class="space-y-3 md:space-y-4 text-sm md:text-base text-red-800">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-red-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <span><strong>STOP KRIM DOKTER H-1 BULAN</strong> (KONSUL DENGAN DOKTER DULU)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-red-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <span><strong>JANGAN MELAKUKAN FACIAL YANG BEREFEK PEELING H-1 BULAN</strong></span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-red-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <span>TOLONG SEDIAKAN MEJA, KIPAS (jika tidak ber AC) & RUANGAN KHUSUS MAKEUP DAN GANTI BUSANA PENGANTIN</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sewa Kebaya Section -->
    <section id="sewa-kebaya" class="py-12 md:py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 md:mb-12">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 md:mb-4">Sewa Kebaya</h2>
                <p class="text-sm md:text-base text-gray-600 max-w-2xl mx-auto px-4">
                    Tersedia berbagai koleksi kebaya untuk berbagai acara Anda
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                @forelse($kebayas as $kebaya)
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow overflow-hidden group">
                    <div class="relative overflow-hidden aspect-square">
                        @if($kebaya->image)
                            <img src="{{ asset('storage/' . $kebaya->image) }}" 
                                 alt="{{ $kebaya->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-pink-100 to-purple-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-4 md:p-5">
                        <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">{{ $kebaya->title }}</h3>
                        <p class="text-2xl md:text-3xl font-bold text-pink-600 mb-3">{{ $kebaya->price }}</p>
                        <a href="https://wa.me/6285236478565?text=Halo,%20saya%20tertarik%20dengan%20{{ urlencode($kebaya->title) }}" 
                           class="block w-full text-center bg-pink-600 text-white px-4 py-2 rounded-lg text-sm md:text-base font-semibold hover:bg-pink-700 transition-colors">
                            Sewa Sekarang
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <p>Koleksi kebaya akan segera ditambahkan.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-12 md:py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
                    Kontak Firliamakeup Untuk Konsultasi Jadwal & Booking
                </h2>
                <p class="text-base md:text-lg text-gray-600 mb-6 md:mb-8 px-4">
                    Hubungi kontak WA Firliamakeup sekarang untuk konsultasi kebutuhan Makeup dan dapatkan penawaran harga Jasa Makeup Artist terbaru. Segera booking Firliamakeup Demak untuk berbagai acara Anda di tahun 2025, seperti Pre-Wedding, Wedding, Wisuda, Sweet Seventeen dan lainnya.
                </p>
                <a href="https://wa.me/6285236478565" 
                   class="inline-block bg-green-500 text-white px-6 md:px-8 py-3 md:py-4 rounded-full text-base md:text-lg font-semibold hover:bg-green-600 transition-colors shadow-lg hover:shadow-xl">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        0852-3647-8565
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section id="map" class="py-8 md:py-12 lg:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-6 md:mb-8 lg:mb-12">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-2 md:mb-3 lg:mb-4">Lokasi Kami</h2>
                    <p class="text-xs sm:text-sm md:text-base text-gray-600 px-2">Temukan lokasi Firliamakeup di Demak</p>
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg md:shadow-xl">
                    <div class="relative w-full" style="padding-bottom: 56.25%;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31688.123456789!2d110.6333!3d-6.8994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTMnNTcuOCJTIDExMMKwMzgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid" 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full h-full">
                        </iframe>
                    </div>
                </div>
                <div class="mt-4 md:mt-6 lg:mt-8 text-center px-4">
                    <a href="https://www.google.com/maps/search/?api=1&query=Demak,+Jawa+Tengah" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-block w-full sm:w-auto bg-pink-600 text-white px-5 py-2.5 md:px-6 md:py-3 lg:px-8 lg:py-4 rounded-full text-xs sm:text-sm md:text-base font-semibold hover:bg-pink-700 transition-colors shadow-md hover:shadow-lg active:scale-95">
                        <span class="flex items-center justify-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="whitespace-nowrap">Buka di Google Maps</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-12 md:py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-6 md:mb-8 text-center">MUA Demak Terdekat</h2>
                
                <div class="prose prose-sm md:prose-lg max-w-none text-gray-700 space-y-4 md:space-y-6">
                    <p>
                        Pengertian MUA Make Up Artist adalah seniman profesional yang bekerja untuk merias orang terutama kulit wajah. Seseorang dikatakan atau disebut sebagai MUA memiliki kriteria seperti memiliki pengalaman atau telah menjalankan pendidikan khusus di bidang Makeup.
                    </p>
                    <p>
                        Dahulu bila seseorang ingin merias wajah maka harus pergi ke ke Salon, namun seiring perkembangan zaman sekarang seseorang yang ingin merias wajah dapat memanggil Jasa MUA untuk datang ke lokasi yang diinginkan seperti di Demak atau area terdekat.
                    </p>
                    <p>
                        Kemudahan yang diberikan dari layanan tim MUA inilah yang menjadi nilai baru karena dapat memberikan kemudahan, menghemat waktu, transportasi dan praktis tentunya. Seoarang MUA juga dituntut untuk dapat datang tepat waktu dan berfokus memberikan hasil Makeup yang berkualitas.
                    </p>
                    <p>
                        Seorang MUA Demak merupakan jasa panggilan Makeup Artist yang dituntut dapat tepat waktu dan berpindah tempat dalam pekerjaannya di area layanan. MUA Demak Profesional pastinya akan menyediakan berbagai peralatan penunjang saat proses makeup berlangsung.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

