<div>
  <button id="portlets-toggler">Dashboard</button>

<?php

$param = CJavaScript::encode(array('baseUrl' => Yii::app()->createUrl('dashboard/default').'/'));
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'portlets-toggler-popup',
    'options' => array(
        'title' => 'Toggle Portlets',
        'modal' => true,
        'autoOpen' => false,
        'hide' => 'slide',
        'show' => 'slide',
        'buttons' => array(
          array(
            'text' => 'OK',
            'click' => "js:function() { Dashboard.fn.togglePortlets($param) }"
          ),
          array(
            'text' => 'Cancel',
            'click' => 'js:function() { $(this).dialog("close"); }',
          ),
        )
     )));
?>
<div class="dash-button">
    <ul class="dash-checkbox">
    <?php foreach ($portlets as $column) : ?>
      <?php foreach ($column as $portlet) : ?>
      <li>
        <input class="portlets-toggle-item" type="checkbox" id="<?php print $portlet['class'] ?>-toggler" value="<?php print $portlet['class'] ?>"<?php print $portlet['visible'] ? ' checked="checked"' : '' ?> />
        <?php print $portlet['class'] ?>
      </li>
      <?php endforeach; ?>
    <?php endforeach; ?>
    </ul>
</div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
</div>

<div id="dashboard">

<div class="column" id="column-0">
<?php if (isset($portlets[0])) : ?>
  <?php foreach ($portlets[0] as $portlet) : ?>
  <?php $this->widget($portlet['class'], array('visible' => $portlet['visible'])) ?>
  <?php endforeach; ?>

<?php endif; ?>
</div>


<!--
<div class="column" id="column-1">
<?php if (isset($portlets[1])) : ?>
  <?php foreach ($portlets[1] as $portlet) : ?>
  <?php $this->widget($portlet['class'], array('visible' => $portlet['visible'])) ?>
  <?php endforeach; ?>
<?php endif; ?>
</div>



<div class="column" id="column-2">
<?php if (isset($portlets[2])) : ?>
  <?php foreach ($portlets[2] as $portlet) : ?>
  <?php $this->widget($portlet['class'], array('visible' => $portlet['visible'])) ?>
  <?php endforeach; ?>
<?php endif; ?>
</div>
-->
</div>
