'use strict';

jQuery(window).on('load',function(){
    if(window.matchMedia('(min-width:680px)').matches){
        jQuery('.js-main-visual').children('img').attr('src','wp-content/themes/hamburger-WP/image/main-visual.webp' );
    }else{
        jQuery('.js-main-visual').children('img').attr('src','wp-content/themes/hamburger-WP/image/main-visual-SP.webp');
    };
});

jQuery(window).resize(function($){
    if(window.matchMedia('(min-width:680px)').matches){
        jQuery('.js-main-visual').children('img').attr('src','wp-content/themes/hamburger-WP/image/main-visual.webp' );
    }else{
        jQuery('.js-main-visual').children('img').attr('src','wp-content/themes/hamburger-WP/image/main-visual-SP.webp');
    };
});