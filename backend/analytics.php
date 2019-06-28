<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

$ana_options = wd_asp()->o['asp_analytics'];
$_comp = wpdreamsCompatibility::Instance();

if (ASP_DEMO) $_POST = null;
?>
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

    <?php if ( $_comp->has_errors() ): ?>
        <div class="wpdreams-box errorbox">
            <p class='errors'>
            <?php echo sprintf( __('Possible incompatibility! Please go to the
                 <a href="%s">error check</a> page to see the details and solutions!', 'ajax-search-pro'),
                get_admin_url() . 'admin.php?page=asp_compatibility_settings'
            ); ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="wpdreams-box" style="float:left;">
        <?php ob_start(); ?>
        <div class="item">
            <?php $o = new wpdreamsYesNo("analytics", __('Enable search Google Analytics integration?', 'ajax-search-pro'), $ana_options["analytics"]); ?>
        </div>
        <div class="item">
            <?php $o = new wpdreamsText("analytics_string", __('Google analytics pageview string', 'ajax-search-pro'), $ana_options["analytics_string"]); ?>
            <p class='infoMsg'>
                <?php echo __('This is how the pageview will look like on the google analytics website. Use the {asp_term} variable to add the search term to the pageview.', 'ajax-search-pro'); ?>
            </p>
        </div>
        <div class="item">
            <input type='submit' class='submit' value='<?php echo esc_attr__('Save options', 'ajax-search-pro'); ?>'/>
        </div>
        <?php $_r = ob_get_clean(); ?>

        <?php
        $updated = false;
        if (isset($_POST) && isset($_POST['asp_analytics']) && (wpdreamsType::getErrorNum()==0)) {
            $values = array(
                "analytics" => $_POST['analytics'],
                "analytics_string" => $_POST['analytics_string']
            );
            update_option('asp_analytics', $values);
            asp_parse_options();
            $updated = true;
        }
        ?>

        <div class='wpdreams-slider'>
            <?php if (ASP_DEMO): ?>
                <p class="infoMsg">
                    DEMO MODE ENABLED - Please note, that these options are read-only
                </p>
            <?php endif; ?>
            <form name='asp_analytics1' method='post'>
                <?php if($updated): ?>
                    <div class='successMsg'>
                    <?php echo __('Analytics options successfuly updated!', 'ajax-search-pro'); ?>
                    </div>
                <?php endif; ?>
                <fieldset>
                    <legend><?php echo __('Analytics options', 'ajax-search-pro'); ?></legend>
                    <?php print $_r; ?>
                    <input type='hidden' name='asp_analytics' value='1' />
                </fieldset>
                <fieldset>
                    <legend><?php echo __('Result', 'ajax-search-pro'); ?></legend>
                    <p class='infoMsg'>
                        <?php echo __('After some time you should be able to see the hits on your analytics board.', 'ajax-search-pro'); ?>
                    </p>
                    <img src="http://i.imgur.com/s7BXiPV.png">
                </fieldset>
            </form>
        </div>
    </div>
    <div id="asp-options-search">
        <a class="wd-accessible-switch" href="#"><?php echo isset($_COOKIE['asp-accessibility']) ?
                __('DISABLE ACCESSIBILITY', 'ajax-search-pro') :
                __('ENABLE ACCESSIBILITY', 'ajax-search-pro'); ?></a>
    </div>
    <div class="clear"></div>
</div>