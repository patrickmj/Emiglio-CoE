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
    <p>
    <?php echo item('Item Type Name'); ?>
    </p>
    <?php endwhile;?>
<?php endforeach; ?>


</div>


<?php 

foot();

?>