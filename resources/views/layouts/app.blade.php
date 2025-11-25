<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jasa Makeup Artist Demak - MUA Professional untuk Wedding, Prewedding, Wisuda, Sweet Seventeen dan acara lainnya">
    
    <title>@yield('title', 'Firliamakeup - Jasa Makeup Artist Demak')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-white text-gray-900">
    @include('components.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('components.footer')
    
    <!-- Scroll to Top Button -->
    <button id="scroll-to-top" 
            type="button"
            class="scroll-to-top-btn hidden fixed bottom-6 right-6 md:bottom-8 md:right-8 bg-pink-600 text-white p-3 md:p-4 rounded-full shadow-lg hover:bg-pink-700 transition-all duration-300 z-40 opacity-0 translate-y-4 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2"
            aria-label="Scroll to top">
        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>
    
    @stack('scripts')
    
    <!-- Scripts -->
    <script>
        (function() {
            'use strict';

            // Constants
            const FOOTER_THRESHOLD = 200;
            const SCROLL_TOP_THRESHOLD = 100;
            const ANIMATION_DURATION = 300;
            const FOOTER_CLICK_TIMEOUT = 500;
            const REQUIRED_FOOTER_CLICKS = 2;

            // Elements
            const scrollToTopBtn = document.getElementById('scroll-to-top');
            const footerTrigger = document.getElementById('secret-footer-trigger');
            const secretModal = document.getElementById('secret-login-modal');

            // State
            let footerClickCount = 0;
            let footerClickTimeout = null;
            let isButtonVisible = false;

            // Scroll to Top Functionality
            const scrollToTop = () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            };

            const showScrollButton = () => {
                if (!isButtonVisible && scrollToTopBtn) {
                    scrollToTopBtn.classList.remove('hidden', 'opacity-0', 'translate-y-4');
                    scrollToTopBtn.classList.add('opacity-100', 'translate-y-0');
                    isButtonVisible = true;
                }
            };

            const hideScrollButton = () => {
                if (isButtonVisible && scrollToTopBtn) {
                    scrollToTopBtn.classList.add('opacity-0', 'translate-y-4');
                    setTimeout(() => {
                        if (scrollToTopBtn) {
                            scrollToTopBtn.classList.add('hidden');
                            isButtonVisible = false;
                        }
                    }, ANIMATION_DURATION);
                }
            };

            const handleScroll = () => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const windowHeight = window.innerHeight;
                const documentHeight = document.documentElement.scrollHeight;
                const scrollBottom = documentHeight - (scrollTop + windowHeight);

                const isNearFooter = scrollBottom <= FOOTER_THRESHOLD;
                const isScrolledDown = scrollTop > SCROLL_TOP_THRESHOLD;

                if (isNearFooter && isScrolledDown) {
                    showScrollButton();
                } else {
                    hideScrollButton();
                }
            };

            // Event Listeners
            scrollToTopBtn?.addEventListener('click', scrollToTop);
            window.addEventListener('scroll', handleScroll);

            // Secret Footer Trigger
            const handleFooterClick = () => {
                footerClickCount++;
                
                clearTimeout(footerClickTimeout);
                footerClickTimeout = setTimeout(() => {
                    footerClickCount = 0;
                }, FOOTER_CLICK_TIMEOUT);

                if (footerClickCount >= REQUIRED_FOOTER_CLICKS) {
                    secretModal?.classList.remove('hidden');
                    footerClickCount = 0;
                }
            };

            footerTrigger?.addEventListener('click', handleFooterClick);
        })();
    </script>
</body>
</html>
