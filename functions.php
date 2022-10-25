<?php

function hamburger_setup()
{
    // add_filter('show_admin_bar', '__return_false');   //ツールバーの非表示
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caotion',
    ));
    add_theme_support('post-thumbnails'); //アイキャッチ機能の有効化
    add_theme_support('title-tag');   //ページごとのタイトル取得
    add_theme_support( 'automatic-feed-links' ); //フェード(Theme Check必須)
    add_image_size('archive_thumbnail',920,690,true);   //画像サイズ指定
    add_image_size('main_thumbnail',1920,1080,true);   //画像サイズ指定
    register_nav_menus(array(
        'footer_nav' => esc_html__('footer navigation', 'rtbread'),
        'category_nav' => esc_html__('category navigation', 'rtbread'),
    ));
}
add_action('after_setup_theme', 'hamburger_setup');



//jQuery読み込み
function hamburger_enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'hamburger-menu',
        get_template_directory_uri() . '/js/js-menu.js',
        array(),
        '1.0.0',
        true
    );
};
add_action('wp_enqueue_scripts', 'hamburger_enqueue_scripts');

//css読み込み
function hamburger_css(){
    //リセットcss読み込み
    wp_enqueue_style(
        'reset-css',
        get_template_directory_uri() .'/css/destyle.min.css',
        array(),
        ''
    );
    //GoogleFont読み込み
    wp_enqueue_style(
        'googlefonts',
        'https://fonts.googleapis.com/css2?family=M+PLUS+Code+Latin:wght@100;200;300;400;500;600;700&family=M+PLUS+1:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap',
        array(),
        '1.0.0'
    );

    //style.css読み込み
    wp_enqueue_style(
        'hamburger-styles',
        get_theme_file_uri() . '/css/style.css',
        array(),
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'hamburger_css');

//ページネーション全体のクラス名指定
function custom_wp_pagenavi()
{
    $args = array(
        'wrapper_tag' => 'nav',
        'wrapper_class' => 'p-page-move--number'
    );
    wp_pagenavi($args);
}
//ページネーション数字部分クラス名指定
function custom_wp_pagenavi_class($class_name)
{
    switch($class_name) {
        case 'current':
            $class_name = 'p-page-move--number__item c-button--cornerGray-brown p-page-move__active';
            break;
        case 'larger':
            $class_name = 'p-page-move--number__item c-button--cornerGray-white';
            break;
        case 'smaller':
            $class_name = 'p-page-move--number__item c-button--cornerGray-white';
            break;
    }
    return $class_name;
}
add_filter('wp_pagenavi_class_current', 'custom_wp_pagenavi_class');
add_filter('wp_pagenavi_class_larger', 'custom_wp_pagenavi_class');
add_filter('wp_pagenavi_class_smaller', 'custom_wp_pagenavi_class');

//footer部分メニュー
function add_additional_class_on_li( $classes, $item, $args )
    {
        if (isset($args -> add_li_class)) {
            $classes[] = $args -> add_li_class;
        }
        return $classes;
    }
add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 1,3 );

