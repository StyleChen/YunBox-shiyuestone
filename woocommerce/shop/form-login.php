<?php
/**
 * Login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if (is_user_logged_in()) return;
?>
<form method="post" class="login check-login" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>
        <div class="login-entrance-text">
            <?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>
        </div>
    
	<p class="form-row form-row-first">
                <input type="text" placeholder="<?php _e( 'Username or email', 'woocommerce' ); ?>" class="input-text placeholder" name="username" id="username" />
	</p>
	<p class="form-row form-row-last">
                <input class="input-text placeholder" placeholder="<?php _e( 'Password', 'woocommerce' ); ?>" type="password" name="password" id="password" />
	</p>
	<div class="clear"></div>

	<p class="form-row">
		<?php $woocommerce->nonce_field('login', 'login') ?>
		<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
		<a class="lost_password" href="<?php echo esc_url( wp_lostpassword_url( home_url() ) ); ?>"><?php _e( 'Lost Password?', 'woocommerce' ); ?></a>
	</p>

	<div class="clear"></div>
</form>