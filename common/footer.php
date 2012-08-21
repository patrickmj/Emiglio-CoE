        </div><!-- end content -->

        <div id="footer">

            <ul class="navigation">
                <?php //echo public_nav_main(array(__('Home') => uri(''), __('Browse Items') => uri('items'), __('Browse Collections') => uri('collections'))); ?>
            </ul>

            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
                <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = settings('copyright')): ?>
                    <p><?php echo $copyright; ?></p>
                <?php endif; ?>
                <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>'); ?>,
                the <a href='http://www.mla.org/nvs_challenge'>Modern Language Association's New Variorum Shakespeare Challenge</a>, its <a href='https://github.com/mlaa/nvs-challenge'>data</a>,
                and the awesomeness of my friends and colleagues who inspire me to experiment.
                </p>
                <p>
                You can read more about the technical and conceptual hows and whys of building this site
                <a href='http://hackingthehumanities.org/post/s-hack-speare-or-building-bill-crit-o-matic'>here</a>.
                </p>
            </div>

            <?php plugin_footer(); ?>

        </div><!-- end footer -->
    </div><!-- end wrap -->
</body>
</html>
