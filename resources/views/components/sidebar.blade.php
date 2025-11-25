<!-- Sidebar -->
<aside id="sidebar" class="fixed left-0 top-0 z-40 h-screen w-64 bg-gray-800 text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col">
    <!-- Sidebar Header -->
    <div class="p-4 md:p-6 border-b border-gray-700 flex-shrink-0 flex items-center justify-between">
        <div>
            <h1 class="text-xl md:text-2xl font-bold text-pink-400" style="font-family: 'Dancing Script', cursive;">Firliamakeup</h1>
            <p class="text-gray-400 text-xs">Panel Admin</p>
        </div>
        <!-- Close button for mobile -->
        <button id="sidebar-close" class="md:hidden text-gray-400 hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    
    <!-- Navigation -->
    <nav class="mt-4 md:mt-6 flex-1 overflow-y-auto px-2">
        <a href="{{ route('admin.dashboard') }}" class="block px-4 md:px-6 py-2.5 md:py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
            </div>
        </a>
        <a href="{{ route('admin.portfolios.index') }}" class="block px-4 md:px-6 py-2.5 md:py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.portfolios.*') ? 'bg-gray-700' : '' }}">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Portfolio</span>
            </div>
        </a>
        <a href="{{ route('admin.blogs.index') }}" class="block px-4 md:px-6 py-2.5 md:py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.blogs.*') ? 'bg-gray-700' : '' }}">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                <span>Blog Posts</span>
            </div>
        </a>
        <a href="{{ route('admin.packages.index') }}" class="block px-4 md:px-6 py-2.5 md:py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.packages.*') ? 'bg-gray-700' : '' }}">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <span>Packages</span>
            </div>
        </a>
        <a href="{{ route('admin.kebayas.index') }}" class="block px-4 md:px-6 py-2.5 md:py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.kebayas.*') ? 'bg-gray-700' : '' }}">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
                <span>Sewa Kebaya</span>
            </div>
        </a>
    </nav>
</aside>

