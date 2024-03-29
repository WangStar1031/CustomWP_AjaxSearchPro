<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

if (ASP_DEMO) $_POST = null;
?>
<style>
    #wpdreams .asp_maintenance ul {
        list-style-type: disc;
        margin-bottom: 10px;
    }
    #wpdreams .asp_maintenance ul li {
        list-style-type: disc;
        margin-left: 30px;
        margin-top: 10px;
    }
</style>
<link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'settings/assets/options_search.css?v='.ASP_CURR_VER; ?>" />
<div id="wpdreams" class='wpdreams wrap<?php echo isset($_COOKIE['asp-accessibility']) ? ' wd-accessible' : ''; ?>'>
	<?php if ( wd_asp()->updates->needsUpdate() ): ?>
        <p class='infoMsgBox'>
            <?php echo sprintf( __('Version <strong>%s</strong> is available.', 'ajax-search-pro'),
                wd_asp()->updates->getVersionString() ); ?>
            <?php echo __('Download the new version from Codecanyon.', 'ajax-search-pro'); ?>
            <a target="_blank" href="https://documentation.ajaxsearchpro.com/update_notes.html">
                <?php echo __('How to update?', 'ajax-search-pro'); ?>
            </a>
        </p>
	<?php endif; ?>
    <div class="wpdreams-box asp_maintenance" style="float: left;">
        <?php if (ASP_DEMO): ?>
            <p class="infoMsg"><strong>DEMO MODE ENABLED</strong> - Please note, that these options are read-only!</p>
        <?php endif; ?>
        <div id='asp_i_success' class="infoMsg<?php echo isset($_POST['asp_mnt_msg']) ? '' : ' hiddend'; ?>">
            <?php echo isset($_POST['asp_mnt_msg']) ? esc_html(strip_tags($_POST['asp_mnt_msg'])) : ''; ?>
        </div>
        <div id='asp_i_error' class="errorMsg hiddend"></div>
        <textarea id="asp_i_error_cont" class="hiddend"></textarea>

        <form name="asp_reset_form" id="asp_reset_form" action="maintenance.php" method="POST">
            <fieldset>
                <legend><?php echo __('Maintencance -  Reset', 'ajax-search-pro'); ?></legend>
                <p>
                    <?php echo __('This option will reset all the plugin options to the defaults. Use this option if you want to keep using the plugin, but you need to reset the default options.', 'ajax-search-pro'); ?>
                <ul>
                    <li><?php echo __('All plugin options <strong>will</strong> reset to defaults (caching, compatibility, index table and statistics options)', 'ajax-search-pro'); ?></li>
                    <li><?php echo __('The search instance options <strong>will not</strong> be changed', 'ajax-search-pro'); ?></li>
                    <li><?php echo __('The database tables, contents and the files <strong>will not</strong> be deleted either.', 'ajax-search-pro'); ?></li>
                </ul>
                </p>
                <div style="text-align: center;">
                    <?php if (ASP_DEMO): ?>
                        <input type="button" name="asp_reset" id="asp_reset" class="submit wd_button_green" value="<?php echo esc_attr__('Reset all options to defaults', 'ajax-search-pro'); ?>" disabled>
                    <?php else: ?>
                        <input type="hidden" name="asp_reset_nonce" id="asp_reset_nonce" value="<?php echo wp_create_nonce( "asp_reset_nonce" ); ?>">
                        <input type="button" name="asp_reset" id="asp_reset" class="submit wd_button_green" value="<?php echo esc_attr__('Reset all options to defaults', 'ajax-search-pro'); ?>">
                        <span class="loading-small hiddend"></span>
                    <?php endif; ?>
                </div>
            </fieldset>
        </form>
        <form name="asp_wipe_form" id="asp_wipe_form" action="maintenance.php" method="POST">
            <fieldset>
                <legend><?php echo __('Maintencance -  Wipe & Deactivate', 'ajax-search-pro'); ?></legend>
                <p><?php echo __('This option will wipe everything related to Ajax Search Pro, as if it was never installed. Use this if you don\'t want to use the plugin anymore, or if you want to perform a clean installation.', 'ajax-search-pro'); ?>
                <ul>
                    <li><?php echo __('All plugin options <strong>will be deleted</strong>', 'ajax-search-pro'); ?></li>
                    <li><?php echo __('The search instances <strong>will be deleted</strong>', 'ajax-search-pro'); ?></li>
                    <li><?php echo __('The database tables and the files <strong>will be deleted</strong>', 'ajax-search-pro'); ?></li>
                    <li><?php echo __('The plugin <strong>will deactivate</strong> and redirect to the plugin manager screen after, where you can delete it or re-install it again.', 'ajax-search-pro'); ?></li>
                </ul>
                </p>
                <div style="text-align: center;">
                    <?php if (ASP_DEMO): ?>
                        <input type="button" name="asp_wipe" id="asp_wipe" class="submit" value="<?php echo esc_attr__('Wipe all plugin data & deactivate Ajax Search Pro', 'ajax-search-pro'); ?>" disabled>
                    <?php else: ?>
                        <input type="hidden" name="asp_wipe_nonce" id="asp_wipe_nonce" value="<?php echo wp_create_nonce( "asp_wipe_nonce" ); ?>">
                        <input type="button" name="asp_wipe" id="asp_wipe" class="submit" value="<?php echo esc_attr__('Wipe all plugin data & deactivate Ajax Search Pro', 'ajax-search-pro'); ?>">
                        <span class="loading-small hiddend"></span>
                    <?php endif; ?>
                </div>
            </fieldset>
        </form>
        <form name="asp_empty_redirect"id="asp_empty_redirect" method="post" style="display: none;">
            <input type="hidden" name="asp_mnt_msg" value="">
        </form>
    </div>
    <div id="asp-options-search">
        <a class="wd-accessible-switch" href="#"><?php echo isset($_COOKIE['asp-accessibility']) ?
                __('DISABLE ACCESSIBILITY', 'ajax-search-pro') :
                __('ENABLE ACCESSIBILITY', 'ajax-search-pro'); ?></a>
    </div>
    <div class="clear"></div>
</div>
<?php
if (!ASP_DEMO) {
    $media_query = ASP_DEBUG == 1 ? asp_gen_rnd_str() : get_option("asp_media_query", "defn");
    wp_enqueue_script('asp-backend-maintenance', plugin_dir_url(__FILE__) . 'settings/assets/maintenance.js', array(
        'jquery'
    ), $media_query, true);
    wp_localize_script('asp-backend-maintenance', 'ASP_MNT', array(
        "admin_url" => admin_url(),
        "msg_res" => __('Are you sure you want to reset Ajax Search Pro to it\'s default state? All search instances will be deleted!', 'ajax-search-pro'),
        "msg_rem" => __('Are you sure you want to completely remove Ajax Search Pro? (including instances, database content etc..)', 'ajax-search-pro'),
        "msg_suc" => __('<strong>SUCCESS! </strong>Refreshing this page, please wait..', 'ajax-search-pro'),
        "msg_ssc" => __('SUCCESS:', 'ajax-search-pro'),
        "msg_fal" => __('FAILURE:', 'ajax-search-pro'),
        "msg_err" => __('Something went wrong. Response returned:', 'ajax-search-pro'),
        "msg_tim" => __('Timeout error. Please try again!', 'ajax-search-pro')
    ));
}
