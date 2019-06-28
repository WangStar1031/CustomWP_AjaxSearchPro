<?php if ( $_st['fe_reset_button'] == 1 || $_st['fe_search_button'] == 1 ): ?>
<fieldset class="asp_s_btn_container">
    <div class="asp_sr_btn_flex">
        <?php if ( $_st['fe_reset_button'] == 1 && $_st['fe_rb_position'] == 'before' ): ?>
        <div class="asp_r_btn_div">
            <button class="asp_reset_btn asp_r_btn"><?php echo asp_icl_t('Reset button ('.$real_id.')', $_st['fe_rb_text']); ?></button>
        </div>
        <?php endif; ?>

        <?php if ( $_st['fe_search_button'] == 1 ): ?>
        <div class="asp_s_btn_div">
            <button class="asp_search_btn asp_s_btn"><?php echo asp_icl_t('Search button ('.$real_id.')', $_st['fe_sb_text']); ?></button>
        </div>
        <?php endif; ?>

        <?php if ( $_st['fe_reset_button'] == 1 && $_st['fe_rb_position'] == 'after' ): ?>
        <div class="asp_r_btn_div">
            <button class="asp_reset_btn asp_r_btn"><?php echo asp_icl_t('Reset button ('.$real_id.')', $_st['fe_rb_text']); ?></button>
        </div>
        <?php endif; ?>
    </div>
</fieldset>
<?php endif; ?>