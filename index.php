<?php echo head(array('bodyid'=>'home')); ?>

<?php if (get_theme_option('Homepage Text')): ?>
<!-- Homepage Text -->
<div id="primary">
     <p><?php echo get_theme_option('Homepage Text'); ?></p>
</div>
<?php endif; ?>

<?php if (get_theme_option('Display Featured Item') !== '0'): ?>
<!-- Featured Item -->
<div id="featured-item">
    <h2><?php echo __('Featured Item'); ?></h2>
    <?php echo random_featured_items(1); ?>
</div><!--end featured-item-->
<?php endif; ?>

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>

<?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
<!-- Featured Collection -->
<div id="featured-collection">
    <h2><?php echo __('Featured Collection'); ?></h2>
    <?php echo random_featured_collection(); ?>
</div><!-- end featured collection -->
<?php endif; ?>

<div id="featured-item" class="logos">
<center>
<a href="https://www.rice.edu/"><img src="https://harveymemories.org/files/original/0dbfce5929989c3d4e58f7d42b483447.png" title="Rice University logo" alt="Rice University logo"></img></a>
<a href="http://www.hcpl.net/"><img src="https://harveymemories.org/files/original/68cf6bde8016f916d702b8e0b8b550d0.png" title="Harris County Public Library logo" alt="Harris County Public Library logo"></img></a>
<a href="https://libraries.uh.edu/"><img src="https://harveymemories.org/files/original/8cc84caa1a465b998a979202f6f83db9.png" title="University of Houston Libraries logo" alt="University of Houston libraries logo"></img></a>
</center>
</div>

<?php if ((get_theme_option('Display Featured Exhibit') !== '0')
        && plugin_is_active('ExhibitBuilder')
        && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
<!-- Featured Exhibit -->
<?php echo exhibit_builder_display_random_featured_exhibit(); ?>
<?php endif; ?>

<?php
$recentItems = get_theme_option('Homepage Recent Items');
if ($recentItems === null || $recentItems === ''):
    $recentItems = 3;
else:
    $recentItems = (int) $recentItems;
endif;
if ($recentItems):
?>
<div id="recent-items">
    <h2><?php echo __('Recently Added Items'); ?></h2>
    <?php echo recent_items($recentItems); ?>
    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
</div><!--end recent-items -->
<?php endif; ?>


<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
