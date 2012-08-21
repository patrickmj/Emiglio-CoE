<?php head(array('title' => item('Dublin Core', 'Title'), 'bodyid'=>'items','bodyclass' => 'show')); ?>

<?php $commentators = mla_get_commentators_for_bibliography(); ?>

<div id="primary">

    <h1><?php echo item('Dublin Core', 'Title'); ?></h1>

    <ul>
        <?php foreach($commentators as $commentator): ?>
        <li><?php echo link_to($commentator, 'show', item('Dublin Core', 'Title', array(), $commentator)); ?>    
        
        <?php endforeach; ?>
    </ul>

    <p class='mla-citation'>        
        <?php echo item('Item Type Metadata', 'Citation'); ?>
    </p>
    
    <?php echo plugin_append_to_items_show(); ?>

</div><!-- end primary -->

<div id="secondary">


    <!-- The following prints a list of all tags associated with the item -->
            <?php if (item_has_tags()): ?>
                <div class="tags"><p><strong><?php echo __('Tags'); ?></strong>
                <?php echo tag_string(get_current_item(), WEB_ROOT . '/items/browse/sort_field/Dublin+Core,Title/tag/'); ?></p>
                </div>
            <?php endif; ?>
    <!-- If the item belongs to a collection, the following creates a link to that collection. -->
    <?php if (item_belongs_to_collection()): ?>
        <div id="collection" class="element">
            <h3>Collection</h3>
            <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
        </div>
    <?php endif; ?>


</div><!-- end secondary -->

<ul class="item-pagination navigation">
    <li id="previous-item" class="previous">
        <?php echo link_to_previous_item('Previous Item'); ?>
    </li>
    <li id="next-item" class="next">
        <?php echo link_to_next_item('Next Item'); ?>
    </li>
</ul>

<?php foot();