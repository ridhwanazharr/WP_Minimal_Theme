<?php
/**
 * Server-side rendering for the "Contact Info" block.
 */

?>

<div class="wp-custom-theme-contact-info-block">
    <div class="wp-custom-theme-contact-info">
        <?php if ($phone = get_theme_mod('contact_phone')) : ?>
            <p><i class="fa-solid fa-phone"></i> <?php echo esc_html($phone); ?></p>
        <?php endif; ?>

        <?php if ($email = get_theme_mod('contact_email')) : ?>
            <p><i class="fa-solid fa-envelope"></i> <?php echo esc_html($email); ?></p>
        <?php endif; ?>

        <?php if ($address = get_theme_mod('contact_address')) : ?>
            <p><i class="fa-solid fa-location-dot"></i> <?php echo esc_html($address); ?></p>
        <?php endif; ?>
    </div>
    <div class="wp-custom-theme-social-link">
        <?php if ( get_theme_mod( 'social_behance' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'social_behance' ) ); ?>" target="_blank"><i class="fa-brands fa-behance fa-xl"></i></a>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'social_pinterest' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'social_pinterest' ) ); ?>" target="_blank"><i class="fa-brands fa-pinterest fa-xl"></i></a>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'social_instagram' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'social_instagram' ) ); ?>" target="_blank"><i class="fa-brands fa-instagram fa-xl"></i></a>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'social_twitter' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'social_twitter' ) ); ?>" target="_blank"><i class="fa-brands fa-x-twitter fa-xl"></i></a>
        <?php endif; ?>
    </div>
</div>