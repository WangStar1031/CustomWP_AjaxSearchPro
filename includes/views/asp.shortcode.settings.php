<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");
?>
<form name='options' class="asp-fss-<?php echo $style['fss_column_layout']; ?>" autocomplete = 'off'>
    <?php do_action('asp_layout_in_form', $real_id); ?>
    <input type="hidden" style="display:none;" name="current_page_id" value="<?php echo get_the_ID() !== false ? get_the_ID() : '-1'; ?>">
    <?php if ( function_exists('get_woocommerce_currency') ): ?>
        <input type="hidden" style="display:none;" name="woo_currency" value="<?php echo get_woocommerce_currency(); ?>">
    <?php endif; ?>
    <?php if ( class_exists('PeepSo') ): ?>
        <input type="hidden" name="peepso_object_type" value="<?php echo apply_filters('peepso_object_type', 0); ?>">
        <input type="hidden" name="peepso_object_id" value="<?php echo apply_filters('peepso_object_id', 0); ?>">
    <?php endif; ?>
    <?php
    $fields = w_isset_def($style['field_order'], 'general|custom_post_types|custom_fields|categories_terms');
    if (strpos($fields, "general") === false) $fields = "general|" . $fields;
    if (strpos($fields, "post_tags") === false) $fields .= "|post_tags";
    if (strpos($fields, "date_filters") === false) $fields .= "|date_filters";
    $field_order = explode( '|', $fields );
    foreach ($field_order as $field)
        include("asp.shortcode.$field.php");
    ?>
    <div style="clear:both;"></div>
</form>