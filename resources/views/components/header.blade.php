@php
    $navLinks = [
        ['route' => 'home', 'label' => 'Home', 'isRoute' => true],
        ['route' => '#about', 'label' => 'About Us', 'isRoute' => false],
        ['route' => '#services', 'label' => 'Services', 'isRoute' => false],
        ['route' => '#gallery', 'label' => 'Gallery', 'isRoute' => false],
        ['route' => '#sewa-kebaya', 'label' => 'Sewa Kebaya', 'isRoute' => false],
        ['route' => '#contact', 'label' => 'Contact Us', 'isRoute' => false, 'isButton' => true],
    ];
@endphp

<header id="main-header" class="bg-white shadow-sm sticky top-0 z-50 transition-transform duration-300 ease-in-out">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" 
                   id="logo-click" 
                   class="text-2xl md:text-3xl font-bold text-pink-600 cursor-pointer" 
                   style="font-family: 'Dancing Script', cursive;">
                    Firliamakeup
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                @foreach($navLinks as $link)
                    @if($link['isButton'] ?? false)
                        <a href="{{ $link['isRoute'] ? route($link['route']) : $link['route'] }}" 
                           class="bg-pink-600 text-white px-6 py-2 rounded-full hover:bg-pink-700 transition-colors font-medium">
                            {{ $link['label'] }}
                        </a>
                    @else
                        <a href="{{ $link['isRoute'] ? route($link['route']) : $link['route'] }}" 
                           class="text-gray-700 hover:text-pink-600 transition-colors font-medium">
                            {{ $link['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" 
                    type="button"
                    class="md:hidden text-gray-700 hover:text-pink-600 transition-colors"
                    aria-label="Toggle mobile menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <nav class="flex flex-col space-y-4">
                @foreach($navLinks as $link)
                    @if($link['isButton'] ?? false)
                        <a href="{{ $link['isRoute'] ? route($link['route']) : $link['route'] }}" 
                           class="bg-pink-600 text-white px-6 py-2 rounded-full hover:bg-pink-700 transition-colors font-medium text-center">
                            {{ $link['label'] }}
                        </a>
                    @else
                        <a href="{{ $link['isRoute'] ? route($link['route']) : $link['route'] }}" 
                           class="text-gray-700 hover:text-pink-600 transition-colors font-medium">
                            {{ $link['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>
        </div>
    </div>
</header>

<!-- Secret Login Modal -->
<div id="secret-login-modal" 
     class="hidden fixed inset-0 backdrop-blur-md bg-white/10 z-50 flex items-center justify-center p-4">
    <div class="bg-white/95 backdrop-blur-lg rounded-lg shadow-2xl max-w-md w-full p-6 md:p-8 border border-white/20">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">🔐 Admin Login</h2>
            <button id="close-secret-modal" 
                    type="button"
                    class="text-gray-500 hover:text-gray-700 transition-colors"
                    aria-label="Close modal">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-4">
                <label for="secret-email" class="block text-gray-700 text-sm font-bold mb-2">
                    Email
                </label>
                <input type="email" 
                       name="email" 
                       id="secret-email" 
                       value="{{ old('email') }}" 
                       required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-pink-500">
            </div>

            <div class="mb-6">
                <label for="secret-password" class="block text-gray-700 text-sm font-bold mb-2">
                    Password
                </label>
                <input type="password" 
                       name="password" 
                       id="secret-password" 
                       required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-pink-500">
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-sm text-gray-700">Remember me</span>
                </label>
            </div>

            <button type="submit" 
                    class="w-full bg-pink-600 text-white font-bold py-2 px-4 rounded hover:bg-pink-700 focus:outline-none focus:shadow-outline transition-colors">
                Login
            </button>
        </form>
        
        <p class="text-xs text-gray-500 text-center mt-4">
            💡 Tips: Tekan <kbd class="px-2 py-1 bg-gray-100 rounded">Ctrl+Shift+L</kbd> untuk quick access
        </p>
    </div>
</div>

<script>
    (function() {
        'use strict';

        // Constants
        const SCROLL_THRESHOLD = 100;
        const LOGO_CLICK_TIMEOUT = 2000;
        const REQUIRED_LOGO_CLICKS = 5;

        // Elements
        const header = document.getElementById('main-header');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const logoClick = document.getElementById('logo-click');
        const secretModal = document.getElementById('secret-login-modal');
        const closeModal = document.getElementById('close-secret-modal');

        // State
        let lastScrollTop = 0;
        let logoClickCount = 0;
        let logoClickTimeout = null;

        // Mobile Menu Toggle
        mobileMenuButton?.addEventListener('click', () => {
            mobileMenu?.classList.toggle('hidden');
        });

        // Secret Login - Logo Click Handler
        logoClick?.addEventListener('click', (e) => {
            e.preventDefault();
            logoClickCount++;
            
            clearTimeout(logoClickTimeout);
            logoClickTimeout = setTimeout(() => {
                logoClickCount = 0;
            }, LOGO_CLICK_TIMEOUT);

            if (logoClickCount >= REQUIRED_LOGO_CLICKS) {
                secretModal?.classList.remove('hidden');
                logoClickCount = 0;
            }
        });

        // Keyboard Shortcuts
        document.addEventListener('keydown', (e) => {
            // Ctrl+Shift+L to open modal
            if (e.ctrlKey && e.shiftKey && e.key === 'L') {
                e.preventDefault();
                secretModal?.classList.remove('hidden');
            }
            
            // ESC to close modal
            if (e.key === 'Escape') {
                secretModal?.classList.add('hidden');
            }
        });

        // Close Modal Handlers
        closeModal?.addEventListener('click', () => {
            secretModal?.classList.add('hidden');
        });

        secretModal?.addEventListener('click', (e) => {
            if (e.target === secretModal) {
                secretModal.classList.add('hidden');
            }
        });

        // Header Hide/Show on Scroll
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > SCROLL_THRESHOLD) {
                if (scrollTop > lastScrollTop) {
                    // Scrolling down - hide header
                    header?.classList.add('-translate-y-full');
                } else {
                    // Scrolling up - show header
                    header?.classList.remove('-translate-y-full');
                }
            } else {
                // Near top - always show header
                header?.classList.remove('-translate-y-full');
            }
            
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });
    })();
</script>
