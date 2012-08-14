<?php 

$bodyclass = 'page simple-page';
if (simple_pages_is_home_page(get_current_simple_page())) {
    $bodyclass .= ' simple-page-home';
} ?>

<?php head(array('title' => html_escape(simple_page('title')), 'bodyclass' => $bodyclass, 'bodyid' => html_escape(simple_page('slug')))); ?>
<div id="primary">
    <?php if (!simple_pages_is_home_page(get_current_simple_page())): ?>
    <p id="simple-pages-breadcrumbs"><?php echo simple_pages_display_breadcrumbs(); ?></p>
    <?php endif; ?>
    <h1><?php echo html_escape(simple_page('title')); ?></h1>
    <?php echo eval('?>' . simple_page('text')); ?>
</div>
<?php if (!simple_pages_is_home_page(get_current_simple_page())): ?>
<div id="secondary">
<?php switch ($simplePage->slug) {
    case 'tags':
        $secHtml = "<p>Topics here are the headings in the appendix. Instead of linking directly ";
        $secHtml .= "they link to scholars cited in paragraphs under those headings. Thus, if you ";
        $secHtml .= "are interested in people who discuss, e.g., the date of composition of Comedy of Errors, ";
        $secHtml .= "you can click that topic and see a list of such people, with additional context to help ";
        $secHtml .= "you decide which of those people to see more information about.</p>";
        
        break;
        
        
    case 'search':
        $secHtml = "<p>Search Scholars and Bibliography will take you to a list of the individual scholars ";
        $secHtml .= "and/or bibliography entries that contain any of the words you search for. Use this to find people ";
        $secHtml .= "and scholarship about a key word, or just to find a reference.</p>";
        $secHtml .= "<p>Search Commentary searches the text of the commentary notes for your keyword(s), ";
        $secHtml .= "and returns a list of the commentary notes containing that text. From there, you can ";
        $secHtml .= "see the relevant passages, bibliography, and individual scholars</p> ";
        $secHtml .= "<p>Search Appendix works like Search Commentary, except it searches over the back-matter appendix. ";
        $secHtml .= "If your starting point is the appendix, you might also try to topics filter, which treats the section labels ";
        $secHtml .= "in the appendix like a tag cloud.</p>";
        
        break;
    
    
    
    
    
}
 echo $secHtml;
?>
</div>
<?php endif; ?>
<?php echo foot(); ?>