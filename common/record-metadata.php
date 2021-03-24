<?php if (isset(get_view()->item) && get_view()->item->item_type_id == 4): ?>
<!-- 2021-03-19 @bulbil
  custom order and display of metadata fields
  based on whether item and item type id -->
<?php 
    $dc = 'Dublin Core';
    $oh = 'Oral History Item Type Metadata';
    $displayElements = [
        [$dc, 'Description'],
        [$oh, 'Transcription'],
        [$dc, 'Source'],
        [$dc, 'Publisher'],
        [$dc, 'Date'],
        [$dc, 'Contributor'],
        [$dc, 'Rights'],
        [$oh, 'Interviewee'],
        [$oh, 'Location'],
        [$oh, 'Duration'],
    ]
?>
<div class="element-set">

  <?php foreach ($displayElements as $displayElement): ?>
    <?php $elementName = $displayElement[1];
          $setName = $displayElement[0];
          $elementInfo = $elementsForDisplay[$setName][$elementName];
     ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->

<?php else: ?>

<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach; ?>

<?php endif;
