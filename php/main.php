<?php

namespace TSJIPPY\WELCOMEMESSAGE;

use TSJIPPY;


//Shortcode for the welcome message on the homepage
add_shortcode("tsjippy_welcome", __NAMESPACE__ . '\welcomeMessage');
function welcomeMessage()
{
    if (is_user_logged_in()) {
        $userId = get_current_user_id();

        //Check if welcome message needs to be shown
        if (empty(get_user_meta($userId, 'tsjippy_welcomemessage', true))) {
            wp_enqueue_script('tsjippy_welcome_script', TSJIPPY\pathToUrl(PLUGINPATH . 'js/message.js'), [], PLUGINVERSION, true);

            $welcomeMessage = SETTINGS['welcome-message'] ?? false;
            if (!empty($welcomeMessage)) {
                //Html
                $html = '<div id="welcome-message">';
                $html .= do_shortcode($welcomeMessage);
                $html .= '<button type="button" class="button" id="welcome-message-button">Do not show again</button>';
                $html .= '</div>';
                return $html;
            }
        }
    }

    return '';
}
