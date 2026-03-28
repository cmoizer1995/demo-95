<?php

function hello_elementor_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'hello_elementor_setup');

function hello_register_sidebar() {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'hello_register_sidebar');

function hello_customize_register($wp_customize) {

    $wp_customize->add_section('hello_sidebar_section', array(
        'title' => 'Sidebar Settings',
        'priority' => 30,
    ));

    $wp_customize->add_setting('hello_sidebar_enable', array(
        'default' => 'yes',
    ));

    $wp_customize->add_control('hello_sidebar_enable', array(
        'label' => 'Enable Sidebar',
        'section' => 'hello_sidebar_section',
        'type' => 'select',
        'choices' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
    ));

    $wp_customize->add_setting('hello_sidebar_position', array(
        'default' => 'right',
    ));

    $wp_customize->add_control('hello_sidebar_position', array(
        'label' => 'Sidebar Position',
        'section' => 'hello_sidebar_section',
        'type' => 'select',
        'choices' => array(
            'left' => 'Left',
            'right' => 'Right',
        ),
    ));

    $wp_customize->add_setting('hello_sidebar_placement', array(
        'default' => 'under-header',
    ));

    $wp_customize->add_control('hello_sidebar_placement', array(
        'label' => 'Sidebar Placement',
        'section' => 'hello_sidebar_section',
        'type' => 'select',
        'choices' => array(
            'under-header' => 'Under Header',
            'above-footer' => 'Above Footer',
        ),
    ));
}
add_action('customize_register', 'hello_customize_register');
