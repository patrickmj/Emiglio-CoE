<?php
$search = $request->getParam('search');
head(array('title' => "Search for: $search", 'bodyid'=>'items','bodyclass' => 'browse')); 


$bibEntries = array();
$commentators = array();
$editionEntries = array();


foreach($items as $item) {
    switch(item('Item Type Name', null, array(), $item)) {
        case 'Bibliography Entry':
            $bibEntries[] = $item;
            break;
            
        case 'Commentator':
            $commentators[] = $item;
            break;
            
        case 'Edition Entry':
            $editionEntries[] = $item;
            break;
        
    }
    
}

?>

<div id="primary" class="browse">
<?php $arrays = array('Bibliography Entries' =>'bibEntries','Scholars' => 'commentators', 'Editions' => 'editionEntries'); ?>
<?php foreach($arrays as $label=>$arrayName): ?>
    <h1><?php echo $label?></h1>
    <?php set_items_for_loop($$arrayName); ?>
    <?php while(loop_items()):?>
    <h2><?php echo link_to_item(item('Dublin Core', 'Title'), 'show'); ?></h2>
    <?php $citation = item('Item Type Metadata', 'Citation'); ?>
    <?php if($citation) : ?>
        <div class='mla-citation'>
            <?php echo $citation; ?>
        </div>
    <?php endif; ?>
    <?php if (item_has_tags()): ?>
        <div class="tags"><p><strong>Topics</strong>
        <?php echo tag_string(get_current_item(), WEB_ROOT . '/items/browse/type/Commentator/sort_field/Dublin+Core,Title/tag/'); ?></p>
        </div>
    <?php endif; ?>

    <?php if(item('Item Type Name') == 'Commentator') :?>
        <div class='bibliography'>
        <?php $bibliography = mla_get_bibliography_for_commentator($item); ?>
        
        <?php foreach($bibliography as $bibEntry): ?>
            <p>
                <?php echo $bibEntry->html; ?>
            </p>
        
        <?php endforeach; ?>
        </div>
    <?php endif;?>

    
    <?php endwhile;?>
<?php endforeach; ?>


</div>


<?php 

foot();

?>