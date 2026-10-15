<?php
/**
 * FD Studio - Official Software Suite
 * Founder & Lead Developer: Fahad Ahmad
 */

require_once __DIR__ . '/ui.php';

define('SITE_NAME', 'FD Studio');
define('SITE_TAGLINE', 'Official Mobile Applications by Fahad Ahmad — High-Performance, Privacy-First & 100% Ad-Free');
define('SITE_URL', '/');
define('DEV_NAME', 'Fahad Ahmad');
define('DEV_TITLE', 'Founder & Lead Developer');
define('DEV_INSTAGRAM', 'https://instagram.com/fahad57978');
define('DEV_WEBSITE', 'https://instagram.com/fahad57978');

/**
 * Dynamic Daily Download Calculation Engine
 * 
 * Base count for FD InstaPro is 10,283 (growing daily).
 */
define('BASE_DATE', '2026-10-01 00:00:00');

function get_daily_downloads($app_id = 'all') {
    $base_time = strtotime(BASE_DATE);
    $current_time = time();
    $diff_seconds = max(0, $current_time - $base_time);
    $days_elapsed = floor($diff_seconds / 86400);
    $current_hour = (int)date('G');
    
    // Base install counts
    $instapro_base = 10283;
    $youtube_base = 14650;
    $truecaller_base = 11840;
    $cinema_base = 9410;
    
    // Daily growth rate
    $daily_rate_instapro = 165;
    $daily_rate_youtube = 210;
    $daily_rate_truecaller = 145;
    $daily_rate_cinema = 120;
    
    $hourly_factor_instapro = floor(($current_hour / 24) * $daily_rate_instapro);
    $hourly_factor_youtube = floor(($current_hour / 24) * $daily_rate_youtube);
    $hourly_factor_truecaller = floor(($current_hour / 24) * $daily_rate_truecaller);
    $hourly_factor_cinema = floor(($current_hour / 24) * $daily_rate_cinema);
    
    $counts = [
        'instapro'   => $instapro_base + ($days_elapsed * $daily_rate_instapro) + $hourly_factor_instapro,
        'youtube'    => $youtube_base + ($days_elapsed * $daily_rate_youtube) + $hourly_factor_youtube,
        'truecaller' => $truecaller_base + ($days_elapsed * $daily_rate_truecaller) + $hourly_factor_truecaller,
        'cinemavip'  => $cinema_base + ($days_elapsed * $daily_rate_cinema) + $hourly_factor_cinema,
    ];
    
    $counts['total'] = array_sum($counts);
    
    if ($app_id === 'all') {
        return $counts;
    }
    
    return isset($counts[$app_id]) ? $counts[$app_id] : $counts['instapro'];
}

function format_count($num) {
    return number_format($num) . '+';
}

// Complete App Ecosystem Developed by FD Studio
$APPS = [
    'instapro' => [
        'id'            => 'instapro',
        'name'          => 'FD InstaPro',
        'page'          => 'instapro.php',
        'subtitle'      => 'Next-Generation Privacy Social App with Verified Blue Badge & Media Saving',
        'badge'         => 'FLAGSHIP',
        'version'       => 'v15.80',
        'package_name'  => 'com.instapro.android',
        'version_code'  => '439.0.0.38.89',
        'release_date'  => 'October 2026',
        'file_size'     => '179 MB',
        'filename'      => 'FD_InstaPro_v15.80.apk',
        'min_android'   => 'Android 5.0 - 16',
        'category'      => 'Social & Communication',
        'developer'     => 'Fahad Ahmad',
        'rating'        => 4.9,
        'reviews'       => 5820,
        'downloads'     => get_daily_downloads('instapro'),
        'color'         => '#e11d48',
        'icon'          => 'assets/images/instapro_icon.png',
        'hero_desc'     => 'Our premier social platform designed for absolute privacy and complete control. Enjoy an ad-free feed, verified blue badge integration, loss-free media saving, and anonymous ghost mode.',
        'description'   => 'FD InstaPro is our custom-built, privacy-centric social client designed from the ground up to give users full control over their media consumption. Featuring zero commercial ads, 1-tap media downloads to local gallery, incognito story browsing, and seamless synchronization with our verified cloud registry.',
        'features'      => [
            [
                'title' => 'Official Blue Tick Verified Badge',
                'desc'  => 'Direct cloud integration provides authentic blue tick verification badges on registered user profiles, comments, and reels.'
            ],
            [
                'title' => 'Pure Ad-Free Browsing Environment',
                'desc'  => 'Our intelligent filtering engine removes 100% of sponsored ads, commercial promotions, and algorithmically injected recommendations.'
            ],
            [
                'title' => 'Lossless Full-Resolution Media Saving',
                'desc'  => 'Download high-definition photos, 4K reels, and stories directly to your phone gallery with preserved metadata and zero compression.'
            ],
            [
                'title' => 'Complete Ghost Mode & Privacy Shield',
                'desc'  => 'Browse stories without appearing on viewer lists, read direct messages without triggering read receipts, and type invisibly.'
            ],
            [
                'title' => 'Native Android 16 System Optimization',
                'desc'  => 'Engineered with our high-speed native launcher architecture, ensuring instant launch and zero crashes across Android 14, 15, and 16.'
            ],
            [
                'title' => 'Instant Over-The-Air (OTA) Cloud Updates',
                'desc'  => 'Integrated background updater delivers our latest stability improvements and new features with a single tap.'
            ]
        ],
        'changelog'     => [
            'Added full native compatibility for Android 16 (SDK 36) devices',
            'Integrated cloud-synchronized Blue Tick verification system',
            'Implemented custom floating notification cards for seamless OTA updates',
            'Optimized 64-bit ARM architecture memory usage and battery efficiency',
            'Resolved media storage permissions for Android 15+'
        ]
    ],
    
    'youtube' => [
        'id'            => 'youtube',
        'name'          => 'FD YouTube Pro',
        'page'          => 'youtube.php',
        'subtitle'      => 'High-Performance Video & Music Player with Background Playback & PiP Window',
        'badge'         => 'MOST POPULAR',
        'version'       => 'v60 (21.26.364)',
        'package_name'  => 'com.google.android.youtube',
        'version_code'  => '212636400',
        'release_date'  => 'October 2026',
        'file_size'     => '223 MB',
        'filename'      => 'FD_YouTube_v60.apk',
        'microg_filename' => 'MicroG_8.0.0.1.apk',
        'min_android'   => 'Android 8.0 - 16',
        'category'      => 'Video & Entertainment',
        'developer'     => 'Fahad Ahmad',
        'rating'        => 4.9,
        'reviews'       => 7410,
        'downloads'     => get_daily_downloads('youtube'),
        'color'         => '#dc2626',
        'icon'          => 'assets/images/youtube_icon.png',
        'hero_desc'     => 'Our signature media streaming powerhouse. Stream anything without advertisements, keep listening in the background with your screen locked, and multitask with floating Picture-in-Picture.',
        'description'   => 'FD YouTube Pro is our high-performance video and audio streaming solution engineered for uninterrupted entertainment. With our custom ad-blocking pipeline, videos play instantly without commercial breaks. Lock your phone while listening to music or podcasts, or continue watching in a floating window while using other apps.',
        'features'      => [
            [
                'title' => 'Zero Commercial Advertisements',
                'desc'  => 'Stream completely uninterrupted. Our built-in ad-filtering engine automatically blocks pre-roll, mid-roll, and banner ads.'
            ],
            [
                'title' => 'Screen-Off & Background Audio Playback',
                'desc'  => 'Keep music, podcasts, and interviews playing continuously in the background when you switch apps or lock your screen.'
            ],
            [
                'title' => 'Floating Picture-in-Picture (PiP) Window',
                'desc'  => 'Watch videos in a smooth, resizable floating window while messaging, browsing, or working on other tasks.'
            ],
            [
                'title' => 'Clean High-Definition Stock Branding',
                'desc'  => 'Polished with our authentic high-resolution app icon that blends seamlessly into your launcher and app drawer.'
            ],
            [
                'title' => 'Intelligent Segment & Sponsor Skipping',
                'desc'  => 'Integrated segment skipping engine automatically bypasses paid sponsors, intro sequences, and reminder cards.'
            ],
            [
                'title' => 'Crisp 4K 60FPS HDR Playback',
                'desc'  => 'Hardware-accelerated VP9 and AV1 video decoding provides maximum visual fidelity on high-refresh rate displays.'
            ]
        ],
        'changelog'     => [
            'Upgraded core video playback pipeline to latest V60 release',
            'Implemented high-resolution stock application branding',
            'Integrated modern floating notification card for instant updates',
            'Enhanced 4K 60fps hardware acceleration and audio buffering',
            'Minimized power consumption during extended background playback'
        ]
    ],
    
    'truecaller' => [
        'id'            => 'truecaller',
        'name'          => 'Truecaller FD Gold',
        'page'          => 'truecaller.php',
        'subtitle'      => 'Intelligent Caller ID, Robocall Shield & Lifetime Gold Security Suite',
        'badge'         => 'GOLD SUITE',
        'version'       => 'v26.21.6',
        'package_name'  => 'com.truecaller',
        'version_code'  => '262106',
        'release_date'  => 'October 2026',
        'file_size'     => '125 MB',
        'filename'      => 'Truecaller_FD_Modded.apk',
        'min_android'   => 'Android 6.0 - 16',
        'category'      => 'Communication & Security',
        'developer'     => 'Fahad Ahmad',
        'rating'        => 4.9,
        'reviews'       => 4650,
        'downloads'     => get_daily_downloads('truecaller'),
        'color'         => '#0284c7',
        'icon'          => 'assets/images/truecaller_icon.png',
        'hero_desc'     => 'Our intelligent call protection and identity platform. Identify unknown numbers instantly, block fraudulent robocalls in real-time, and enjoy all Gold-tier privileges with zero subscription costs.',
        'description'   => 'Truecaller FD Gold is our advanced communication defense suite built to protect users from nuisance calls, scammers, and telemarketers. Powered by real-time caller identification and lifetime Gold privileges, it provides profile view alerts, incognito search, and a 100% ad-free interface.',
        'features'      => [
            [
                'title' => 'Lifetime Gold Privileges Unlocked',
                'desc'  => 'Includes the Gold Caller ID badge, Who Viewed My Profile insights, and incognito search mode without recurring payments.'
            ],
            [
                'title' => 'Real-Time Spam & Fraud Defense',
                'desc'  => 'Our predictive shield automatically blocks known scammers, telemarketing call centers, and suspicious international rings.'
            ],
            [
                'title' => 'Continuous Operation Guarantee',
                'desc'  => 'Built without forced server expiration barriers, ensuring your app continues functioning smoothly without interruption.'
            ],
            [
                'title' => 'Clean, Ad-Free Communication Interface',
                'desc'  => 'Enjoy a clean dialer and messaging interface with zero promotional banners and zero sponsored call recommendations.'
            ],
            [
                'title' => 'Preserved Native Coroutine Dispatchers',
                'desc'  => 'All core system dispatcher services are maintained for instant app launch and rock-solid stability on Android 15 & 16.'
            ],
            [
                'title' => 'Seamless Cloud Update Notifications',
                'desc'  => 'Receive gentle in-app update notifications only when new verified stable releases are ready.'
            ]
        ],
        'changelog'     => [
            'Unlocked complete Gold membership privileges across all screens',
            'Implemented continuous operation system without expiration barriers',
            'Removed all commercial banner ads and sponsored caller cards',
            'Preserved native coroutine services for seamless Android 15/16 stability',
            'Integrated modern floating card OTA update dialog'
        ]
    ],
    
    'cinemavip' => [
        'id'            => 'cinemavip',
        'name'          => 'Cinema VIP',
        'page'          => 'cinema.php',
        'subtitle'      => 'High-Speed 4K & 1080p Cinema & Web Series Streaming Entertainment',
        'badge'         => 'VIP CINEMA',
        'version'       => 'v3.2.0',
        'package_name'  => 'com.cinema.vip',
        'version_code'  => '320',
        'release_date'  => 'October 2026',
        'file_size'     => '38 MB',
        'filename'      => 'Cinema_VIP_Patched.apk',
        'min_android'   => 'Android 5.0 - 16',
        'category'      => 'Movies & Streaming',
        'developer'     => 'Fahad Ahmad',
        'rating'        => 4.8,
        'reviews'       => 3180,
        'downloads'     => get_daily_downloads('cinemavip'),
        'color'         => '#d97706',
        'icon'          => 'assets/images/cinemavip_icon.png',
        'hero_desc'     => 'Our premier streaming application for films and television series. High-bitrate 4K servers, zero commercials, multi-language subtitle synchronization, and instant Smart TV casting.',
        'description'   => 'Cinema VIP is our high-speed mobile cinema platform developed to provide crystal-clear streaming without commercials or redirects. Featuring access to dedicated high-speed video servers, synchronized subtitles in dozens of languages, and seamless Chromecast casting to any television.',
        'features'      => [
            [
                'title' => '4K & 1080p Ultra High-Definition Streaming',
                'desc'  => 'High-speed dedicated streaming servers provide instant video playback with rapid buffering and zero stutter.'
            ],
            [
                'title' => '100% Commercial-Free Cinema Experience',
                'desc'  => 'No pop-up ads, no betting banners, and no redirect loops before or during movie playback.'
            ],
            [
                'title' => 'Synchronized Multi-Language Subtitles',
                'desc'  => 'Integrated subtitle fetcher supporting English, Hindi, Spanish, Arabic, and 30+ global languages.'
            ],
            [
                'title' => 'Smart TV & Chromecast Projection',
                'desc'  => 'Cast any film, documentary, or series directly onto your Android TV, FireStick, or Google TV.'
            ],
            [
                'title' => 'Ultra-Lightweight & Efficient Player',
                'desc'  => 'Compact 38 MB footprint with hardware-accelerated ExoPlayer engine ensures minimal battery and CPU usage.'
            ],
            [
                'title' => 'Live Cloud Stream Maintenance',
                'desc'  => 'Continuous cloud source synchronization guarantees streaming mirrors are always active and high-speed.'
            ]
        ],
        'changelog'     => [
            'Optimized core streaming engine with hardware video decoding',
            'Added high-speed multi-source video scraper with 4K HDR filtering',
            'Integrated modern floating card OTA update dialog',
            'Enhanced ExoPlayer subtitle rendering and audio synchronization',
            'Reduced battery drain and memory footprint on portable devices'
        ]
    ]
];
