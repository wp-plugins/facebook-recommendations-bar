<?php

function wpb_fbmlsetup() {
$options = get_option('wpb_fbrec');
if ($options['fbml'] == '1') {
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo $options['lang']; ?>/all.js#xfbml=1&appId=<?php echo $options['appID']; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php }}
add_action('wp_head', 'wpb_fbmlsetup', 100);




//COMMENT BOX
function wpb_fbrec($content) {
	$options = get_option('wpb_fbrec');
	if ((is_single() && $options['posts'] == '1') ||
      (is_page() && $options['pages'] == '1') ||
      ((is_home() || is_front_page()) && $options['home'] == '1')) {
		$content .= "<!-- Facebook Recommendations Bar for WordPress: http://3doordigital.com/wordpress/plugins/facebook-recommendations-bar/ -->
		<div class=\"fb-recommendations-bar\" data-href=\"".get_permalink()."\" data-read-time=\"".$options['readtime']."\" data-side=\"".$options['side']."\" data-action=\"".$options['verb']."\"></div>";
     }
return $content;
}
add_filter ('the_content', 'wpb_fbrec', 1);
?>