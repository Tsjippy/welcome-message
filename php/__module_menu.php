<?php
namespace SIM\WELCOMEMESSAGE;
use SIM;

const MODULE_VERSION		= '8.0.5';

DEFINE(__NAMESPACE__.'\MODULE_PATH', plugin_dir_path(__DIR__));

//module slug is the same as grandparent folder name
DEFINE(__NAMESPACE__.'\MODULE_SLUG', strtolower(basename(dirname(__DIR__))));

add_filter('sim_submenu_welcomemessage_options', __NAMESPACE__.'\moduleOptions', 10, 2);
function moduleOptions($optionsHtml, $settings){
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
			'textarea_name' 			=> "welcome-message",
			'textarea_rows' 			=> 10
		);

		echo wp_editor(
			$settings["welcome-message"],
			"welcome-message",
			$tinyMceSettings
		);
		?>
	</label>

	<?php
	return $optionsHtml.ob_get_clean();
}