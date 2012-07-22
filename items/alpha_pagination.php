<?php 
    $request = Zend_Controller_Front::getInstance()->getRequest();
    $tag = $request->getParam('tag');
    $sort_field = $request->getParam('sort_field');

    $type = $request->getParam('type');
    if(!$type) {
        $type = 'Commentator';
    }
?>

<?php $letters = array('A', 'B', 'C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z') ;?>

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
    <a href='<?php echo uri($urlString); ?>'><?php echo $letter?></a>
</li>
<?php endforeach; ?>



</ul>
