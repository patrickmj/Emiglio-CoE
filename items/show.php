<?php 
//do some branching around the Item Type to pull in different templates
$itemTypeName = item('Item Type Name', null, array(), $item);
switch($itemTypeName) {
    case 'Commentator':
        include('show-commentator.php');
        break;
        
    case 'Bibliography Entry':
        include('show-bib-entry.php');
        break;
        
    case 'Role':
        include('show-role.php');
        break;
}

?>

