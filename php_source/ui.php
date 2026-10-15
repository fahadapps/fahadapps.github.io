<?php
/** Shared, dependency-free SVG icons and branding. */
function studio_icon($name, $class = '') {
    $paths = [
        'arrow' => '<path d="M5 12h14m-6-6 6 6-6 6"/>',
        'back' => '<path d="M19 12H5m6-6-6 6 6 6"/>',
        'external' => '<path d="M14 3h7v7m0-7L10 14"/><path d="M10 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5"/>',
        'download' => '<path d="M12 3v12m-5-5 5 5 5-5M4 16v4h16v-4"/>',
        'check' => '<path d="m5 12 4 4L19 6"/>',
        'shield' => '<path d="m12 3 8 3v6c0 5-8 9-8 9s-8-4-8-9V6z"/><path d="m8 12 3 3 5-6"/>',
        'phone' => '<rect x="6" y="2" width="12" height="20" rx="3"/><path d="M10 18h4"/>',
        'grid' => '<rect x="3" y="3" width="7" height="7" rx="2"/><rect x="14" y="3" width="7" height="7" rx="2"/><rect x="3" y="14" width="7" height="7" rx="2"/><rect x="14" y="14" width="7" height="7" rx="2"/>',
        'zap' => '<path d="m13 2-9 12h7l-1 8 10-13h-8z"/>',
        'refresh' => '<path d="M20 7v5h-5M4 17v-5h5"/><path d="M6 6a8 8 0 0 1 14 6M4 12a8 8 0 0 0 14 6"/>',
        'lock' => '<rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V6a4 4 0 0 1 8 0v4m-4 5v2"/>',
        'code' => '<path d="m8 5-7 7 7 7m8-14 7 7-7 7m-3-17-2 20"/>',
        'plus' => '<path d="M12 5v14M5 12h14"/>',
        'star' => '<path d="m12 3 3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z"/>',
        'play' => '<path d="m8 4 12 8-12 8z"/>',
        'settings' => '<path d="M4 6h16M4 12h16M4 18h16"/><circle cx="9" cy="6" r="2"/><circle cx="15" cy="12" r="2"/><circle cx="9" cy="18" r="2"/>',
        'instagram' => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/>',
    ];
    return '<svg class="ui-icon ' . htmlspecialchars($class) . '" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . ($paths[$name] ?? $paths['grid']) . '</svg>';
}
function studio_brand() {
    return '<a href="index.php" class="brand" aria-label="FD Studio home"><img src="assets/images/brand/fd-studio-logo.png" class="brand-logo" width="42" height="42" alt=""><span class="brand-text">FD<span class="brand-light"> Studio</span></span></a>';
}
