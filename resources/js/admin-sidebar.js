/**
 * Admin Sidebar Management
 * Handles mobile sidebar toggle, overlay, and profile dropdown
 */

(function() {
    'use strict';

    const MOBILE_BREAKPOINT = 768;
    
    // DOM Elements
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const sidebarClose = document.getElementById('sidebar-close');
    const profileDropdownToggle = document.getElementById('profile-dropdown-toggle');
    const profileDropdownMenu = document.getElementById('profile-dropdown-menu');
    const dropdownArrow = document.getElementById('dropdown-arrow');

    /**
     * Open sidebar on mobile
     */
    function openSidebar() {
        if (!sidebar || !sidebarOverlay) return;
        
        sidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
        document.body.classList.add('sidebar-open');
    }

    /**
     * Close sidebar on mobile
     */
    function closeSidebar() {
        if (!sidebar || !sidebarOverlay) return;
        
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        document.body.classList.remove('sidebar-open');
    }

    /**
     * Toggle profile dropdown
     */
    function toggleProfileDropdown() {
        if (!profileDropdownMenu || !dropdownArrow || !profileDropdownToggle) return;
        
        const isHidden = profileDropdownMenu.classList.contains('hidden');
        
        if (isHidden) {
            profileDropdownMenu.classList.remove('hidden');
            profileDropdownMenu.classList.add('animate-fadeIn');
            dropdownArrow.classList.add('rotate-180');
            profileDropdownToggle.setAttribute('aria-expanded', 'true');
        } else {
            profileDropdownMenu.classList.add('hidden');
            profileDropdownMenu.classList.remove('animate-fadeIn');
            dropdownArrow.classList.remove('rotate-180');
            profileDropdownToggle.setAttribute('aria-expanded', 'false');
        }
    }

    /**
     * Close profile dropdown
     */
    function closeProfileDropdown() {
        if (!profileDropdownMenu || !dropdownArrow || !profileDropdownToggle) return;
        
        profileDropdownMenu.classList.add('hidden');
        profileDropdownMenu.classList.remove('animate-fadeIn');
        dropdownArrow.classList.remove('rotate-180');
        profileDropdownToggle.setAttribute('aria-expanded', 'false');
    }

    /**
     * Handle window resize
     */
    function handleResize() {
        if (window.innerWidth >= MOBILE_BREAKPOINT) {
            // Desktop: Always show sidebar
            if (sidebar) {
                sidebar.classList.remove('-translate-x-full');
            }
            if (sidebarOverlay) {
                sidebarOverlay.classList.add('hidden');
            }
            document.body.classList.remove('sidebar-open');
        } else {
            // Mobile: Close sidebar if open
            if (sidebar && !sidebar.classList.contains('-translate-x-full')) {
                closeSidebar();
            }
        }
    }

    /**
     * Check if click is outside sidebar
     */
    function isClickOutsideSidebar(target) {
        return sidebar && 
               !sidebar.contains(target) && 
               !mobileMenuToggle?.contains(target) &&
               !sidebarClose?.contains(target);
    }

    /**
     * Check if click is outside profile dropdown
     */
    function isClickOutsideProfileDropdown(target) {
        return profileDropdownToggle && 
               profileDropdownMenu &&
               !profileDropdownToggle.contains(target) && 
               !profileDropdownMenu.contains(target);
    }

    /**
     * Initialize event listeners
     */
    function init() {
        // Mobile menu toggle
        mobileMenuToggle?.addEventListener('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
            openSidebar();
        });

        // Sidebar close button
        sidebarClose?.addEventListener('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
            closeSidebar();
        });

        // Overlay click to close
        sidebarOverlay?.addEventListener('click', function() {
            closeSidebar();
        });

        // Click outside to close sidebar (mobile only)
        document.addEventListener('click', function(e) {
            if (window.innerWidth < MOBILE_BREAKPOINT) {
                if (isClickOutsideSidebar(e.target)) {
                    if (sidebar && !sidebar.classList.contains('-translate-x-full')) {
                        closeSidebar();
                    }
                }
            }
        });

        // Profile dropdown toggle
        profileDropdownToggle?.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleProfileDropdown();
        });

        // Click outside to close profile dropdown
        document.addEventListener('click', function(e) {
            if (isClickOutsideProfileDropdown(e.target)) {
                closeProfileDropdown();
            }
        });

        // Window resize handler
        window.addEventListener('resize', handleResize);
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

