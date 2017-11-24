<?php 
/**
 * Plugin name: Box e Olho.
 * Description: Gera marcarção no editor para estilizar <div> com as classes "olho" e "box" .
 * Version: 1.0
 * Plugin URI: https://github.com/andrekeher/wp-box-e-olho
 * Author: André Keher
 * Author URI: https://github.com/andrekeher
 */

class CustomTinyMCE
{
    public function __construct()
    {
        $file = 'editor-style.css';
        if (file_exists($editorStyle))
        {
            add_editor_style(get_template_directory_uri() . '/' . $file);
        }

        add_filter('mce_buttons_2', array($this, 'tinymce_buttons'));
        add_filter('tiny_mce_before_init', array($this, 'tinymce_settings'));
    }

    function tinymce_buttons($buttons)
    {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }

    public function tinymce_settings($settings)
    {
        $style_formats = array(
            array(
                'title' => 'Box',
                'block' => 'div',
                'classes' => array('box'),
                'wrapper' => true,
                ),
            array(
                'title' => 'Olho',
                'block' => 'div',
                'classes' => array('olho'),
                'wrapper' => true,
                ),
            );

        $settings['style_formats'] = json_encode($style_formats);
        return $settings;
    }
}
$objCTMCE = new CustomTinyMCE();