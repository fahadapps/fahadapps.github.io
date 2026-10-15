<?php
require_once __DIR__ . '/config.php';

if (!isset($app_id) || !isset($APPS[$app_id])) {
    header("Location: index.php");
    exit;
}

$app = $APPS[$app_id];
$apk_path = __DIR__ . '/apps/' . $app['filename'];
$filesize = file_exists($apk_path) ? round(filesize($apk_path) / (1024 * 1024), 1) . ' MB' : $app['file_size'];

// App specific FAQ items
$app_faqs = [
    'instapro' => [
        [
            'q' => 'Will my Instagram account get banned or flagged?',
            'a' => 'No. FD InstaPro v15.80 is built directly on the official Instagram v439 base framework. All enhancements operate locally on your device without interfering with Instagram authentication or server policies.'
        ],
        [
            'q' => 'How does the Blue Tick verified badge work?',
            'a' => 'The application connects to a cloud-hosted verified registry. Any registered username immediately receives the authentic Blue Verified Badge rendered authentically across profile pages, comment threads, and reels.'
        ],
        [
            'q' => 'Where are downloaded stories and reels stored on my phone?',
            'a' => 'All downloaded photos, videos, and stories are saved directly to your phone internal storage under the "Pictures/InstaPro" or "Movies/InstaPro" folder, appearing instantly in your default Gallery app.'
        ],
        [
            'q' => 'How does Ghost Mode work?',
            'a' => 'Ghost Mode intercepts view events locally. When enabled, your username is never transmitted to the story viewer list, direct messages can be read without sending seen receipts, and typing indicators are suppressed.'
        ]
    ],
    'youtube' => [
        [
            'q' => 'Do I need microG to open FD YouTube Pro?',
            'a' => 'Yes. FD YouTube Pro will not open without microG, even if you do not sign into a Google account. Use the Download microG button on this page and install it before opening FD YouTube Pro.'
        ],
        [
            'q' => 'Can I listen to music or podcasts with my screen turned off?',
            'a' => 'Yes! Background playback is active by default. You can switch to any other application or press the power button to lock your screen, and audio will continue playing seamlessly.'
        ],
        [
            'q' => 'How does Picture-in-Picture (PiP) mode activate?',
            'a' => 'While playing any video, simply swipe up to go home or press your device home button. The video will automatically shrink into a smooth, movable floating window on your screen.'
        ],
        [
            'q' => 'Does this version include the official stock YouTube icon?',
            'a' => 'Yes. Unlike other modified builds with odd custom logos, FD YouTube Pro features the authentic high-definition YouTube stock icon for a clean, factory look.'
        ]
    ],
    'truecaller' => [
        [
            'q' => 'Are Truecaller Gold features really unlocked for a lifetime?',
            'a' => 'Yes. The Gold membership tier is unlocked natively within the application framework. You receive the Gold Caller ID badge, Who Viewed My Profile insights, and incognito browsing without any subscription fees.'
        ],
        [
            'q' => 'Will the app stop working with a compulsory "Update Required" popup?',
            'a' => 'No. Truecaller server upgrade checks have been permanently bypassed. Your installed version will continue functioning reliably without sudden expirations.'
        ],
        [
            'q' => 'Does this build contain any 3rd-party Telegram channel popups?',
            'a' => 'None whatsoever. All third-party modder popups and redirection scripts have been completely removed for a pristine, professional experience.'
        ],
        [
            'q' => 'Does Caller ID work on incoming WhatsApp and Telegram calls?',
            'a' => 'Yes, once you grant the standard notification access and overlay permissions requested during initial setup, real-time identification works across regular and internet calls.'
        ]
    ],
    'cinemavip' => [
        [
            'q' => 'Are movies and web series really commercial-free?',
            'a' => 'Yes! There are zero pop-up ads, banner overlays, or countdown redirect links before or during playback. You select a title and stream immediately.'
        ],
        [
            'q' => 'Can I cast streams to my Smart TV or FireStick?',
            'a' => 'Yes. The built-in media player includes native Chromecast and DLNA support. As long as your TV and phone are on the same Wi-Fi network, tap the Cast icon to play on the big screen.'
        ],
        [
            'q' => 'How do I enable subtitles in my preferred language?',
            'a' => 'During video playback, tap the Subtitles (CC) icon in the top right corner. You can choose from dozens of languages including English, Hindi, Spanish, and Arabic with automatic sync.'
        ],
        [
            'q' => 'What video qualities are available?',
            'a' => 'The scraper pulls verified high-bitrate sources ranging from 720p and 1080p up to 4K Ultra HD with HDR audio.'
        ]
    ]
];

$faqs = isset($app_faqs[$app['id']]) ? $app_faqs[$app['id']] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101c35">
    <title><?php echo htmlspecialchars($app['name']); ?> APK Download (Latest <?php echo htmlspecialchars($app['version']); ?>) - <?php echo SITE_NAME; ?></title>
    <meta name="description" content="Download <?php echo htmlspecialchars($app['name']); ?> APK <?php echo htmlspecialchars($app['version']); ?>. <?php echo htmlspecialchars($app['hero_desc']); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/studio-3d.css">
    <link rel="icon" type="image/png" href="assets/images/brand/fd-studio-logo.png">
    <noscript><style>.faq-content[hidden], .faq-content { display:block !important; max-height:none; padding:0 0 22px; } .faq-icon-cross, .mobile-toggle { display:none !important; } @media(max-width:900px) { .nav-menu { display:flex; position:static; flex-wrap:wrap; padding:0; box-shadow:none; border:0; gap:12px; } .header-inner { flex-wrap:wrap; } }</style></noscript>
</head>
<body class="app-page">
    <a class="skip-link" href="#main">Skip to content</a>
    <!-- Clean Minimalist Header -->
    <header class="site-header">
        <div class="header-inner">
            <?= studio_brand() ?>
            
            <nav class="nav-menu" id="navMenu" aria-label="Main navigation">
                <a href="index.php" class="nav-link">Home</a>
                <a href="index.php#apps" class="nav-link">All Applications</a>
                <a href="#features" class="nav-link">Features</a>
                <a href="#specs" class="nav-link">Specifications</a>
                <a href="#installation" class="nav-link">Install Guide</a>
                <a href="#faq" class="nav-link">FAQ</a>
            </nav>

            <div class="header-actions">
                <a href="download.php?app=<?php echo urlencode($app['id']); ?>&mode=landing" class="btn btn-primary btn-sm">
                    Download APK
                </a>
                <button type="button" class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation" aria-controls="navMenu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>

    <main id="main" class="container" style="padding-top: 2rem; padding-bottom: 5rem;">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="Breadcrumb" style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: var(--text-muted); margin-bottom: 1.5rem;">
            <a href="index.php" style="color: var(--text-secondary);">Home</a>
            <span>/</span>
            <a href="index.php#apps" style="color: var(--text-secondary);">Applications</a>
            <span>/</span>
            <span aria-current="page" style="color: #0f172a; font-weight: 600;"><?php echo htmlspecialchars($app['name']); ?></span>
        </nav>

        <!-- App Hero Showcase Box -->
        <section class="app-detail-head">
            <div class="app-detail-left">
                <div class="app-icon-wrap" style="width: 88px; height: 88px; border-radius: 18px;">
                    <img src="<?php echo htmlspecialchars($app['icon']); ?>" alt="<?php echo htmlspecialchars($app['name']); ?> Icon" class="app-icon-img" style="border-radius: 12px;">
                    <span class="app-verified-badge" title="Verified Safe"><?= studio_icon('check') ?></span>
                </div>
                <div>
                    <span class="tag-badge" style="background: <?php echo $app['color']; ?>15; color: <?php echo $app['color']; ?>; border: 1px solid <?php echo $app['color']; ?>30; margin-bottom: 0.4rem; display: inline-block;">
                        <?php echo htmlspecialchars($app['badge']); ?>
                    </span>
                    <h1 style="font-size: 2.25rem; margin-bottom: 0.25rem;"><?php echo htmlspecialchars($app['name']); ?></h1>
                    <p style="font-size: 1.05rem; color: var(--text-secondary); max-width: 620px;"><?php echo htmlspecialchars($app['subtitle']); ?></p>
                    
                    <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 0.75rem; margin-top: 0.75rem; font-size: 0.9rem;">
                        <span style="color: #d97706; font-weight: 700;"><?= studio_icon('star') ?> <?php echo $app['rating']; ?> / 5.0</span>
                        <span style="color: var(--text-muted);">(<?php echo number_format($app['reviews']); ?> verified reviews)</span>
                        <span style="color: var(--border-strong);">•</span>
                        <span class="tag-downloads"><span class="pulse-dot"></span> <?php echo format_count($app['downloads']); ?> active installs</span>
                    </div>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 0.65rem; min-width: 250px;">
                <a href="download.php?app=<?php echo urlencode($app['id']); ?>&mode=landing" class="btn btn-app-accent btn-xl" style="--app-btn-bg: <?php echo $app['color']; ?>; box-shadow: 0 4px 14px <?php echo $app['color']; ?>35;">
                    <?= studio_icon('download') ?>
                    Download APK (<?php echo $filesize; ?>)
                </a>
                <a href="download.php?app=<?php echo urlencode($app['id']); ?>&direct=1" class="btn btn-outline btn-md text-center">
                    Direct Instant Link
                </a>
                <?php if (!empty($app['microg_filename'])): ?>
                <a href="download.php?app=<?php echo urlencode($app['id']); ?>&amp;dependency=microg&amp;direct=1" class="btn btn-app-accent btn-xl" style="--app-btn-bg: <?php echo $app['color']; ?>;" download="<?php echo htmlspecialchars($app['microg_filename']); ?>">
                    <?= studio_icon('download') ?>
                    Download microG
                </a>
                <p style="font-size: 0.8rem; color: #92400e; font-weight: 600; text-align: center;">Required before opening FD YouTube Pro</p>
                <?php endif; ?>
                <p style="font-size: 0.8rem; color: #16a34a; font-weight: 600; text-align: center; margin-top: 0.2rem;">
                    <?= studio_icon('check') ?> 100% VirusTotal Clean & Verified
                </p>
            </div>
        </section>

        <?php require __DIR__ . '/microg_notice.php'; ?>

        <!-- Technical Specs Strip -->
        <section id="specs">
            <div class="specs-grid">
                <div class="spec-tile">
                    <span class="spec-tile-label">Version</span>
                    <span class="spec-tile-val"><?php echo htmlspecialchars($app['version']); ?></span>
                </div>
                <div class="spec-tile">
                    <span class="spec-tile-label">File Size</span>
                    <span class="spec-tile-val"><?php echo $filesize; ?></span>
                </div>
                <div class="spec-tile">
                    <span class="spec-tile-label">Android compatibility</span>
                    <span class="spec-tile-val"><?php echo htmlspecialchars($app['min_android']); ?></span>
                </div>
                <div class="spec-tile">
                    <span class="spec-tile-label">Root Status</span>
                    <span class="spec-tile-val" style="color: #16a34a;">Not Required</span>
                </div>
                <div class="spec-tile">
                    <span class="spec-tile-label">Category</span>
                    <span class="spec-tile-val"><?php echo htmlspecialchars($app['category']); ?></span>
                </div>
                <div class="spec-tile">
                    <span class="spec-tile-label">Package Name</span>
                    <span class="spec-tile-val" style="font-size: 0.85rem; font-family: var(--font-mono);"><?php echo htmlspecialchars($app['package_name']); ?></span>
                </div>
            </div>
        </section>

        <!-- App Overview & Description -->
        <section class="app-overview" style="background: #ffffff; border: 1px solid var(--border-subtle); border-radius: var(--radius-lg); padding: 2.5rem; margin-bottom: 3rem; box-shadow: var(--shadow-subtle);">
            <h2 style="font-size: 1.5rem; margin-bottom: 0.85rem;">About <?php echo htmlspecialchars($app['name']); ?></h2>
            <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: 1.5rem;">
                <?php echo htmlspecialchars($app['description']); ?>
            </p>
            <div class="detail-columns" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; border-top: 1px solid var(--border-subtle); padding-top: 1.5rem;">
                <div>
                    <h4 style="font-size: 0.95rem; margin-bottom: 0.35rem; color: #0f172a;">Clean Code Architecture</h4>
                    <p style="font-size: 0.85rem; color: var(--text-secondary);">Direct client enhancements without ad wrappers or tracking components.</p>
                </div>
                <div>
                    <h4 style="font-size: 0.95rem; margin-bottom: 0.35rem; color: #0f172a;">Battery & RAM Optimized</h4>
                    <p style="font-size: 0.85rem; color: var(--text-secondary);">Smooth 64-bit performance tailored for modern ARM processors.</p>
                </div>
                <div>
                    <h4 style="font-size: 0.95rem; margin-bottom: 0.35rem; color: #0f172a;">Over-the-Air Notifications</h4>
                    <p style="font-size: 0.85rem; color: var(--text-secondary);">Gentle floating update notifications when new verified builds release.</p>
                </div>
            </div>
        </section>

        <!-- Comprehensive Features Breakdown Grid -->
        <section id="features" style="margin-bottom: 3.5rem;">
            <div class="section-header" style="text-align: left; margin-bottom: 2rem;">
                <span class="section-eyebrow">Highlights</span>
                <h2 class="section-title" style="font-size: 1.85rem;">Key Unlocked Capabilities</h2>
                <p class="section-desc" style="margin: 0;">Everything included in this official release.</p>
            </div>

            <div class="features-detailed-grid">
                <?php foreach ($app['features'] as $f): ?>
                <div class="feature-detailed-card" style="border-top: 3px solid <?php echo $app['color']; ?>;">
                    <div style="font-weight: 700; color: #16a34a; font-size: 0.8rem; margin-bottom: 0.4rem;"><?= studio_icon('check') ?> VERIFIED FEATURE</div>
                    <h3 style="font-size: 1.15rem;"><?php echo htmlspecialchars($f['title']); ?></h3>
                    <p style="font-size: 0.9rem; line-height: 1.6;"><?php echo htmlspecialchars($f['desc']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Changelog Section -->
        <section style="margin-bottom: 3.5rem;">
            <div class="changelog-box">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <h3 style="font-size: 1.3rem;">Release Notes for Version <?php echo htmlspecialchars($app['version']); ?></h3>
                    <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 500;">Published: <?php echo htmlspecialchars($app['release_date']); ?></span>
                </div>
                <p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 1.5rem;">Official updates and optimizations implemented by <?php echo DEV_NAME; ?>.</p>
                
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 0.85rem;">
                    <?php foreach ($app['changelog'] as $log): ?>
                    <li style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.92rem; color: var(--text-secondary);">
                        <span style="background: #ecfdf5; color: #047857; font-weight: 700; font-size: 0.72rem; padding: 3px 8px; border-radius: 4px; border: 1px solid #a7f3d0;">ENHANCED</span>
                        <span><?php echo htmlspecialchars($log); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <!-- Installation Walkthrough -->
        <section id="installation" style="margin-bottom: 3.5rem;">
            <div class="section-header" style="text-align: left; margin-bottom: 2rem;">
                <span class="section-eyebrow">Quick Setup</span>
                <h2 class="section-title" style="font-size: 1.85rem;">How to Install <?php echo htmlspecialchars($app['name']); ?></h2>
                <p class="section-desc" style="margin: 0;">Installation steps for <?php echo htmlspecialchars($app['min_android']); ?>.</p>
            </div>

            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-idx">01</div>
                    <h3>Download Package</h3>
                    <p>Click the <strong>Download APK</strong> button. Your browser will download <code><?php echo htmlspecialchars($app['filename']); ?></code> directly to your device.</p>
                </div>
                <div class="step-card">
                    <div class="step-idx">02</div>
                    <h3>Grant Unknown Sources</h3>
                    <p>When opening the file, if Android prompts you with a security notice, tap <strong>Settings</strong> and enable <em>"Allow from this source"</em>.</p>
                </div>
                <div class="step-card">
                    <div class="step-idx">03</div>
                    <h3>Install & Launch</h3>
                    <?php if (!empty($app['microg_filename'])): ?>
                    <p>Install <strong>microG</strong> using the download button above, then install and open <strong>FD YouTube Pro</strong>. The app will not open without microG.</p>
                    <?php else: ?>
                    <p>Tap <strong>Install</strong>. Once completed, tap <strong>Open</strong> to start using your enhanced application immediately!</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <?php if (!empty($faqs)): ?>
        <section id="faq" style="margin-bottom: 3.5rem;">
            <div class="section-header" style="text-align: left; margin-bottom: 2rem;">
                <span class="section-eyebrow">Assistance</span>
                <h2 class="section-title" style="font-size: 1.85rem;">Frequently Asked Questions</h2>
                <p class="section-desc" style="margin: 0;">Specific questions and helpful details for <?php echo htmlspecialchars($app['name']); ?>.</p>
            </div>

            <div class="faq-wrap">
                <?php foreach ($faqs as $faq): ?>
                <div class="faq-row">
                    <button type="button" class="faq-question-btn">
                        <span><?php echo htmlspecialchars($faq['q']); ?></span>
                        <span class="faq-icon-cross"><?= studio_icon('plus') ?></span>
                    </button>
                    <div class="faq-content">
                        <p><?php echo htmlspecialchars($faq['a']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- Bottom Download Action Banner -->
        <section class="detail-cta" style="background: #ffffff; border: 1px solid var(--border-subtle); border-left: 6px solid <?php echo $app['color']; ?>; border-radius: var(--radius-lg); padding: 3rem; display: flex; align-items: center; justify-content: space-between; gap: 2rem; box-shadow: var(--shadow-card);">
            <div>
                <h2 style="font-size: 1.85rem; margin-bottom: 0.5rem;">Ready to upgrade your experience?</h2>
                <p style="font-size: 1.05rem; color: var(--text-secondary);">
                    Join over <strong><?php echo format_count($app['downloads']); ?></strong> satisfied Android users enjoying <?php echo htmlspecialchars($app['name']); ?>.
                </p>
            </div>
            <div>
                <a href="download.php?app=<?php echo urlencode($app['id']); ?>&mode=landing" class="btn btn-app-accent btn-xl" style="--app-btn-bg: <?php echo $app['color']; ?>; box-shadow: 0 4px 14px <?php echo $app['color']; ?>35;">
                    Download <?php echo htmlspecialchars($app['name']); ?> (<?php echo $filesize; ?>)
                </a>
            </div>
        </section>
    </main>

    <!-- Clean Human Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <?= studio_brand() ?>
                    <p>Curated and enhanced Android software applications maintained by <strong><?php echo DEV_NAME; ?></strong>. Committed to providing clean, ad-free mobile experiences.</p>
                </div>

                <div class="footer-col">
                    <h4>All Applications</h4>
                    <ul>
                        <li><a href="instapro.php">FD InstaPro (v15.80)</a></li>
                        <li><a href="youtube.php">FD YouTube Pro (v60)</a></li>
                        <li><a href="truecaller.php">Truecaller FD Gold</a></li>
                        <li><a href="cinema.php">Cinema VIP (v3.2.0)</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Connect</h4>
                    <ul>
                        <li><a href="<?php echo DEV_INSTAGRAM; ?>" target="_blank" rel="noopener noreferrer">Instagram (@fahad57978)</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom-bar">
                <p>© <?php echo date('Y'); ?> <strong>FD Studio</strong>. All builds provided for educational and research use.</p>
                <p>Maintained by <a href="<?php echo DEV_INSTAGRAM; ?>" target="_blank" rel="noopener noreferrer" style="color: #0f172a; font-weight: 600;"><?php echo DEV_NAME; ?></a></p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
