<?php
/**
 * Created by PhpStorm.
 * User: Gourav
 * Date: 2/3/2018
 * Time: 10:58 AM
 */
function kurama_customize_register_social( $wp_customize ) {
// Social Icons
$wp_customize->add_section('kurama_social_section', array(
    'title' => __('Social Icons','kurama'),
    'priority' => 44 ,
    'panel'   => 'kurama_header_panel'
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','kurama'),
    'facebook' => __('Facebook','kurama'),
    'twitter' => __('Twitter','kurama'),
    'google-plus' => __('Google Plus','kurama'),
    'instagram' => __('Instagram','kurama'),
    'rss' => __('RSS Feeds','kurama'),
    'vine' => __('Vine','kurama'),
    'vimeo-square' => __('Vimeo','kurama'),
    'youtube' => __('Youtube','kurama'),
    'flickr' => __('Flickr','kurama'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'kurama_social_'.$x, array(
        'sanitize_callback' => 'kurama_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'kurama_social_'.$x, array(
        'settings' => 'kurama_social_'.$x,
        'label' => __('Icon ','kurama').$x,
        'section' => 'kurama_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'kurama_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'kurama_social_url'.$x, array(
        'settings' => 'kurama_social_url'.$x,
        'description' => __('Icon ','kurama').$x.__(' Url','kurama'),
        'section' => 'kurama_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function kurama_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'kurama_customize_register_social' );