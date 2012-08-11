<?php

if($this->items) {
    $first = $this->items[0];
    $last = $this->items[count($this->items) - 1];
    $firstName = item('Dublin Core', 'Title', array(), $first);
    $lastName = item('Dublin Core', 'Title', array(), $last);
    $pageTitle = "Bibliography: <span class='mla-title'>$firstName</span>";
    if(count($this->items) >1 ) {
        $pageTitle .= " to <span class='mla-title'>$lastName</span>";
    }

}

head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>

<div id='primary' class='browse'>

    <h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', total_results()); ?></h1>


    <div id="pagination-top" class="pagination">
        <?php include 'alpha_pagination.php' ;?>    
    </div>
    <div id="pagination-bottom" class="pagination"><?php echo pagination_links(); ?></div>
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

            
            <?php $commentators = mla_get_commentators_for_bibliography(); ?>
            <ul>
                <?php foreach($commentators as $commentator): ?>
                <li><?php echo link_to($commentator, 'show', item('Dublin Core', 'Title', array(), $commentator)); ?>    
                
                <?php endforeach; ?>
            </ul>            
        
            <p class='mla-citation'>        
                <?php echo item('Item Type Metadata', 'Citation'); ?>
            </p>
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