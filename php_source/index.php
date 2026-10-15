<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FD Studio — A better everyday Android experience</title>
    <meta name="description" content="Explore the FD Studio collection of Android applications. Find app features, release notes, and direct APK downloads, all in one place.">
    <meta name="theme-color" content="#101c35">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/studio-3d.css">
    <link rel="icon" type="image/png" href="assets/images/brand/fd-studio-logo.png">
    <noscript><style>.faq-content[hidden], .faq-content { display:block !important; max-height:none; padding:0 0 22px; } .faq-icon-cross, .mobile-toggle { display:none !important; } @media(max-width:900px) { .nav-menu { display:flex; position:static; flex-wrap:wrap; padding:0; box-shadow:none; border:0; gap:12px; } .header-inner { flex-wrap:wrap; } }</style></noscript>
</head>
<body class="studio-home">
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header">
    <div class="header-inner">
        <?= studio_brand() ?>
        <nav class="nav-menu" id="navMenu" aria-label="Main navigation">
            <a href="#apps" class="nav-link">Applications</a>
            <a href="#engineering" class="nav-link">Our approach</a>
            <a href="#about" class="nav-link">The studio</a>
            <a href="#guide" class="nav-link">Install guide</a>
            <a href="#faq" class="nav-link">FAQ</a>
        </nav>
        <div class="header-actions">
            <a href="#apps" class="btn btn-primary btn-sm">Explore apps <?= studio_icon('arrow') ?></a>
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation" aria-controls="navMenu" aria-expanded="false"><span></span><span></span><span></span></button>
        </div>
    </div>
</header>
<main id="main">
    <section class="hero-section">
        <div class="container hero-layout">
            <div class="hero-copy">
                <div class="hero-pill-badge"><span class="status-dot"></span> INDEPENDENT ANDROID STUDIO</div>
                <h1 class="hero-title">Your Android.<br>A better<br><span class="highlight">everyday.</span></h1>
                <p class="hero-subtitle">More control. Fewer distractions. Discover a thoughtful collection of Android apps for the way you connect, watch, and unwind.</p>
                <div class="hero-cta-group">
                    <a href="#apps" class="btn btn-primary btn-xl">Discover the apps <?= studio_icon('arrow') ?></a>
                    <a href="#guide" class="hero-secondary">Installation guide <?= studio_icon('external') ?></a>
                </div>
                <div class="hero-footnote"><?= studio_icon('code') ?><span>Curated & maintained by <strong><?= DEV_NAME ?></strong></span></div>
                <nav class="hero-app-dock" aria-label="Explore an application">
                    <?php foreach ($APPS as $app): ?>
                    <a href="<?= htmlspecialchars($app['page']) ?>" aria-label="Explore <?= htmlspecialchars($app['name']) ?>" title="<?= htmlspecialchars($app['name']) ?>"><img src="<?= htmlspecialchars($app['icon']) ?>" alt="" width="44" height="44"></a>
                    <?php endforeach; ?>
                    <span>Four apps.<br><strong>More possibilities.</strong></span>
                </nav>
            </div>
            <figure class="hero-visual">
                <img src="assets/images/brand/fd-collection-app-icons.png" alt="FD InstaPro, FD YouTube Pro, Truecaller FD Gold and Cinema VIP icons arranged around a sculptural blue glass ribbon" width="1254" height="1254" fetchpriority="high">
                <div class="visual-topline"><span>THE FD COLLECTION</span><span>01 — 04</span></div>
                <figcaption><span class="visual-caption-icon"><?= studio_icon('grid') ?></span><span><strong>Designed around your day.</strong><small>Social. Video. Calls. Cinema.</small></span><span class="visual-arrow"><?= studio_icon('arrow') ?></span></figcaption>
                <span class="concept-label">CONCEPT VISUAL</span>
            </figure>
        </div>
        <div class="container"><div class="studio-facts">
            <div><?= studio_icon('grid') ?><span><strong>04 applications</strong><small>One curated collection</small></span></div>
            <div><?= studio_icon('download') ?><span><strong>Direct APK downloads</strong><small>No link shorteners</small></span></div>
            <div><?= studio_icon('refresh') ?><span><strong>Release notes included</strong><small>Know what’s changed</small></span></div>
            <div><?= studio_icon('phone') ?><span><strong>Made for Android</strong><small>Check each app’s requirements</small></span></div>
        </div></div>
    </section>

    <section class="section-block collection-section" id="apps"><div class="container">
        <div class="section-heading-row"><div><span class="section-eyebrow">THE COLLECTION</span><h2 class="section-title">Find your next essential.</h2><p class="section-desc">Four apps. A little more possibility in every day.</p></div><span class="collection-count">01 — 04 / ANDROID</span></div>
        <div class="apps-grid">
        <?php $summaries = ['instapro' => 'Your social world, on your terms. Save the moments you love and take more control over your privacy.', 'youtube' => 'Keep the soundtrack going. Explore video, background audio, and picture-in-picture playback.', 'truecaller' => 'Bring clarity to every call. Caller identification and spam controls in one familiar interface.', 'cinemavip' => 'Make room for movie night. Discover streaming, subtitles, and big-screen casting.']; $categories = ['instapro'=>'SOCIAL & PRIVACY','youtube'=>'VIDEO & AUDIO','truecaller'=>'CALLS & COMMUNICATION','cinemavip'=>'MOVIES & STREAMING']; ?>
        <?php foreach ($APPS as $app): ?>
            <article class="app-card app-card-<?= htmlspecialchars($app['id']) ?>" style="--app-btn-bg: <?= $app['color'] ?>;">
                <div class="app-card-head app-icon-stage"><span class="app-stage-orbit" aria-hidden="true"></span><div class="app-icon-wrap"><img src="<?= htmlspecialchars($app['icon']) ?>" alt="" class="app-icon-img" width="112" height="112" loading="lazy"></div><span class="tag-badge"><?= htmlspecialchars($app['badge']) ?></span></div>
                <span class="app-category"><?= $categories[$app['id']] ?></span>
                <h3 class="app-name"><?= htmlspecialchars($app['name']) ?></h3>
                <p class="app-tagline"><?= $summaries[$app['id']] ?></p>
                <div class="app-meta-strip"><span><?= studio_icon('refresh') ?> <?= htmlspecialchars($app['version']) ?></span><span><?= studio_icon('download') ?> <?= htmlspecialchars($app['file_size']) ?></span><span>APK</span></div>
                <div class="app-card-buttons"><a href="<?= $app['page'] ?>" class="btn btn-primary">Explore app <?= studio_icon('arrow') ?></a><a href="download.php?app=<?= urlencode($app['id']) ?>&mode=landing" class="btn btn-outline" aria-label="Download <?= htmlspecialchars($app['name']) ?>"><?= studio_icon('download') ?> Download</a></div>
            </article>
        <?php endforeach; ?>
        </div>
    </div></section>

    <section class="section-block approach-section" id="engineering"><div class="container">
        <div class="section-heading-row"><div><span class="section-eyebrow">A MORE CONSIDERED EXPERIENCE</span><h2 class="section-title">Less friction.<br>More of what matters.</h2></div><p class="section-desc">Small details make a difference. Our collection puts everyday usefulness and a simpler experience first.</p></div>
        <div class="features-pillars-grid">
        <?php foreach ([['shield','More control','Explore privacy settings and controls that help you make the experience your own.'],['play','Fewer distractions','A collection focused on your content, from the morning playlist to your evening watchlist.'],['zap','Everyday convenience','Media saving, background playback, and useful tools that fit into your routine.'],['refresh','Clear release details','See app versions, requirements, and changelogs before you choose a download.']] as $pillar): ?>
            <article class="pillar-card"><div class="pillar-icon-box"><?= studio_icon($pillar[0]) ?></div><h3><?= $pillar[1] ?></h3><p><?= $pillar[2] ?></p></article>
        <?php endforeach; ?>
        </div>
    </div></section>

    <section class="section-block" id="about"><div class="container"><div class="studio-story">
        <div class="studio-brand-panel studio-sculpture-panel"><img src="assets/images/brand/fd-studio-sculpture.jpg" alt="Sculptural silver FD monogram on a navy podium with a blue glass orbit" width="1254" height="1254" loading="lazy"><div class="studio-panel-copy"><span>INDEPENDENT BY DESIGN.</span><p>Thoughtful software.<br>Personal attention.</p><span class="studio-panel-bottom">FD STUDIO <span>MADE WITH INTENTION</span></span></div></div>
        <div class="story-copy"><span class="section-eyebrow">MEET THE STUDIO</span><h2 class="section-title">A personal project.<br>A better experience.</h2><p>FD Studio is an independent Android software collection maintained by <strong><?= DEV_NAME ?></strong>.</p><p>The idea is simple: bring useful enhancements together, make releases easy to find, and give every app a clear home with features, requirements, and installation help.</p><a href="<?= DEV_INSTAGRAM ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline"><?= studio_icon('instagram') ?> Connect with Fahad <?= studio_icon('external') ?></a></div>
    </div></div></section>

    <section class="section-block guide-section" id="guide"><div class="container"><div class="section-header"><span class="section-eyebrow">FROM DOWNLOAD TO DAILY USE</span><h2 class="section-title">Ready in a few simple steps.</h2><p class="section-desc">Check your app’s Android requirements, then follow along.</p></div>
        <div class="steps-grid">
        <?php foreach ([['01','download','Choose your app','Open an app page, review the version and requirements, and download its APK package.'],['02','settings','Allow this source','Open the downloaded file. If prompted, allow installation from your browser in Android settings.'],['03','check','Install & make it yours','Follow the Android installation prompts, open the app, and review its permissions and settings.']] as $step): ?>
            <article class="step-card"><div class="step-top"><span class="step-idx"><?= $step[0] ?></span><?= studio_icon($step[1]) ?></div><h3><?= $step[2] ?></h3><p><?= $step[3] ?></p></article>
        <?php endforeach; ?>
        </div>
        <div class="download-note" id="security"><?= studio_icon('shield') ?><p><strong>A little care before you install.</strong> Download from a source you trust, review the permissions, and scan the APK if you need an independent check.</p><a href="https://www.virustotal.com/" target="_blank" rel="noopener noreferrer">Open VirusTotal <?= studio_icon('external') ?></a></div>
    </div></section>

    <section class="section-block" id="faq"><div class="container faq-layout"><div><span class="section-eyebrow">GOOD TO KNOW</span><h2 class="section-title">A few common<br>questions.</h2><p class="section-desc">A little clarity before you get started.</p><a class="text-link" href="<?= DEV_INSTAGRAM ?>" target="_blank" rel="noopener noreferrer">Get in touch <?= studio_icon('arrow') ?></a></div><div class="faq-wrap">
    <?php foreach ([['Are these apps free to download?','The APK packages in this collection are available to download without a fee. Review each app page for its included features.'],['Which Android versions are supported?','Compatibility varies by app. Open the application page and check the minimum Android version before downloading.'],['Do I need to root my phone?','These packages are intended to install without root access. Android may ask you to allow installation from your browser.'],['Where can I find updates?','Each app page lists the current release and changelog. Visit the collection to check for a newer package.']] as $i => $faq): ?>
        <div class="faq-row"><button class="faq-question-btn" aria-expanded="false" aria-controls="answer-<?= $i ?>"><span><?= $faq[0] ?></span><span class="faq-icon-cross"><?= studio_icon('plus') ?></span></button><div class="faq-content" id="answer-<?= $i ?>" hidden><p><?= $faq[1] ?></p></div></div>
    <?php endforeach; ?>
    </div></div></section>
    <section class="container closing-section"><div class="closing-banner"><div><span class="section-eyebrow">YOUR NEXT EVERYDAY ESSENTIAL</span><h2>Make your Android feel more like you.</h2></div><a href="#apps" class="btn btn-light">Explore the collection <?= studio_icon('arrow') ?></a></div></section>
</main>
<footer class="site-footer"><div class="container"><div class="footer-grid"><div class="footer-brand"><?= studio_brand() ?><p>Thoughtfully curated Android experiences.<br>Independently maintained by <?= DEV_NAME ?>.</p></div><div class="footer-col"><h4>Applications</h4><ul><?php foreach ($APPS as $app): ?><li><a href="<?= $app['page'] ?>"><?= htmlspecialchars($app['name']) ?></a></li><?php endforeach; ?></ul></div><div class="footer-col"><h4>The studio</h4><ul><li><a href="#about">About FD Studio</a></li><li><a href="#guide">Installation guide</a></li><li><a href="#faq">Help & questions</a></li><li><a href="<?= DEV_INSTAGRAM ?>" target="_blank" rel="noopener noreferrer">Instagram <?= studio_icon('external') ?></a></li></ul></div></div><div class="footer-bottom-bar"><p>© <?= date('Y') ?> FD Studio. All rights reserved.</p><p>Fahad</p></div></div></footer>
<script src="assets/js/main.js"></script>
</body>
</html>
