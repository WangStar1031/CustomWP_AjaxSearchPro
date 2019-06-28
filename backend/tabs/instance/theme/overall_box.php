<div class="item">
    <?php
    $o = new wpdreamsThemeChooser("themes", __('Theme Chooser', 'ajax-search-pro'), array(
        "themes"     => $_themes,
        "value"   => $sd['themes']
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item item-flex-nogrow wpd-isotopic-width" style="flex-wrap: wrap;">
    <?php
    $o = new wpdreamsTextSmall("box_width", __('Search box width', 'ajax-search-pro'), array(
        'icon' => 'desktop',
        'value' => $sd['box_width']
    ));
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("box_width_tablet", '', array(
        'icon' => 'tablet',
        'value' => $sd['box_width_tablet']
    ));
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsTextSmall("box_width_phone", '', array(
        'icon' => 'phone',
        'value' => $sd['box_width_phone']
    ));
    $params[$o->getName()] = $o->getData();
    ?>
    <div class="descMsg" style="min-width: 100%;flex-wrap: wrap;flex-basis: auto;flex-grow: 1;box-sizing: border-box;">
        <?php echo __('Use with units (10px or 50% or auto). Default: <strong>100%</strong>', 'ajax-search-pro'); ?>
    </div>
</div>
<div class="item"><?php
    $o = new wpdreamsNumericUnit("boxheight", __('Search box height', 'ajax-search-pro'), array(
        'value' => $sd['boxheight'],
        'units'=>array('px'=>'px')
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsNumericUnit("boxmargin", __('Search box margin', 'ajax-search-pro'), array(
        'value' => $sd['boxmargin'],
        'units'=>array('px'=>'px', '%'=>'%')
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsGradient("boxbackground", __('Search box background color', 'ajax-search-pro'), $sd['boxbackground']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsBorder("boxborder", __('Search box border', 'ajax-search-pro'), $sd['boxborder']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsBoxShadow("boxshadow", __('Search box Shadow', 'ajax-search-pro'), $sd['boxshadow']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>