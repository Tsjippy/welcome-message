<?php

namespace TSJIPPY\WELCOMEMESSAGE;

if (! defined('ABSPATH')) exit;

add_action('init', __NAMESPACE__ . '\blockInit');
function blockInit()
{
    register_block_type(
        'tsjippy-welcome-message/show_message',
        array(
            'title'            => __( 'Show Welcome Message', 'tsjippy' ),
            'render_callback'  => __NAMESPACE__ . '\welcomeMessage',
            'supports'         => array(
                'autoRegister' => true,
            ),
            'icon'  => 'text'
        )
    );
}
