<style type='text/css'>
a.current {
    font-size: 1.5em;

}

</style>


<?php 
    $request = Zend_Controller_Front::getInstance()->getRequest();
    $tag = $request->getParam('tag');
    $sort_field = $request->getParam('sort_field');    
    $type = $request->getParam('type');
    if(!$type) {
        $type = 'Commentator';
    }
    
    $startsWith = $request->getParam('starts_with');
    $currLetter = substr($startsWith, -1);
    
?>

<?php $letters = array('A', 'B', 'C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Z') ;?>

<?php if($sort_field): ?>
    <p>Showing all results. Click letters below to limit the results.</p>
<?php endif; ?>


<ul class='pagination_list'>
<?php foreach($letters as $letter): ?>
<?php 
    $urlString = "items/browse/type/$type/starts_with/Dublin Core,Title,$letter";
    if($tag) {
        $urlString = $urlString . "/tag/$tag";
    }
?>
<li class='pagination_range'>
<?php if($currLetter == $letter) {
    $class = 'current';
    
    
} else {
    $class = '';

} 
?>



    <a class='<?php echo $class; ?>' href='<?php echo uri($urlString); ?>'><?php echo $letter?></a>
</li>
<?php endforeach; ?>



</ul>
