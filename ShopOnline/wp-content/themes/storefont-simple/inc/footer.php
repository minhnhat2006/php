<?php

add_action( 'init', 'custom_remove_footer_credit', 10 );

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_after_footer', 'custom_storefront_credit', 20 );
} 

function custom_storefront_credit() {
    ?>
    <div class="site-info">
        <?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
        <?php if ( apply_filters( 'storefront_credit_link', true ) ) { ?>
        <?php printf( esc_attr__( '%1$s designed by %2$s.', 'storefront' ), 'Website', '<a href="https://www.facebook.com/Thi%E1%BA%BFt-k%E1%BA%BF-v%C3%A0-ph%C3%A1t-tri%E1%BB%83n-ph%E1%BA%A7n-m%E1%BB%81m-mi%E1%BB%85n-ph%C3%AD-377949399304880/" title="Thiết kế và phát triển phần mềm miễn phí" rel="author">The Free Apps</a>' ); ?>
        <?php } ?>
    </div><!-- .site-info -->
    <?php
}