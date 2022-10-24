<?php get_header( ); ?>
            <main class="p-404">
                <div class="p-404__visual">
                    <img src="<?php echo esc_url( get_theme_file_uri()); ?>/image/404.webp" alt="404">
                    <h1>404</h1>
                    <p>Page not found.</p>
                </div>
                <section class="p-404__text">
                    <p>
                        お探しのページが見つかりませんでした。<br>
                        URLが間違っているか、ページが存在しません。<br>
                        TOPページから再度アクセスしてください。
                    </p>
                    <button 
                        class="c-button--circleWhite-white p-404__button u-404-button"
                        onclick="location.href='<?php echo esc_url( home_url()); ?>'">
                        Top
                    </button>
                </section>
            </main>
        </div>
    <?php get_sidebar( ); ?>
    </div>

<?php get_footer( ); ?>