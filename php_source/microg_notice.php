<?php if (!empty($app['microg_filename'])): ?>
<aside aria-label="microG installation requirement" style="background: #fffbeb; border: 1px solid #fde68a; border-radius: var(--radius-lg); padding: 1.5rem; margin-bottom: 2rem;">
    <h2 style="font-size: 1.15rem; color: #92400e; margin-bottom: 0.5rem;">Install microG first</h2>
    <p style="color: #78350f; margin-bottom: 1rem;">FD YouTube Pro will not open without microG. Download and install microG before opening the app, even if you do not sign in.</p>
    <a href="download.php?app=<?php echo urlencode($app['id']); ?>&amp;dependency=microg&amp;direct=1" class="btn btn-outline btn-md" download="<?php echo htmlspecialchars($app['microg_filename']); ?>">
        <?= studio_icon('download') ?> Download microG
    </a>
</aside>
<?php endif; ?>
