<div class="item record">
    <?php
    $title = metadata($item, 'display_title');
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    $text = metadata($item, array('Item Type Metadata', 'Text'), array('snippet' => 150));
    ?>
    <h3><?php echo link_to($item, 'show', $title); ?></h3>
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image(null, array(), 0, $item),
            array('class' => 'image'), 'show', $item
        );
    }
    ?>
    <?php if ($description): ?>
        <p class="item-description"><?php echo $description; ?></p>
    <?php elseif ($text): ?>
        <p class="item-description"><?php echo $text; ?></p>
    <?php endif; ?>
</div>
