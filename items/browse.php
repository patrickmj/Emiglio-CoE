<?php
$pageTitle ='Scholars';
head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>

<div id="primary" class="browse">

    <h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', total_results()); ?></h1>

    <div id="pagination-top" class="pagination">
    <?php echo pagination_links(); ?>
    <?php include 'scholar_alpha_pagination.php' ;?>
    
    </div>

    <?php while (loop_items()): ?>
        <div class="item hentry">
            <div class="item-meta">

            <?php if (item_has_thumbnail()): ?>
                <div class="item-img">
                <?php echo link_to_item(item_square_thumbnail()); ?>
                </div>
            <?php endif; ?>

            <h2 class='mla-commentator'><?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?>
                <span class="mla-passage-count">(<?php echo mla_count_total_citations_for_commentator(); ?> points of interest)</span>                        
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

            <?php if (item_has_tags()): ?>
                <div class="tags"><p><strong><?php echo __('Tags'); ?></strong>
                <?php echo item_tags_as_string(); ?></p>
                </div>
            <?php endif; ?>

            <?php 
                $passagesCount = mla_count_passages_for_commentator();
                $commentaryNotesCount = mla_count_discussions_for_commentator('MlaTeiElement_CommentaryNote');
                $bibCount = mla_count_bibliography_for_commentator();
                $appPsCount = mla_count_discussions_for_commentator('MlaTeiElement_AppendixP'); 
                $appNoteCount = mla_count_discussions_for_commentator('MlaTeiElement_AppendixNote');            
            ?>
            
            <ul id='mla-commentator-stats'>
                <li>Passages
                <span>(<?php echo $passagesCount; ?>)</span>
                </li>
                <li>Commentary Notes
                <span>(<?php echo $commentaryNotesCount; ?>)</span>
                </li>
                <li>Appendix References
                <span>(<?php echo $appPsCount; ?>)</span>
                </li>
                <li>Appendix Notes
                <span>(<?php echo $appNoteCount; ?>)</span>
                </li>
                <li>Bibliography Entries
                <span>(<?php echo $bibCount; ?>)</span>
                </li>
            </ul>
            
            
            <?php echo plugin_append_to_items_browse_each(); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
    <?php endwhile; ?>
    <?php echo plugin_append_to_items_browse(); ?>

    <div id="pagination-bottom" class="pagination"><?php echo pagination_links(); ?></div>
</div>
<div id="secondary">

</div>

<?php foot();
