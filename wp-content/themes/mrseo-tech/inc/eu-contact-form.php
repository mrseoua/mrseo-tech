<?php if(!defined('ABSPATH')) exit; ?>
<div class="eu-form-panel">
<?php $status=isset($_GET['message_status'])?sanitize_key(wp_unslash($_GET['message_status'])):'';if(in_array($status,array('sent','invalid','error'),true)){$msg=array('sent'=>$ui[12],'invalid'=>$ui[13],'error'=>$ui[14]);echo '<p class="eu-message-status" role="status">'.esc_html($msg[$status]).'</p>';}?>
<form action="<?php echo esc_url(admin_url('admin-post.php'));?>" method="post">
<input type="hidden" name="action" value="mrseo_contact"><?php wp_nonce_field('mrseo_contact_submit','mrseo_nonce');?>
<input type="hidden" name="mrseo_lang" value="<?php echo esc_attr($lang);?>">
<label for="eu-name"><?php echo esc_html($ui[7]);?> *</label><input id="eu-name" name="contact_name" autocomplete="name" maxlength="90" required>
<label for="eu-email"><?php echo esc_html($ui[8]);?> *</label><input id="eu-email" name="contact_email" type="email" maxlength="180" autocomplete="email" required>
<label for="eu-site"><?php echo esc_html($ui[9]);?></label><input id="eu-site" name="contact_site" type="url" maxlength="300">
<label for="eu-text"><?php echo esc_html($ui[10]);?> *</label><textarea id="eu-text" name="contact_message" minlength="10" maxlength="3000" rows="6" required></textarea>
<div class="eu-trap" aria-hidden="true"><input name="contact_company_extra" autocomplete="off" tabindex="-1"></div>
<?php mrseo_privacy_form_notice();?>
<button class="eu-button" type="submit"><?php echo esc_html($ui[11]);?></button>
</form></div>
