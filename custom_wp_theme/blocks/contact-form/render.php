<?php
/**
 * Server-side rendering for the "Contact Info" block.
 */
$api_key = $attributes['apiKey'] ?? '';
$caption = $attributes['caption'] ?? 'Please fill out the form and we\'ll contact you as soon as possible.';
$title = $attributes['title'] ?? 'Get in touch';
?>

<div class="contact-form-block">
    <h2 class="title"><?php echo esc_html( $title ); ?></h3>
    <p class="caption"><?php echo esc_html( $caption ); ?></p>
    <div class="form">
        <form action="https://api.web3forms.com/submit" method="POST">
            <div class="form-body">
                <input type="hidden" name="access_key" value="<?php echo esc_attr( $api_key ); ?>">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
                <button type="submit" class="submit-btn">Submit</button>
            </div>
            <!-- <input type="hidden" name="redirect" value="https://mywebsite.com/thanks.html"> -->
        </form>
    </div>
</div>