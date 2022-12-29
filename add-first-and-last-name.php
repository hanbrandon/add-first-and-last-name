<?php
/**
 * Plugin Name: Add First and Last Name
 * Plugin URI: https://github.com/hanbrandon/add-first-and-last-name.git
 * Description: Adds first name and last name fields to the WooCommerce registration form.
 * Version: 1.0
 * Author: Sang Hyun Han
 * Author URI: https://github.com/hanbrandon
 * License: GPL2
 */

add_action( 'woocommerce_register_form_start', 'woocommerce_registration_form_fields' );
function woocommerce_registration_form_fields() {
    ?>
    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e( 'First Name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e( 'Last Name', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
    <div class="clear"></div>
    <?php
}

add_filter( 'woocommerce_process_registration_errors', 'woocommerce_registration_form_fields_validation', 10, 4 );
function woocommerce_registration_form_fields_validation( $errors, $username, $password, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( 'First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( 'Last name is required!', 'woocommerce' ) );
    }
    return $errors;
}

add_action( 'woocommerce_created_customer', 'woocommerce_registration_form_fields_save' );
function woocommerce_registration_form_fields_save( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ));
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }
}