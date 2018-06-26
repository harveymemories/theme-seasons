<?php echo head(array(
   'title' => 'Thank You',
   'bodyclass' => 'page')); ?>
<div id="primary">
<h1><?php echo html_escape(get_option('simple_contact_form_thankyou_page_title')); // Not HTML ?></h1>
<?php echo get_option('simple_contact_form_thankyou_page_message'); // HTML ?>
</div>

<?php echo foot(); ?>
