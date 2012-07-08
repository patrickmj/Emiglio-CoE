<?php head(array('title' => item('Dublin Core', 'Title'), 'bodyid'=>'items','bodyclass' => 'show')); ?>

<div id="primary">

    <h1><?php echo item('Dublin Core', 'Title'); ?></h1>
<!-- Commentary Notes -->
    <div id='mla-commentary-notes'>
        <?php $discussions = mla_get_discussions_for_commentator('MlaTeiElement_CommentaryNote'); ?>
        <?php 
            $commentaryNotesCount = count($discussions);
            if ($commentaryNotesCount != 0) :
        ?>        
        <h2>Commentary Notes</h2>
        <?php foreach($discussions as $discussion) : ?>
            <div class='mlatei-discussion-wrap' id='<?php echo $discussion->xml_id; ?>'>
                
                <div class='mlatei-discussion-content-wrap'>
                    <?php echo $discussion->html; ?>
                </div>
            </div>        
        <?php endforeach; ?>
        
        <?php endif; ?>
    </div>
<!--  Appendix Ps -->
    <div id='mla-appendix-ps'>
        <?php $discussions = mla_get_discussions_for_commentator('MlaTeiElement_AppendixP'); ?>
        <?php 
            $appendixPsCount = count($discussions);
            if ($appendixPsCount != 0) :
        ?>        
        <h2>Appendix References</h2>
        <?php foreach($discussions as $discussion) : ?>
            <div class='mlatei-discussion-wrap' id='<?php echo $discussion->xml_id; ?>'>
                <h3><?php echo $discussion->label ;?></h3>
                <div class='mlatei-discussion-content-wrap'>
                <?php echo $discussion->html; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
<!--  Appendix Notes -->
    <div id='mla-appendix-notes'>
        <?php $discussions = mla_get_discussions_for_commentator('MlaTeiElement_AppendixNote'); ?>
        <?php 
            $appendixNotesCount = count($discussions);
            if ($appendixNotesCount != 0) :
        ?>
        <h2>Appendix Notes</h2>
        <?php foreach($discussions as $discussion) : ?>
            <div class='mlatei-discussion-wrap' id='<?php echo $discussion->xml_id; ?>'>
                <h3><?php echo $discussion->label ;?></h3>
                <div class='mlatei-discussion-content-wrap'>
                <?php echo $discussion->html; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>    
    
    
<!-- Bibliography -->
    
    <div id='mla-bibliography'>
    <?php $bibEntries = mla_get_bibliography_for_commentator(); ?>
        <h2>Bibliography</h2>
        <?php foreach($bibEntries as $bib) : ?>
            <div class='mlatei-bibliography-wrap' id='<?php echo $bib->xml_id; ?>'>
                <div class='mlatei-bibliography-content-wrap'>
                <?php echo $bib->html; ?>
                </div>
            </div>
        <?php endforeach; ?>    
    </div>
            
    <?php echo plugin_append_to_items_show(); ?>

</div><!-- end primary -->

<div id="secondary">

    <?php if(item_has_files() ): ?>
    <!-- The following returns all of the files associated with an item. -->
    <div id="itemfiles" class="element">
        <h3>Files</h3>
        <div class="element-text"><?php echo display_files_for_item(); ?></div>
    </div>
    <?php endif; ?>
    
    <ul id='mla-refs'>
        <li id='mla-commentary-notes-ref' class='mla-ref'>Commentary Notes
            <?php if($commentaryNotesCount == 0): ?>
                <span class='empty'>(None)</span>
            <?php else: ?>
                <span class='action'>Hide</span>                
            <?php endif; ?>
            
        </li>
        <li id='mla-appendix-ps-ref' class='mla-ref'>Appendix References 
            <?php if($appendixPsCount == 0): ?>
                <span class='empty'>(None)</span>
            <?php else: ?>
                <span class='action'>Hide</span>
            <?php endif; ?>
            
        </li>
        <li id='mla-appendix-notes-ref' class='mla-ref'>Appendix Notes
            <?php if($appendixNotesCount == 0): ?>
                <span class='empty'>(None)</span>
            <?php else: ?>
                <span class='action'>Hide</span>                
            <?php endif; ?>            
        </li>
        <li id='mla-bibliography-ref' class='mla-ref'>Bibliography <span class='action'>Hide</span></li>        
    </ul>
    
    
    <!-- The following prints a list of all tags associated with the item -->
    <?php if (item_has_tags()): ?>
    <div id="item-tags" class="element">
        <h3>Tags</h3>
        <div class="element-text tags"><?php echo item_tags_as_string(); ?></div>
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


<?php foot();
