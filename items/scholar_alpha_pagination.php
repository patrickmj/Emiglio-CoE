
<?php $letters = array('A', 'B', 'C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z') ;?>
<ul class='pagination_list'>
<?php foreach($letters as $letter): ?>
<li class='pagination_range'>
    <a href='<?php echo uri("items?type=Commentator&starts_with=Dublin Core,Title,$letter"); ?>'><?php echo $letter?></a>
</li>
<?php endforeach; ?>



</ul>
