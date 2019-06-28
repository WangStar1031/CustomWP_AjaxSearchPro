<div class="item">
    <?php
    $option_name = "show_images";
    $option_desc = __('Show images in results?', 'ajax-search-pro');
    $o = new wpdreamsYesNo($option_name, $option_desc,
        $sd[$option_name]);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $option_name = "image_transparency";
    $option_desc = __('Preserve image transparency?', 'ajax-search-pro');
    $o = new wpdreamsYesNo($option_name, $option_desc,
        $sd[$option_name]);
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $option_name = "image_bg_color";
    $option_desc = __('Image background color?', 'ajax-search-pro');
    $o = new wpdreamsColorPicker($option_name, $option_desc,
        $sd[$option_name]);
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">
        <?php echo sprintf( __('Only works if NOT the BFI Thumb library is used. You can change it on the <a href="%s">Cache Settings</a> submenu.', 'ajax-search-pro'), 'admin.php?page=asp_cache_settings' ); ?>
    </p>
</div>
<div class="item">
    <?php
    $option_name = "image_display_mode";
    $option_desc = __('Image display mode', 'ajax-search-pro');
    $o = new wpdreamsCustomSelect($option_name, $option_desc, array(
        'selects'=>array(
            array("option" => "Cover the space", "value" => "cover"),
            array("option" => "Contain the image", "value" => "contain")
        ),
        'value'=>$sd[$option_name]
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $option_name = "image_apply_content_filter";
    $option_desc = __('Execute shortcodes when looking for images in content?', 'ajax-search-pro');
    $o = new wpdreamsYesNo($option_name, $option_desc,
        $sd[$option_name]);
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">
        <?php echo __('Will execute shortcodes and apply the content filter before looking for images in the post content.', 'ajax-search-pro'); ?><br>
        <?php echo __('If you have <strong>missing images in results</strong>, try turning ON this option. <strong>Can cause lower performance!</strong>', 'ajax-search-pro'); ?>
    </p>
</div>
<fieldset>
    <legend>Image source settings</legend>
    <div class="item">
        <?php
        $option_name = "image_source1";
        $option_desc = __('Primary image source', 'ajax-search-pro');
        $o = new wpdreamsCustomSelect($option_name, $option_desc, array(
            'selects'=>$sd['image_sources'],
            'value'=>$sd[$option_name]
        ));
        $params[$o->getName()] = $o->getData();
        ?>
    </div>
    <div class="item">
        <?php
        $option_name = "image_source2";
        $option_desc = __('Alternative image source 1', 'ajax-search-pro');
        $o = new wpdreamsCustomSelect($option_name, $option_desc, array(
            'selects'=>$sd['image_sources'],
            'value'=>$sd[$option_name]
        ));
        $params[$o->getName()] = $o->getData();
        ?>
    </div>
    <div class="item">
        <?php
        $option_name = "image_source3";
        $option_desc = __('Alternative image source 2', 'ajax-search-pro');
        $o = new wpdreamsCustomSelect($option_name, $option_desc, array(
            'selects'=>$sd['image_sources'],
            'value'=>$sd[$option_name]
        ));
        $params[$o->getName()] = $o->getData();
        ?>
    </div>
    <div class="item">
        <?php
        $option_name = "image_source4";
        $option_desc = __('Alternative image source 3', 'ajax-search-pro');
        $o = new wpdreamsCustomSelect($option_name, $option_desc, array(
            'selects'=>$sd['image_sources'],
            'value'=>$sd[$option_name]
        ));
        $params[$o->getName()] = $o->getData();
        ?>
    </div>
    <div class="item">
        <?php
        $option_name = "image_source5";
        $option_desc = __('Alternative image source 4', 'ajax-search-pro');
        $o = new wpdreamsCustomSelect($option_name, $option_desc, array(
            'selects'=>$sd['image_sources'],
            'value'=>$sd[$option_name]
        ));
        $params[$o->getName()] = $o->getData();
        ?>
    </div>
    <div class="item">
        <?php
        $option_name = "image_source_featured";
        $option_desc = __('Featured image size source', 'ajax-search-pro');
        $_feat_image_sizes = get_intermediate_image_sizes();
        $feat_image_sizes = array(
            array(
                "option" => "Original size",
                'value' => "original"
            )
        );
        foreach ($_feat_image_sizes as $k => $v)
            $feat_image_sizes[] = array(
                "option" => $v,
                "value"  => $v
            );
        $o = new wpdreamsCustomSelect($option_name, $option_desc, array(
            'selects'=>$feat_image_sizes,
            'value'=>$sd[$option_name]
        ));
        $params[$o->getName()] = $o->getData();
        ?>
    </div>
    <div class="item">
        <?php
        $option_name = "image_default";
        $option_desc = __('Default image url', 'ajax-search-pro');
        $o = new wpdreamsUpload($option_name, $option_desc,
            $sd[$option_name]);
        $params[$o->getName()] = $o->getData();
        ?>
    </div>
    <div class="item">
        <?php
        $option_name = "image_custom_field";
        $option_desc = __('Custom field containing the image', 'ajax-search-pro');
        $o = new wpdreamsText($option_name, $option_desc,
            $sd[$option_name]);
        $params[$o->getName()] = $o->getData();
        ?>
    </div>
</fieldset>