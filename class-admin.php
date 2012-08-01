<?php

function wpb_fbrec_defaults()
{
	update_option('wpb_fbrec', array	(
		'appID' 	=> '',
		'fbml' 		=> '1',
		'posts' 	=> '1',
		'pages'    	=> '1',
		'lang' 		=> 'en_US',
		'readtime' 	=> '30',
		'verb'		=> 'like',
		'num'    	=> '2',
		'side'    	=> 'right',
		)
	  );
}


add_action('admin_init', 'wpb_fbrec_init' );
function wpb_fbrec_init(){
	register_setting( 'wpb_fbrec_options', 'wpb_fbrec');
}

add_action('admin_menu', 'show_wpb_fbrec_options');
function show_wpb_fbrec_options() {
	add_options_page('Facebook Recommendations Bar Options', 'Facebook Recommendations Bar', 'manage_options', 'wpb_fbrec', 'wpb_fbrec_options');
}

// ADMIN PAGE
function wpb_fbrec_options() {
?>
	<div class="wrap">
		<h2>Facebook Recommendations Bar Options</h2>
		<form method="post" action="options.php">
			<?php settings_fields('wpb_fbrec_options'); ?>
			<?php $options = get_option('wpb_fbrec'); ?>


			<h3 class="title">Main Settings</h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="appID">Facebook App ID</label></th>
					<td><input id="appID" type="text" name="wpb_fbrec[appID]" value="<?php echo $options['appID']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="fbml">Enable FBML</label></th>
					<td><input id="fbml" name="wpb_fbrec[fbml]" type="checkbox" value="1" <?php checked('1', $options['fbml']); ?> /> <small>only disable this if you already have XFBML enabled elsewhere</small></td>
				</tr>
			</table>

			<h3 class="title">Display Settings</h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="posts">Posts</label></th>
					<td><input id="posts" name="wpb_fbrec[posts]" type="checkbox" value="1" <?php checked('1', $options['posts']); ?> /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="pages">Pages</label></th>
					<td><input id="pages" name="wpb_fbrec[pages]" type="checkbox" value="1" <?php checked('1', $options['pages']); ?> /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="lang">Language</label></th>
					<td><input id="lang" type="text" name="wpb_fbrec[lang]" value="<?php echo $options['lang']; ?>" /> <small>default is <strong>en_US</strong>. XML file of available variables are <a href="http://www.facebook.com/translations/FacebookLocales.xml" target="_blank">here</a></small></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="verb">Verb</label></th>
					<td>
						<select name="wpb_fbrec[verb]">
							  <option value="like"<?php if ($options['verb'] == 'like') { echo ' selected="selected"'; } ?>>Like</option>
							  <option value="recommend"<?php if ($options['verb'] == 'recommend') { echo ' selected="selected"'; } ?>>Recommend</option>
						</select>
					</td>
				</tr>
				<tr valign="top"><th scope="row"><label for="readtime">Read time (seconds)</label></th>
					<td><input id="readtime" type="text" name="wpb_fbrec[readtime]" value="<?php echo $options['readtime']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="num">Number of Recommendations</label></th>
					<td><input id="num" type="text" name="wpb_fbrec[num]" value="<?php echo $options['num']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="side">Which Side to Appear</label></th>
					<td>
						<select name="wpb_fbrec[side]">
							  <option value="right"<?php if ($options['side'] == 'right') { echo ' selected="selected"'; } ?>>Right</option>
							  <option value="left"<?php if ($options['side'] == 'left') { echo ' selected="selected"'; } ?>>Left</option>
						</select>
					</td>
				</tr>
			</table>

			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}

?>