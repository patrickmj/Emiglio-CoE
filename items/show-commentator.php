<?php head(array('title' => item('Dublin Core', 'Title'), 'bodyid'=>'items','bodyclass' => 'show')); ?>

<?php 
$commentaryNotes = mla_get_discussions_for_commentator('MlaTeiElement_CommentaryNote');
$commentaryNotesCount = count($commentaryNotes);
$appendixPs = mla_get_discussions_for_commentator('MlaTeiElement_AppendixP');
$appendixPsCount = count($appendixPs);
$appendixNotes = mla_get_discussions_for_commentator('MlaTeiElement_AppendixNote');
$appendixNotesCount = count($appendixNotes);
$bibEntries = mla_get_bibliography_for_commentator();
$editionEntries = mla_get_editions_for_commentator();
$bibEntries = array_merge($bibEntries, $editionEntries);
$bibEntriesCount = count($bibEntries);
$secondaryHTML = "";
?>


<div id="primary">

    <h1><?php echo item('Dublin Core', 'Title'); ?></h1>


    <?php if (item_has_tags()): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?></strong>
        <?php echo tag_string(get_current_item(), WEB_ROOT . '/items/browse/type/Commentator/sort_field/Dublin+Core,Title/tag/'); ?></p>
        </div>
    <?php endif; ?>
    
    
<!-- Bibliography -->
    
    <div id='mla-bibliography'>

        <h2>Bibliography</h2>
        <?php foreach($bibEntries as $bib) : ?>
            <div class='mlatei-bibliography-wrap' id='<?php echo $bib->xml_id; ?>'>
                <div class='mlatei-bibliography-content-wrap'>
                <?php echo $bib->html; ?>
                </div>
            </div>
        <?php endforeach; ?>    
    </div>
              
<!-- In Convo -->              
             
     <div id='mla-inconvo'>
         <?php $commentators = mla_get_commentators_in_convo_with_commentator(); ?>
         
         <h2>In conversation with <?php echo count($commentators); ?> scholars <a class='mla-toggle-details mla-reveal-open'>Details</a></h2>
         
         
         
         <div class='mla-details' style='display:none;'>
             <a id='convo-reset'>Reset</a>
             <ul class='mla-commentator'>
             <?php foreach($commentators as $c): ?>
                 
                     <li class='mla-in-convo'>
                         <a href="<?php echo item_uri('show', $c['item']); ?>"><?php echo item('Dublin Core' , 'Title', array(), $c['item']); ?></a>
                         <?php $classes = ''; 
                             foreach($c['refs'] as $ref) {
                                    $classes .= ' ' . $ref['xml_id'];
                                }
                         ?>
                         <span class="mla-convos <?php echo $classes; ?>">Convos</span>                                      
                     </li>
             
             <?php endforeach; ?>
             </ul>
         </div>
     </div> 
    
    <ul id='mla-refs'>
        <li id='mla-commentary-notes-ref' class='mla-ref'>Notes
                <span class='mla-count'>(<?php echo $commentaryNotesCount;?>)</span> <span class='action'>Hide</span>                
        </li>
        <li id='mla-appendix-ps-ref' class='mla-ref'>App. Refs 
                <span class='mla-count'>(<?php echo $appendixPsCount;?>)</span> <span class='action'>Hide</span>            
        </li>
        <li id='mla-appendix-notes-ref' class='mla-ref'>App. Notes
                <span class='mla-count'>(<?php echo $appendixNotesCount;?>)</span> <span class='action'>Hide</span>                
        </li>
        
    </ul>  
    
    
<!-- Commentary Notes -->
    <div id='mla-commentary-notes'>
        <?php $discussions = $commentaryNotes; ?>
        <?php 
            if ($commentaryNotesCount != 0) :
        ?>        
        <h2>Commentary Notes</h2>
        <?php foreach($discussions as $discussion) : ?>
            

            <div class='mlatei-discussion-wrap' id='<?php echo $discussion->xml_id; ?>'>
                <div class='mlatei-discussion-references'>
                    <ul class='mlatei-discussion-nav'>
                        <li id='mlatei-discussion-bib-<?php echo $discussion->id; ?>-nav' class='mla-reveal-open' >Note Bibliography</li>
                        <li id='mlatei-discussion-passages-<?php echo $discussion->id; ?>-nav' class='mla-reveal-open' >Passages Mentioned</li>                    
                    </ul>
                </div>                
                
                <div class='mlatei-discussion-content-wrap'>
                    <?php echo $discussion->html; ?>
                </div>
                                
                <?php $secondaryHTML .= "<!-- Bibliography for discussion -->
                                <div id='mlatei-discussion-bib-{$discussion->id}-wrap' class='mlatei-discussion-bib-wrap' >
                                 <h3>Note Bibliography</h3>
                                 ";
                        
                        $discBib = mla_get_bibliography_for_discussion($discussion);
                        $editions = mla_get_editions_for_discussion($discussion);
                        $bib = array_merge($discBib, $editions);
                        
                        foreach($bib as $entry) {
                            $secondaryHTML .= mla_bib_secondary_html($entry);
                        }
                        $secondaryHTML .= "</div>"; 
            
                ?>
                <?php $secondaryHTML .= "<!-- Passages referred to  -->
                            <div id='mlatei-discussion-passages-{$discussion->id}-wrap' class='mlatei-discussion-passages-wrap' >
                                <h3>Passages</h3>
                            "; 
                        $passages = mla_get_passages_for_discussion($discussion);
                        foreach($passages as $passage) {
                            $secondaryHTML .= "
                                    <div class='mla-passage'>
                                        <p class='mla-passage-line'>
                                        {$passage->n}
                                        </p>
                                        <div class='mla-passage-html'>
                                        {$passage->html}
                                        </div>   
                                    </div>                                         
                            ";
            
                        }
                        $secondaryHTML .= "</div>";
            ?>
            </div>        
        <?php endforeach; ?>
        
        <?php endif; ?>
    </div>
<!--  Appendix Ps -->
    <div id='mla-appendix-ps'>
        <?php $discussions = $appendixPs; ?>
        <?php 
            if ($appendixPsCount != 0) :
        ?>        
        <h2>Appendix References</h2>
        <?php foreach($discussions as $discussion) : ?>
   
            <div class='mlatei-discussion-wrap' id='<?php echo $discussion->xml_id; ?>'>
                <div class='mlatei-discussion-references'>
                    <ul class='mlatei-discussion-nav'>
                        <li id='mlatei-discussion-bib-<?php echo $discussion->id; ?>-nav' class='mla-reveal-open' >Note Bibliography</li>
                        <li id='mlatei-discussion-passages-<?php echo $discussion->id; ?>-nav' class='mla-reveal-open' >Passages Mentioned</li>                    
                    </ul>
                </div>     
            
            <h3><?php echo $discussion->label ;?></h3>
                
                <?php $tags = $discussion->getTags(); ?>
                <p class='tags'>
                    <?php echo tag_string($tags,  WEB_ROOT . '/items/browse/type/Commentator/sort_field/Dublin+Core,Title/tag/'); ?>
                </p>
                <div class='mlatei-discussion-content-wrap'>
                    <?php echo $discussion->html; ?>
                </div>
                <?php $secondaryHTML .= "<!-- Bibliography for discussion -->
                                <div id='mlatei-discussion-bib-{$discussion->id}-wrap' class='mlatei-discussion-bib-wrap' >
                                 <h3>Note Bibliography</h3>
                                 ";
                        
                        $discBib = mla_get_bibliography_for_discussion($discussion);
                        $editions = mla_get_editions_for_discussion($discussion);
                        $bib = array_merge($discBib, $editions);
                        
                        foreach($bib as $entry) {
                            $secondaryHTML .= mla_bib_secondary_html($entry);
                        }
                        $secondaryHTML .= "</div>"; 
            
                ?>
                <?php $secondaryHTML .= "<!-- Passages referred to  -->
                            <div id='mlatei-discussion-passages-{$discussion->id}-wrap' class='mlatei-discussion-passages-wrap' >
                                <h3>Passages</h3>
                            "; 
                        $passages = mla_get_passages_for_discussion($discussion);
                        foreach($passages as $passage) {
                            $secondaryHTML .= "
                                    <div class='mla-passage'>
                                        <p class='mla-passage-line'>
                                        {$passage->n}
                                        </p>
                                        <div class='mla-passage-html'>
                                        {$passage->html}
                                        </div>   
                                    </div>                                         
                            ";
            
                        }
                        $secondaryHTML .= "</div>";
                ?>
                
                
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
<!--  Appendix Notes -->
    <div id='mla-appendix-notes'>
        <?php $discussions = $appendixNotes  ?>
        <?php 
            if ($appendixNotesCount != 0) :
        ?>
        <h2>Appendix Notes</h2>
        <?php foreach($discussions as $discussion) : ?>
     
            <div class='mlatei-discussion-wrap' id='<?php echo $discussion->xml_id; ?>'>
            <div class='mlatei-discussion-references'>
                <ul class='mlatei-discussion-nav'>
                    <li id='mlatei-discussion-bib-<?php echo $discussion->id; ?>-nav' class='mla-reveal-open' >Note Bibliography</li>
                    <li id='mlatei-discussion-passages-<?php echo $discussion->id; ?>-nav' class='mla-reveal-open' >Passages Mentioned</li>                    
                </ul>
            </div>   
            
            <h3><?php echo $discussion->label ;?></h3>
                <div class='mlatei-discussion-content-wrap'>
                    <?php echo $discussion->html; ?>
                </div>
                <?php $secondaryHTML .= "<!-- Bibliography for discussion -->
                                <div id='mlatei-discussion-bib-{$discussion->id}-wrap' class='mlatei-discussion-bib-wrap' >
                                 <h3>Note Bibliography</h3>
                                 ";
                        
                        $discBib = mla_get_bibliography_for_discussion($discussion);
                        $editions = mla_get_editions_for_discussion($discussion);
                        $bib = array_merge($discBib, $editions);
                        
                        foreach($bib as $entry) {
                            $secondaryHTML .= mla_bib_secondary_html($entry);
                        }
                        $secondaryHTML .= "</div>"; 
            
                ?>
                <?php $secondaryHTML .= "<!-- Passages referred to  -->
                            <div id='mlatei-discussion-passages-{$discussion->id}-wrap' class='mlatei-discussion-passages-wrap' >
                                <h3>Passages</h3>
                            "; 
                        $passages = mla_get_passages_for_discussion($discussion);
                        foreach($passages as $passage) {
                            $secondaryHTML .= "
                                    <div class='mla-passage'>
                                        <p class='mla-passage-line'>
                                        {$passage->n}
                                        </p>
                                        <div class='mla-passage-html'>
                                        {$passage->html}
                                        </div>   
                                    </div>                                         
                            ";
            
                        }
                        $secondaryHTML .= "</div>";
                ?>
                
                
                
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
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


<?php echo $secondaryHTML; ?>
    



</div><!-- end secondary -->


<?php foot();
