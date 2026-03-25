/**
 * Dashboard Layout JavaScript
 * Handles interactive elements for the dashboard
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize dashboard components
    initSidebar();
    initUserMenu();
    initAlerts();
});

/**
 * Sidebar Toggle Functionality
 */
function initSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const menuToggle = document.getElementById('menuToggle');

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', toggleSidebar);
    }

    if (menuToggle) {
        menuToggle.addEventListener('click', toggleSidebar);
    }

    /**
     * Toggle sidebar visibility
     */
    function toggleSidebar() {
        if (sidebar) {
            sidebar.classList.toggle('expanded');
            
            // Save state to localStorage
            const isExpanded = sidebar.classList.contains('expanded');
            localStorage.setItem('sidebarExpanded', isExpanded);
        }
    }

    // Restore sidebar state on page load
    const savedState = localStorage.getItem('sidebarExpanded');
    if (savedState === 'true' && sidebar) {
        sidebar.classList.add('expanded');
    }

    // Close sidebar on route change (optional)
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('expanded');
            }
        });
    });
}

/**
 * User Menu Dropdown
 */
function initUserMenu() {
    const userMenuBtn = document.getElementById('userMenuBtn');
    const dropdownMenu = document.getElementById('dropdownMenu');

    if (!userMenuBtn || !dropdownMenu) return;

    /**
     * Toggle dropdown menu
     */
    userMenuBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdownMenu.classList.toggle('active');
    });

    /**
     * Close dropdown when clicking outside
     */
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.user-menu-dropdown')) {
            dropdownMenu.classList.remove('active');
        }
    });

    /**
     * Close dropdown when clicking on an item
     */
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            dropdownMenu.classList.remove('active');
        });
    });
}

/**
 * Alert Notifications
 */
function initAlerts() {
    const alerts = document.querySelectorAll('.alert');

    alerts.forEach(alert => {
        const closeBtn = alert.querySelector('.alert-close');
        
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                closeAlert(alert);
            });
        }

        // Auto-close success alerts after 5 seconds
        if (alert.classList.contains('alert-success')) {
            setTimeout(() => {
                closeAlert(alert);
            }, 5000);
        }
    });

    /**
     * Close alert with animation
     */
    function closeAlert(alert) {
        alert.style.animation = 'slideOut 0.3s ease forwards';
        setTimeout(() => {
            alert.remove();
        }, 300);
    }
}

/**
 * Utility function to close all alerts
 */
window.closeAllAlerts = function() {
    document.querySelectorAll('.alert').forEach(alert => {
        alert.remove();
    });
};

/**
 * Handle responsive sidebar on window resize
 */
window.addEventListener('resize', function() {
    const sidebar = document.querySelector('.sidebar');
    
    if (window.innerWidth > 768) {
        // On larger screens, ensure sidebar is visible
        if (sidebar) {
            sidebar.style.left = '0';
        }
    }
});

/**
 * Search functionality (optional)
 */
function initSearch() {
    const searchInput = document.querySelector('.search-input');
    
    if (!searchInput) return;

    let searchTimeout;
    
    searchInput.addEventListener('input', function(e) {
        clearTimeout(searchTimeout);
        const query = e.target.value;

        if (query.length < 2) return;

        // Debounce search
        searchTimeout = setTimeout(() => {
            // Implement your search logic here
            console.log('Searching for:', query);
        }, 300);
    });
}

/**
 * Keyboard shortcuts
 */
function initKeyboardShortcuts() {
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K for search focus
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.querySelector('.search-input');
            if (searchInput) {
                searchInput.focus();
            }
        }

        // Escape to close dropdown
        if (e.key === 'Escape') {
            const dropdown = document.getElementById('dropdownMenu');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }
    });
}

/**
 * Add animation to page content on load
 */
window.addEventListener('load', function() {
    const pageContent = document.querySelector('.page-content');
    if (pageContent) {
        pageContent.style.animation = 'fadeIn 0.3s ease';
    }
});

/**
 * Handle form submissions with loading state
 */
function handleFormSubmit(formSelector) {
    const forms = document.querySelectorAll(formSelector);

    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
            }
        });
    });
}

// Export functions for global use
window.dashboardUtils = {
    closeAllAlerts: window.closeAllAlerts,
    toggleSidebar: initSidebar,
    handleFormSubmit: handleFormSubmit,
};

// Initialize keyboard shortcuts
initKeyboardShortcuts();

// Initialize search
initSearch();