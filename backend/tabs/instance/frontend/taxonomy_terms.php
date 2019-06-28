<div class="item">
    <?php
    $o = new wpdreamsYesNo("showsearchintaxonomies", __('Display the category/terms selectors?', 'ajax-search-pro'), $sd['showsearchintaxonomies']);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wd_TaxonomyTermSelect("show_terms", __('Show the following taxonomy term selectors on frontend', 'ajax-search-pro'), array(
        "value"=>$sd['show_terms'],
        "args"  => array(
            "show_type" => 0,
            "show_checkboxes" => 1,
            "show_display_mode" => 1,
            "show_separate_filter_boxes" => 1,
            "show_more_options" => 1,
            "built_in" => true,
            "exclude_taxonomies" => array("post_tag", __('nav_menu', 'ajax-search-pro'), "link_category")
        )
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsYesNo("frontend_term_hierarchy", __('Maintain term hierarchy?', 'ajax-search-pro'), $sd['frontend_term_hierarchy']);
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">
        <?php echo __('Shows child terms hierarchically under their parents with padding. Supports multiple term levels.', 'ajax-search-pro'); ?>
    </p>
</div>
<div class="item">
    <?php
    $o = new wpdreamsCustomArraySelect("frontend_term_order",
        array(
            __('Default term order', 'ajax-search-pro'),
            ""
        ),
        array(
            'optionsArr' => array(
                array(
                    array('option' => __('Name', 'ajax-search-pro'), 'value' => 'name'),
                    array('option' => __('Item count', 'ajax-search-pro'), 'value' => 'count'),
                    array('option' => __('ID', 'ajax-search-pro'), 'value' => 'id')
                ),
                array(
                    array('option' => __('Ascending', 'ajax-search-pro'), 'value' => 'ASC'),
                    array('option' => __('Descending', 'ajax-search-pro'), 'value' => 'DESC')
                )
            ),
            'value' => $sd['frontend_term_order']
        ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>