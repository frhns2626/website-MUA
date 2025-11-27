@props(['package'])

<div class="package-card flex-shrink-0 w-56 sm:w-64 md:w-72 lg:w-80 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow overflow-hidden flex flex-col">
    <div class="bg-gradient-to-r {{ $package->color_gradient ?? 'from-pink-500 to-pink-700' }} p-3 sm:p-4">
        <h3 class="text-base sm:text-lg md:text-xl font-bold text-white text-center leading-tight">{{ $package->name }}</h3>
    </div>
    <div class="p-3 sm:p-4 md:p-6 flex-1">
        <div class="text-center mb-3 sm:mb-4 pb-3 sm:pb-4 border-b border-gray-200">
            <p class="text-xl sm:text-2xl md:text-lg lg:text-xl xl:text-2xl font-bold text-gray-900 leading-tight break-words px-1">{{ $package->price ?? '-' }}</p>
            <p class="text-xs text-gray-500 mt-1">Harga Paket</p>
        </div>
        @if($package->description)
        <p class="text-xs text-gray-600 mb-2 sm:mb-3 text-center line-clamp-2">{{ $package->description }}</p>
        @endif
        @if($package->features && count($package->features) > 0)
        <div class="space-y-1.5 sm:space-y-2">
            <p class="text-xs font-semibold text-gray-700 mb-1.5 sm:mb-2">Layanan yang termasuk:</p>
            @foreach($package->features as $feature)
            <div class="flex items-start">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-pink-600 mt-0.5 mr-1.5 sm:mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <p class="text-xs text-gray-600 leading-relaxed">{{ $feature }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

