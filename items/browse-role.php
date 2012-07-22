<?php
$pageTitle = "Roles";
head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>

<div id='primary' class='browse'>

    <h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', total_results()); ?></h1>

    <?php while (loop_items()): ?>
        <div class="item hentry">
            <div class="item-meta">

            <?php if (item_has_thumbnail()): ?>
                <div class="item-img">
                <?php echo link_to_item(item_square_thumbnail()); ?>
                </div>
            <?php endif; ?>

            <h2 class='mla-bib-entry'><?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?>                        
            </h2>

            <?php if ($text = item('Item Type Metadata', 'Text', array('snippet'=>250))): ?>
                <div class="item-description">
                <p><?php echo $text; ?></p>
                </div>
            <?php elseif ($description = item('Dublin Core', 'Description', array('snippet'=>250))): ?>
                <div class="item-description">
                <?php echo $description; ?>
                </div>
            <?php endif; ?>

            
            
            <?php echo plugin_append_to_items_browse_each(); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
    <?php endwhile; ?>


</div>

<?php foot(); ?>