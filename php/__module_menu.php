<?php
namespace SIM\WELCOMEMESSAGE;
use SIM;

const MODULE_VERSION		= '8.0.2';

DEFINE(__NAMESPACE__.'\MODULE_PATH', plugin_dir_path(__DIR__));

//module slug is the same as grandparent folder name
DEFINE(__NAMESPACE__.'\MODULE_SLUG', strtolower(basename(dirname(__DIR__))));

add_filter('sim_submenu_options', __NAMESPACE__.'\moduleOptions', 10, 3);
function moduleOptions($optionsHtml, $moduleSlug, $settings){
	//module slug should be the same as grandparent folder name
	if($moduleSlug != MODULE_SLUG){
		return $optionsHtml;
	}

	ob_start();

	?>
	<label>
		Welcome message on homepage
		<?php
		$tinyMceSettings = array(
			'wpautop' 					=> false,
			'media_buttons' 			=> false,
			'forced_root_block' 		=> true,
			'convert_newlines_to_brs'	=> true,
			'textarea_name' 			=> "welcome_message",
			'textarea_rows' 			=> 10
		);

		echo wp_editor(
			$settings["welcome_message"],
			"welcome_message",
			$tinyMceSettings
		);
		?>
	</label>

	<?php
	return ob_get_clean();
}