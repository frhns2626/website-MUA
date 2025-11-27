@props(['category', 'emoji', 'label', 'isActive' => false])

<button 
    data-category="{{ $category }}" 
    class="category-filter px-3 sm:px-5 md:px-7 py-2 sm:py-2.5 md:py-3 rounded-lg sm:rounded-xl text-xs sm:text-sm md:text-base font-semibold transition-all duration-300 {{ $isActive ? 'bg-pink-50 border-2 border-pink-500 text-pink-700 shadow-sm' : 'bg-white border-2 border-gray-200 text-gray-700 hover:border-pink-300 hover:bg-pink-50' }}"
    onclick="filterPackages('{{ $category }}', this)">
    <span class="flex items-center gap-1.5 sm:gap-2">
        <span class="text-base sm:text-lg md:text-xl">{{ $emoji }}</span>
        <span class="whitespace-nowrap">{{ $label }}</span>
    </span>
</button>

