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
                the Modern Language Association's New Variorum Shakespeare Challenge, its data,
                and the awesomeness of my friends and colleagues who inspire me to experiment
                </p>
            </div>

            <?php plugin_footer(); ?>

        </div><!-- end footer -->
    </div><!-- end wrap -->
</body>
</html>
