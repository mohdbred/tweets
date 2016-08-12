<div class="box">
    <div class="heading">
        <h1><img alt="" src="<?php echo theme_url('assets/images/setting.png'); ?>"> General Settings</h1>

        <div class="buttons">
            <a class="button" href="#" onClick="$('#settings_form').submit();"><span>Save</span></a>
        </div>
    </div>
    <div class="content">

        <?php echo form_open(null, 'id="settings_form"'); ?>
        <div class="tabs">
            <!-- General Tab -->
            <div id="general-tab">
                <div class="form">
                    <div>
                        <?php echo form_label('<span class="required">*</span> Site Name:', 'sitename'); ?>
                        <?php echo form_input(array('name' => 'site_name', 'id' => 'sitename', 'value' => set_value('site_name', isset($Settings->site_name->value) ? $Settings->site_name->value : ''))); ?>
                    </div>
                    <div>
                        <?php echo form_label('Site Logo:', 'sitelogo'); ?>
                        <?php echo base_url('themes').DIRECTORY_SEPARATOR.$Settings->theme->value.'/assets/images/'.form_input(array('name' => 'site_logo', 'id' => 'sitelogo', 'value' => set_value('site_logo', isset($Settings->site_logo->value) ? $Settings->site_logo->value : ''))); ?>
                    </div>
                    <div>
                        <?php echo form_label('<span class="required">*</span> Notification Email :', 'notification_email'); ?>
                        <?php echo form_input(array('name' => 'notification_email', 'id' => 'notification_email', 'value' => set_value('notification_email', isset($Settings->notification_email->value) ? $Settings->notification_email->value : ''))); ?>
                    </div>
                    <div>
                        <?php echo form_label('<span class=""></span> Notification Email 2:', 'notification_email2'); ?>
                        <?php echo form_input(array('name' => 'notification_email2', 'id' => 'notification_email2', 'value' => set_value('notification_email2', isset($Settings->notification_email2->value) ? $Settings->notification_email2->value : ''))); ?>
                    </div>
                    <div>
                        <?php echo form_label('<span class="required">*</span> Site Homepage:', 'site_homepage'); ?>
                        <?php  echo form_dropdown('content[site_homepage]', option_array_value($Entries, 'id', 'title'), set_value('site_homepage', isset($Settings->site_homepage->value) ? $Settings->site_homepage->value : '')); ?>
                    </div>
                    <div>
                        <?php echo form_label('<span class="required">*</span> Custom 404:', 'custom_404'); ?>
                        <?php  echo form_dropdown('content[custom_404]', option_array_value($Entries, 'id', 'title'), set_value('custom_404', isset($Settings->custom_404->value) ? $Settings->custom_404->value : '')); ?>
                    </div>
                    <div>
                        <?php echo form_label('<span class="required">*</span> Theme:', 'theme'); ?>
                        <?php  echo form_dropdown('theme', $themes, set_value('theme', isset($Settings->theme->value) ? $Settings->theme->value : ''), 'id="theme"'); ?>
                    </div><!--
                    <div>
                        <?php echo form_label('<span class="required">*</span> Default Layout:', 'layout'); ?>
                        <?php  echo form_dropdown('layout', $layouts, set_value('layout', isset($Settings->layout->value) ? $Settings->layout->value : ''), 'id="theme_layout"'); ?>
                        <span id="layout_ex" class="ex"></span>
                    </div>
                    <div>
                        <?php echo form_label('Content Editor\'s Stylesheet:<span class="help">Enables you to specify a CSS file to extend CKEidtor\'s and TinyMCE\'s default theme and provide custom classes for the styles dropdown.</span>', 'editor_stylesheet'); ?>
                        <span id="editor_stylesheet_path"><?php echo base_url('themes/' . $this->settings->theme) . '/'; ?></span> <?php echo form_input(array('name' => 'editor_stylesheet', 'id' => 'editor_stylesheet', 'value' => set_value('editor_stylesheet', isset($Settings->editor_stylesheet->value) ? $Settings->editor_stylesheet->value : ''))); ?>
                    </div>
                    <div>
                        <?php echo form_label('<span class="required">*</span> Admin Toolbar:', 'enable_admin_toolbar'); ?>
                        <span>
                            <label><?php echo form_radio(array('name' => 'enable_admin_toolbar', 'value' => '1', 'checked' => set_radio('enable_admin_toolbar', '1', ( ! empty($Settings->enable_admin_toolbar->value)) ? TRUE : FALSE))); ?> Yes</label>
                            <label><?php echo form_radio(array('name' => 'enable_admin_toolbar', 'value' => '0', 'checked' => set_radio('enable_admin_toolbar', '0', (empty($Settings->enable_admin_toolbar->value)) ? TRUE : FALSE))); ?> No</label>
                        </span>
                    </div>-->
                    <div>
                        <?php echo form_label('<span class="required">*</span> Frontend Pagination Count:', 'pagination_count'); ?>
                        <?php echo form_input(array('name' => 'pagination_count', 'id' => 'pagination_count', 'value' => set_value('pagination_count', isset($Settings->pagination_count->value) ? $Settings->pagination_count->value : ''))); ?>
                    </div>
                    <?php if ($this->Group_session->type == SUPER_ADMIN): ?>
<!--                    <div>
                        <?php echo form_label('<span class="required">*</span> Suspend Site:', 'suspend'); ?>
                        <span>
                            <label><?php echo form_radio(array('name' => 'suspend', 'value' => '1', 'checked' => set_radio('suspend', '1', ( ! empty($Settings->suspend->value)) ? TRUE : FALSE))); ?> Yes</label>
                            <label><?php echo form_radio(array('name' => 'suspend', 'value' => '0', 'checked' => set_radio('suspend', '0', (empty($Settings->suspend->value)) ? TRUE : FALSE))); ?> No</label>
                        </span>
                    </div>-->
                    <?php endif; ?>
                </div>
            </div>
            <!-- Users Tab -->
            <div id="users-tab">
                <div class="form">
                    <div>
                        <?php echo form_label('<span class="required">*</span> Default User Group:', 'default_group'); ?>
                        <?php  echo form_dropdown('users[default_group]', option_array_value($Groups, 'id', 'name'), set_value('default_group', isset($Settings->default_group->value) ? $Settings->default_group->value : '')); ?>
                    </div>
                    <div>
                        <?php echo form_label('<span class="required">*</span> User Registration:', 'enable_registration'); ?>
                        <span>
                            <label><?php echo form_radio(array('name' => 'users[enable_registration]', 'value' => '1', 'checked' => set_radio('enable_registration', '1', ( ! empty($Settings->enable_registration->value)) ? TRUE : FALSE))); ?> Enabled</label>
                            <label><?php echo form_radio(array('name' => 'users[enable_registration]', 'value' => '0', 'checked' => set_radio('enable_registration', '0', (empty($Settings->enable_registration->value)) ? TRUE : FALSE))); ?> Disabled</label>
                        </span>
                    </div>
                    <div>
                        <?php echo form_label('<span class="required">*</span> Require Email Activation:', 'email_activation'); ?>
                        <span>
                            <label><?php echo form_radio(array('name' => 'users[email_activation]', 'value' => '1', 'checked' => set_radio('email_activation', '1', ( ! empty($Settings->email_activation->value)) ? TRUE : FALSE))); ?> Enabled</label>
                            <label><?php echo form_radio(array('name' => 'users[email_activation]', 'value' => '0', 'checked' => set_radio('email_activation', '0', (empty($Settings->email_activation->value)) ? TRUE : FALSE))); ?> Disabled</label>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>

<?php js_start(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $( ".tabs" ).tabs();

        $('#theme').change( function() {

            $('#theme_layout').html('');
            $('#layout_ex').html('Loading Layouts...');

            $.post('<?php echo site_url(ADMIN_PATH . '/settings/general-settings/theme-ajax'); ?>', {theme: $('#theme').val()}, function(response) {
                if (response.status == 'OK')
                {
                    $.each(response.layouts, function(i , val) {
                        $('#theme_layout').append('<option value="' + val + '">' + val + '</option>');
                    });
                    $('#layout_ex').html('');
                }
                else
                {
                    $('#layout_ex').html(response.message);
                }
            }, 'json');

            $('#editor_stylesheet_path').html('<?php echo base_url('themes/') . '/'; ?>' + $('#theme').val() + '/');
        });
    });
</script>
<?php js_end(); ?>