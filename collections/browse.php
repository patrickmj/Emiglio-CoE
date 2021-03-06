<?php head(array('title'=>__('Browse Collections'),'bodyid'=>'collections','bodyclass' => 'browse')); ?>
<div id="primary">
    <h1><?php echo __('Collections'); ?></h1>
    <?php if (has_collections_for_loop()): ?>
        <div class="pagination"><?php echo pagination_links(); ?></div>
    <?php while (loop_collections()): ?>
        <div class="collection">
            <h2><?php echo link_to_collection(); ?></h2>
            <div class="element">
                <h3><?php echo __('Description'); ?></h3>
            <div class="element-text"><?php echo nls2p(collection('Description', array('snippet'=>150))); ?></div>
        </div>
        <div class="element">
            <h3><?php echo __('Collector(s)'); ?></h3>
            <?php if(collection_has_collectors()): ?>
            <div class="element-text">
                <p><?php echo collection('Collectors', array('delimiter'=>', ')); ?></p>
            </div>
            <?php endif; ?>
        </div>
        <p class="view-items-link"><?php echo link_to_browse_items(__('View the items in %s', collection('Name')), array('collection' => collection('id'))); ?></p>

        <?php echo plugin_append_to_collections_browse_each(); ?>

        </div><!-- end class="collection" -->
    <?php endwhile; ?>
    <?php else: ?>
        <p>No collections to display.</p>
    <?php endif; ?>
        <?php echo plugin_append_to_collections_browse(); ?>
</div><!-- end primary -->
<div id="secondary">
    <div id="featured-collection" class="featured">
        <?php echo display_random_featured_collection(); ?>
    </div><!-- end featured collection -->
</div>
<?php foot();
