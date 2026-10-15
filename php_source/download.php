<?php
require_once __DIR__ . '/config.php';

$app_id = isset($_GET['app']) ? strtolower(trim($_GET['app'])) : '';
$mode = isset($_GET['mode']) ? trim($_GET['mode']) : '';
$direct = isset($_GET['direct']) ? (int)$_GET['direct'] : 0;

if (!isset($APPS[$app_id])) {
    header("Location: index.php");
    exit;
}

$app = $APPS[$app_id];
$apk_filename = $app['filename'];
if (isset($_GET['dependency'])) {
    if ($_GET['dependency'] !== 'microg' || empty($app['microg_filename'])) {
        http_response_code(404);
        exit('Download not found.');
    }
    $apk_filename = $app['microg_filename'];
    $direct = 1;
}
$apk_path = __DIR__ . '/apps/' . $apk_filename;

// Handle Direct File Stream
if ($direct === 1 || $mode === 'file') {
    if (file_exists($apk_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.android.package-archive');
        header('Content-Disposition: attachment; filename="' . basename($apk_filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($apk_path));
        
        if (ob_get_level()) {
            ob_end_clean();
        }
        flush();
        readfile($apk_path);
        exit;
    } else {
        die("Error: APK package not found at path. Please contact the administrator.");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101c35">
    <title>Downloading <?php echo htmlspecialchars($app['name']); ?> - <?php echo SITE_NAME; ?></title>
    <meta name="description" content="Secure direct download for <?php echo htmlspecialchars($app['name']); ?> <?php echo htmlspecialchars($app['version']); ?>. 100% Ad-free and verified clean.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/studio-3d.css">
    <link rel="icon" type="image/png" href="assets/images/brand/fd-studio-logo.png">
</head>
<body class="download-page">
    <a class="skip-link" href="#main">Skip to content</a>
    <!-- Minimal Header -->
    <header class="site-header">
        <div class="header-inner">
            <?= studio_brand() ?>
            <nav class="nav-menu download-nav" aria-label="Return navigation">
                <a href="index.php" class="nav-link"><?= studio_icon('back') ?> Return to All Apps</a>
            </nav>
            <div class="header-actions">
                <a href="<?php echo DEV_INSTAGRAM; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-sm">
                    Instagram Community
                </a>
            </div>
        </div>
    </header>

    <main id="main" class="container">
        <div class="download-box">
            <div class="download-hero-icon">
                <img src="<?php echo htmlspecialchars($app['icon']); ?>" alt="<?php echo htmlspecialchars($app['name']); ?> Icon">
            </div>

            <span class="tag-badge" style="background: <?php echo $app['color']; ?>15; color: <?php echo $app['color']; ?>; border: 1px solid <?php echo $app['color']; ?>30; margin-bottom: 0.75rem; display: inline-block;">
                <?php echo htmlspecialchars($app['badge']); ?>
            </span>

            <h1 style="font-size: 2rem; margin-bottom: 0.35rem;"><?php echo htmlspecialchars($app['name']); ?></h1>
            <p style="font-size: 1rem; color: var(--text-secondary);"><?php echo htmlspecialchars($app['subtitle']); ?></p>

            <div class="meta-tags-row">
                <span class="badge-tag">Version: <?php echo htmlspecialchars($app['version']); ?></span>
                <span class="badge-tag">File Size: <?php echo htmlspecialchars($app['file_size']); ?></span>
                <span class="badge-tag" style="color: #16a34a; background: #f0fdf4; border-color: #bbf7d0;">VirusTotal 0/72 Clean</span>
                <span class="badge-tag"><span class="pulse-dot"></span> <?php echo format_count($app['downloads']); ?> Installs</span>
            </div>

            <?php require __DIR__ . '/microg_notice.php'; ?>

            <!-- Clean Countdown Box -->
            <div class="timer-card">
                <div class="timer-countdown-num" id="countdown">5</div>
                <div class="timer-instruction" id="timerStatus" role="status" aria-live="polite">Your secure direct download is starting automatically...</div>
                <div class="timer-instruction-sub">Direct high-speed connection established. No shorteners or redirect ads.</div>
            </div>

            <!-- Direct Download Fallback Button -->
            <div style="margin-bottom: 2rem;">
                <a href="download.php?app=<?php echo urlencode($app['id']); ?>&direct=1" id="directDownloadBtn" class="btn btn-primary btn-xl" style="background: <?php echo $app['color']; ?>; border-color: <?php echo $app['color']; ?>; width: 100%; max-width: 380px;">
                    <?= studio_icon('download') ?>
                    Download APK Directly (<?php echo htmlspecialchars($app['file_size']); ?>)
                </a>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.85rem;">
                    If the download does not start within 5 seconds, <a href="download.php?app=<?php echo urlencode($app['id']); ?>&direct=1" style="color: #2563eb; text-decoration: underline;">click here to start manually</a>.
                </p>
            </div>

            <!-- Security Assurance Strip -->
            <div class="detail-columns" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; border-top: 1px solid var(--border-subtle); padding-top: 1.75rem; text-align: left;">
                <div>
                    <strong style="display: block; font-size: 0.88rem; color: #0f172a;">VirusTotal Clean</strong>
                    <span style="font-size: 0.8rem; color: var(--text-muted);">0 / 72 engines flagged</span>
                </div>
                <div>
                    <strong style="display: block; font-size: 0.88rem; color: #0f172a;">Non-Root Required</strong>
                    <span style="font-size: 0.8rem; color: var(--text-muted);">Installs on stock Android</span>
                </div>
                <div>
                    <strong style="display: block; font-size: 0.88rem; color: #0f172a;">Android 16 Ready</strong>
                    <span style="font-size: 0.8rem; color: var(--text-muted);">Tested on Nothing Phone</span>
                </div>
            </div>
        </div>

        <!-- 3-Step Installation Walkthrough -->
        <div style="max-width: 860px; margin: 3rem auto;">
            <h2 class="section-title text-center" style="font-size: 1.75rem; margin-bottom: 2rem;">How to Install this APK on Android</h2>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-idx">01</div>
                    <h3>Download Package</h3>
                    <p>Wait for the browser to finish downloading <code><?php echo htmlspecialchars($app['filename']); ?></code>.</p>
                </div>
                <div class="step-card">
                    <div class="step-idx">02</div>
                    <h3>Allow Unknown Apps</h3>
                    <p>When prompted by Android, tap <strong>Settings</strong> and toggle on <em>"Allow from this source"</em>.</p>
                </div>
                <div class="step-card">
                    <div class="step-idx">03</div>
                    <h3>Install & Launch</h3>
                    <?php if (!empty($app['microg_filename'])): ?>
                    <p>Install <strong>microG</strong> using the download button above, then install and open <strong>FD YouTube Pro</strong>. The app will not open without microG.</p>
                    <?php else: ?>
                    <p>Tap <strong>Install</strong>. Once done, open the app to enjoy 100% ad-free features!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container text-center" style="font-size: 0.88rem; color: var(--text-muted);">
            <p>© <?php echo date('Y'); ?> <strong><?php echo SITE_NAME; ?></strong> by <a href="<?php echo DEV_INSTAGRAM; ?>" target="_blank" rel="noopener noreferrer" style="color: #0f172a; font-weight: 600;"><?php echo DEV_NAME; ?></a>. All rights reserved.</p>
        </div>
    </footer>

    <script>
        let seconds = 5;
        const countdownEl = document.getElementById('countdown');
        const statusEl = document.getElementById('timerStatus');

        const timer = setInterval(() => {
            seconds--;
            if (seconds >= 0) {
                countdownEl.textContent = seconds;
            }
            if (seconds <= 0) {
                clearInterval(timer);
                statusEl.innerHTML = '<span style="color: #16a34a; font-weight: 700;">Download initiated! Please check your browser notifications.</span>';
                window.location.href = "download.php?app=<?php echo urlencode($app['id']); ?>&direct=1";
            }
        }, 1000);
    </script>
</body>
</html>
