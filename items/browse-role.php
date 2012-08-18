<?php
$pageTitle = "Roles";
head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>
<style type='text/css'>
div.mla-details {
    margin-left: 12px;
}


</style>

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

            <h2 class='mla-bib-entry'><?php echo item('Dublin Core', 'Title'); ?>                        
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

           
            <!-- Commentators -->
            <?php $commentators = mla_get_commentators_for_speech_role(); ?>
            <p><?php echo count($commentators) . " scholars commenting on " . item('Dublin Core', 'Title') . "'s " . mla_count_speeches_for_role() . " speeches" ;?> <a class='mla-toggle-details mla-reveal-open'>Details</a></p>
            
            <div class='mla-details' style='display: none;'>
                <?php foreach($commentators as $commentator): ?>
                    <h3><?php echo link_to_item(item('Dublin Core', 'Title', array(), $commentator), array(), 'show', $commentator);?></h3>
                
                <?php endforeach; ?>
            </div>
            <?php echo plugin_append_to_items_browse_each(); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
    <?php endwhile; ?>


</div>

<?php foot(); ?>