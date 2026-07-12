<?php

namespace TSJIPPY\WELCOMEMESSAGE;

use TSJIPPY;

use function TSJIPPY\addRawHtml;

if (! defined('ABSPATH')) {
    exit;
}

class AdminMenu extends TSJIPPY\ADMIN\SubAdminMenu
{

    /**
     * AdminMenu constructor.
     *
     * @param array $settings The settings for the plugin
     * @param string $name The name of the plugin
     */
    /**
     * AdminMenu constructor.
     *
     * @param array $settings The settings for the plugin
     * @param string $name The name of the plugin
     */
    public function __construct($settings, $name)
    {
        parent::__construct($settings, $name);
    }

    /**
     * Add the settings page to the admin menu
     *
     * @param string $parent The parent menu slug
     * @return bool True if the settings page was added, false otherwise
     */
    public function settings($parent)
    {
        ob_start();

        ?>
        <block style='margin-bottom: -30px;'>
            Welcome message on homepage
        </block>
        <?php
        
        $tinyMceSettings = array(
            'wpautop'                     => false,
            'media_buttons'             => false,
            'forced_root_block'         => true,
            'convert_newlines_to_brs'    => true,
            'textarea_name'             => "welcome-message",
            'textarea_rows'             => 10
        );

        wp_editor(
            $this->settings["welcome-message"],
            "welcome-message",
            $tinyMceSettings
        );

        addRawHtml(ob_get_clean(), $parent);

        return true;
    }

    /**
     * Function to display the emails page
     *
     * @param   string  $parent The parent menu slug
     * 
     * @return  bool            True if the emails page was displayed, false otherwise
     */
    public function emails($parent)
    {
        return false;
    }

    /**
     * Add the data page to the admin menu
     *
     * @param string $parent The parent menu slug
     * 
     * @return bool True if the data page was added, false otherwise
     */
    public function data($parent = '')
    {

        return false;
    }

    /**
     * Add the functions page to the admin menu
     *
     * @param string $parent The parent menu slug
     * 
     * @return bool True if the functions page was added, false otherwise
     */
    public function functions($parent)
    {

        return false;
    }
}
