<?php
$_red_opts = array(
    array("option" => __('Trigger live search', 'ajax-search-pro'), "value" => "ajax_search"),
    array("option" => __('Redirect to: First matching result', 'ajax-search-pro'), "value" => "first_result"),
    array("option" => __('Redirect to: Results page', 'ajax-search-pro'), "value" => "results_page"),
    array("option" => __('Redirect to: Woocommerce results page', 'ajax-search-pro'), "value" => "woo_results_page"),
    array("option" => __('Redirect to: Custom URL', 'ajax-search-pro'), "value" => "custom_url"),
    array("option" => __('Do nothing', 'ajax-search-pro'), "value" => "nothing")
);
if ( !class_exists("WooCommerce") ) unset($_red_opts[3]);
?>
<ul id="subtabs"  class='tabs'>
    <li><a tabid="101" class='subtheme current'><?php echo __('Sources', 'ajax-search-pro'); ?></a></li>
    <li><a tabid="105" class='subtheme'><?php echo __('Sources 2', 'ajax-search-pro'); ?></a></li>
	<li><a tabid="109" class='subtheme'><?php echo __('Attachments', 'ajax-search-pro'); ?></a></li>
	<li><a tabid="108" class='subtheme'><?php echo __('User Search', 'ajax-search-pro'); ?></a></li>
    <li><a tabid="102" class='subtheme'><?php echo __('Logic & Behavior', 'ajax-search-pro'); ?></a></li>
    <li><a tabid="110" class='subtheme'><?php echo __('Mobile Behavior', 'ajax-search-pro'); ?></a></li>
    <li><a tabid="103" class='subtheme'><?php echo __('Image Options', 'ajax-search-pro'); ?></a></li>
    <?php if ( function_exists('bp_core_get_user_domain') ): ?>
    <li><a tabid="104" class='subtheme'><?php echo __('BuddyPress', 'ajax-search-pro'); ?></a></li>
    <?php endif; ?>
    <?php if ( class_exists('PeepSoGroup') ): ?>
    <li><a tabid="112" class='subtheme'><?php echo __('PeepSo', 'ajax-search-pro'); ?></a></li>
    <?php endif; ?>
    <li><a tabid="111" class='subtheme'><?php echo __('Limits', 'ajax-search-pro'); ?></a></li>
    <li><a tabid="107" class='subtheme'><?php echo __('Ordering', 'ajax-search-pro'); ?></a></li>
    <li><a tabid="113" class='subtheme'><?php echo __('Grouping & Other', 'ajax-search-pro'); ?></a></li>
</ul>
<div class='tabscontent'>
    <div tabid="101">
        <fieldset>
            <legend><?php echo __('Sources', 'ajax-search-pro'); ?></legend>
            <?php include( ASP_PATH . 'backend/tabs/instance/general/sources.php'); ?>
        </fieldset>
    </div>
    <div tabid="102">
            <?php include(ASP_PATH."backend/tabs/instance/general/behaviour.php"); ?>
    </div>
    <div tabid="110">
        <fieldset>
            <legend><?php echo __('Behavior on Mobile devices', 'ajax-search-pro'); ?></legend>
            <?php include(ASP_PATH."backend/tabs/instance/general/mobile_behavior.php"); ?>
        </fieldset>
    </div>
    <div tabid="103">
        <fieldset>
            <legend><?php echo __('Image Options', 'ajax-search-pro'); ?></legend>
            <?php include(ASP_PATH."backend/tabs/instance/general/image_options.php"); ?>
        </fieldset>
    </div>
    <div tabid="104">
        <fieldset>
            <legend><?php echo __('BuddyPress Options', 'ajax-search-pro'); ?></legend>
            <?php include(ASP_PATH."backend/tabs/instance/general/buddypress_options.php"); ?>
        </fieldset>
    </div>
    <div tabid="108">
        <fieldset>
            <legend><?php echo __('User Search', 'ajax-search-pro'); ?></legend>
            <?php include(ASP_PATH."backend/tabs/instance/general/user_search.php"); ?>
        </fieldset>
    </div>
    <div tabid="105">
        <fieldset>
            <legend><?php echo __('Sources 2', 'ajax-search-pro'); ?></legend>
            <?php include(ASP_PATH."backend/tabs/instance/general/sources2.php"); ?>
        </fieldset>
    </div>
    <div tabid="111">
        <fieldset>
            <legend><?php echo __('Limits', 'ajax-search-pro'); ?></legend>
            <?php include(ASP_PATH."backend/tabs/instance/general/limits.php"); ?>
        </fieldset>
    </div>
    <?php if ( class_exists('PeepSoGroup') ): ?>
    <div tabid="112">
        <?php include(ASP_PATH."backend/tabs/instance/general/peepso.php"); ?>
    </div>
    <?php endif; ?>
    <div tabid="107">
        <?php include(ASP_PATH."backend/tabs/instance/general/ordering.php"); ?>
    </div>
    <div tabid="113">
        <?php include(ASP_PATH."backend/tabs/instance/general/grouping.php"); ?>
    </div>
	<div tabid="109">
		<fieldset>
			<legend><?php echo __('Attachment Search', 'ajax-search-pro'); ?></legend>
			<?php include(ASP_PATH."backend/tabs/instance/general/attachment_results.php"); ?>
		</fieldset>
	</div>
</div>
<div class="item">
    <input name="reset_<?php echo $search['id']; ?>" class="asp_submit asp_submit_transparent asp_submit_reset" type="button" value="<?php echo esc_attr__('Restore defaults', 'ajax-search-pro'); ?>">
    <input name="submit_<?php echo $search['id']; ?>" type="submit" value="<?php echo esc_attr__('Save all tabs!', 'ajax-search-pro'); ?>" />
</div>