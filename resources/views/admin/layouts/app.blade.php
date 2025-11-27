<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') - Firliamakeup</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/admin-sidebar.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        @include('admin.components.sidebar')

        <!-- Overlay for mobile -->
        <div id="sidebar-overlay" class="hidden md:hidden fixed inset-0 backdrop-blur-sm bg-white/20 z-30 transition-opacity duration-300"></div>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col md:ml-64 min-h-screen">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-30">
                <div class="px-3 sm:px-4 md:px-6 lg:px-8 py-3 md:py-4">
                    <div class="flex items-center justify-between gap-3">
                        <!-- Mobile: Show menu button -->
                        <div class="flex items-center gap-3 md:hidden">
                            <button id="mobile-menu-toggle" 
                                    type="button"
                                    class="text-gray-700 hover:text-gray-900 transition-colors"
                                    aria-label="Buka menu">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Desktop: Header actions -->
                        <div class="hidden md:flex items-center gap-3 md:gap-4 flex-1 justify-end">
                            @hasSection('header-actions')
                                <div class="flex items-center gap-2">
                                    @yield('header-actions')
                                </div>
                            @endif
                        </div>
                        
                        <!-- Profile Dropdown -->
                        <div class="relative">
                            <button id="profile-dropdown-toggle" 
                                    type="button"
                                    class="flex items-center justify-center gap-2 sm:px-3 sm:py-2 sm:bg-white sm:rounded-lg sm:border sm:border-gray-300 hover:sm:border-gray-400 transition-all cursor-pointer sm:shadow-sm"
                                    aria-label="Menu profil"
                                    aria-expanded="false">
                                <div class="w-10 h-10 sm:w-8 sm:h-8 bg-pink-500 rounded-full flex items-center justify-center flex-shrink-0 border-2 border-white shadow-md">
                                    <svg class="w-6 h-6 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="hidden sm:block text-left">
                                    <p class="text-sm font-semibold text-gray-900 leading-tight">Admin</p>
                                    <p class="text-xs text-gray-600 leading-tight">Firliamakeup</p>
                                </div>
                                <svg id="dropdown-arrow" class="w-4 h-4 text-gray-600 hidden sm:block transition-transform duration-200 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div id="profile-dropdown-menu" class="hidden absolute right-0 mt-2 w-48 sm:w-48 bg-white rounded-lg shadow-xl border border-gray-200 py-1 z-50 overflow-hidden">
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2.5 text-sm hover:bg-gray-50 flex items-center gap-3 transition-colors">
                                        <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        <span class="text-red-600 font-medium">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mobile: Header actions below -->
                    @hasSection('header-actions')
                        <div class="md:hidden mt-3">
                            @yield('header-actions')
                        </div>
                    @endif
                </div>
            </header>

            <!-- Content Area -->
            <div class="flex-1 p-3 sm:p-4 md:p-6 lg:p-8 overflow-y-auto bg-gray-50">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

