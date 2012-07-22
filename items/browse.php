<?php 
//switch around the type of Item we're browsing
$request = Zend_Controller_Front::getInstance()->getRequest();

if($request->getParam('search')) {
    include('search.php');
    die();
    
}


$type = $request->getParam('type');
if(!$type) {
    $type = 'Commentator';
}
switch($type) {
    
    case 'Commentator':
        include('browse-commentators.php');        
        break;
        
    case 'Bibliography Entry':
        include('browse-bib-entries.php');
        break;    
        
    case 'Role':
        include('browse-role.php');            
        break;
                    
}

?>


