<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

$i = 1;
if (!isset($style['customtypes']) || !is_array($style['customtypes']))
    $style['customtypes'] = array();
// When settings are fully hidden, do not show the options
if (
    $settingsFullyHidden ||
    !isset($style['selected-showcustomtypes']) ||
    !is_array($style['selected-showcustomtypes'])
)
    $style['selected-showcustomtypes'] = array();
$flat_show_customtypes = array();
$cpt_label = w_isset_def($style['custom_types_label'], 'Filter by Custom Post Type');

ob_start();

if ($style['cpt_display_mode'] == "checkboxes") {
    if ( $style['cpt_cbx_show_select_all'] == 1 ) {
        ?>
        <div class="asp_option asp_option_cat asp_option_selectall">
            <div class="asp_option_inner">
                <input type="checkbox" id="<?php echo $id; ?>customset_selectall"
                       aria-label="<?php echo asp_icl_t('Select all checkbox for post types' . " ($real_id)", $style['cpt_cbx_show_select_all_text'], true); ?>"
                       data-targetclass="asp_post_type_checkbox" checked="checked"/>
                <label aria-hidden="true" for="<?php echo $id; ?>customset_selectall">
                    <?php echo asp_icl_t('Hidden label', 'Hidden label'); ?>
                </label>
            </div>
            <div class="asp_option_label">
                <?php echo asp_icl_t('Select all checkbox for post types' . " ($real_id)", $style['cpt_cbx_show_select_all_text']); ?>
            </div>
        </div>
        <?php
    }
    foreach ($style['selected-showcustomtypes'] as $k => $v) {
        if ( isset($style['_fo']) ) {
            $selected = in_array($v[0], $style['_fo']['customset']);
        } else {
            $selected = in_array($v[0], $style['customtypes']);
        }
        $flat_show_customtypes[] = $v[0];
        ?>
        <div class="asp_option">
            <div class="asp_option_inner">
                <input type="checkbox" value="<?php echo $v[0]; ?>" id="<?php echo $id; ?>customset_<?php echo $id . $i; ?>"
                       aria-label="<?php echo asp_icl_t($v[0] . " ($real_id)", $v[1], true); ?>"
                       class="asp_post_type_checkbox"
                       name="customset[]" <?php echo(($selected) ? 'checked="checked"' : ''); ?>/>
                <label aria-hidden="true" for="<?php echo $id; ?>customset_<?php echo $id . $i; ?>">
                    <?php echo asp_icl_t('Hidden label', 'Hidden label'); ?>
                </label>
            </div>
            <div class="asp_option_label">
                <?php echo asp_icl_t($v[0] . " ($real_id)", $v[1]); ?>
            </div>
        </div>
        <?php
        $i++;
    }
} else if ($style['cpt_display_mode'] == "dropdown") {
    ?>
    <div class="asp_select_label asp_select_single">
        <select name="customset[]" aria-label="<?php echo asp_icl_t("Custom post types label" . " ($real_id)", $cpt_label);  ?>">
    <?php
    foreach ($style['selected-showcustomtypes'] as $k => $v) {
        $flat_show_customtypes[] = $v[0];
        if ( isset($style['_fo']) ) {
            $selected = in_array($v[0], $style['_fo']['customset']);
        } else {
            $selected = $v[0] == $style['cpt_filter_default'];
        }
        ?>
            <option value="<?php echo $v[0]; ?>" <?php echo $selected ? 'selected="selected"' : ''; ?>>
                <?php echo asp_icl_t($v[0] . " ($real_id)", $v[1]); ?>
            </option>
        <?php
        $i++;
    }
    ?>
        </select>
    </div>
    <?php
} else if($style['cpt_display_mode'] == "radio") {
    echo "<div class='tag_filter_box asp_sett_scroll'>";
    foreach ($style['selected-showcustomtypes'] as $k => $v) {
        $flat_show_customtypes[] = $v[0];
        if ( isset($style['_fo']) ) {
            $selected = in_array($v[0], $style['_fo']['customset']);
        } else {
            $selected = $v[0] == $style['cpt_filter_default'];
        }
        ?>
        <label class="asp_label">
            <input name="customset[]" type="radio" class="asp_radio" value="<?php echo $v[0]; ?>" <?php echo $selected ? 'checked="checked"' : ''; ?>>
            <?php echo asp_icl_t($v[0] . " ($real_id)", $v[1]); ?>
        </label>
        <?php
        $i++;
    }
    echo "</div>";
}


$hidden_types = array();
$hidden_types = array_diff($style['customtypes'], $flat_show_customtypes);


foreach ($hidden_types as $k => $v) {

    ?>
    <div class="asp_option_inner hiddend" aria-hidden="true">
        <input type="checkbox" value="<?php echo $v; ?>"
               id="<?php echo $id; ?>customset_<?php echo $id . $i; ?>"
               name="customset[]" checked="checked"/>
        <label for="<?php echo $id; ?>customset_<?php echo $id . $i; ?>">
            <?php echo asp_icl_t('Hidden label', 'Hidden label'); ?>
        </label>
    </div>
    <div class="asp_option_label hiddend"></div>
    <?php
    $i++;
}


$cpt_content = ob_get_clean();

?>
<fieldset class="asp_sett_scroll<?php echo count($style['selected-showcustomtypes']) > 0 ? '' : ' hiddend'; ?><?php echo $style['cpt_display_mode']=='checkboxes' ? ' asp_checkboxes_filter_box' : ''; ?>">
    <?php if ($cpt_label != ''): ?>
    <legend><?php echo asp_icl_t("Custom post types label" . " ($real_id)", $cpt_label);  ?></legend>
    <?php endif; ?>
    <?php echo $cpt_content; ?>
</fieldset>