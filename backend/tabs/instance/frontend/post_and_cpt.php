<div class="item">
    <?php
    $o = new wpdreamsText("custom_types_label", __('Custom post types label text', 'ajax-search-pro'), $sd['custom_types_label']);
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">
        <?php echo __('If empty, the label is not displayed.', 'ajax-search-pro'); ?>
    </p>
</div>
<div class="item item-flex-nogrow">
    <?php
    $o = new wpdreamsCustomSelect("cpt_display_mode", __('Filter display mode', 'ajax-search-pro'), array(
        "selects" => array(
            array("value" => "checkboxes", "option" => "Checkboxes"),
            array("value" => "dropdown", "option" => "Drop-down"),
            array("value" => "radio", "option" => "Radio buttons")
        ),
        "value" => $sd['cpt_display_mode']));
    $params[$o->getName()] = $o->getData();
    $o = new wpdreamsCustomSelect("cpt_filter_default", __('default selected', 'ajax-search-pro'), array(
        "selects" => get_post_types(array(
            "public" => true,
            "_builtin" => false
        ), "names", "OR"),
        "value" => $sd['cpt_filter_default']));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item item-flex-nogrow">
    <?php
    $o = new wpdreamsYesNo("cpt_cbx_show_select_all", __('Display the select all option?', 'ajax-search-pro'), $sd['cpt_cbx_show_select_all']);
    $params[$o->getName()] = $o->getData();

    $o = new wpdreamsText("cpt_cbx_show_select_all_text", __('text', 'ajax-search-pro'), $sd['cpt_cbx_show_select_all_text']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsCustomPostTypesEditable("showcustomtypes", __('Show search in custom post types selectors', 'ajax-search-pro'), $sd['showcustomtypes']);
    $params[$o->getName()] = $o->getData();
    $params['selected-' . $o->getName()] = $o->getSelected();
    ?>
</div>