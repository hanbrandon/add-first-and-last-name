=== Add First and Last Name ===

Contributors: Sang Hyun Han<br />
Donate link: paypal.me/hanbrandon<br />
Tags: woocommerce, registration, first name, last name<br />
Requires at least: 4.0<br />
Tested up to: 6.11<br />
Stable tag: 1.0<br />
License: GPLv2 or later<br />
License URI: http://www.gnu.org/licenses/gpl-2.0.html<br />

This plugin adds first name and last name fields to the WooCommerce registration form.

== Description ==

The Add First and Last Name plugin adds first name and last name fields to the WooCommerce registration form, making it easy for users to provide their name when creating an account on your store.

To use the plugin, simply install and activate it on your WordPress site. The first name and last name fields will be automatically added to the WooCommerce registration form.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/add-first-and-last-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. The first name and last name fields will be automatically added to the WooCommerce registration form.

== Frequently Asked Questions ==

= How do I customize the label or placeholder text for the first name and last name fields? =

To customize the label or placeholder text for the first name and last name fields, you can use the `woocommerce_form_field_args` filter. For example, to change the label text for the first name field to "Your first name", you can use the following code:

```
add_filter( 'woocommerce_form_field_args', 'customize_first_name_label', 10, 3 );
function customize_first_name_label( $args, $key, $value ) {
if ( 'billing_first_name' === $key ) {
$args['label'] = __( 'Your first name', 'woocommerce' );
}
return $args;
}
```

To customize the placeholder text for the last name field, you can use the same filter and modify the `placeholder` argument:

```
add_filter( 'woocommerce_form_field_args', 'customize_last_name_placeholder', 10, 3 );
function customize_last_name_placeholder( $args, $key, $value ) {
if ( 'billing_last_name' === $key ) {
$args['placeholder'] = __( 'Your last name', 'woocommerce' );
}
return $args;
}
```

= Can I make the first name and last name fields required? =

Yes, you can make the first name and last name fields required by adding the `required` attribute to the input fields. To do this, you can use the `woocommerce_form_field_args` filter. For example, to make the first name field required, you can use the following code:

```
add_filter( 'woocommerce_form_field_args', 'make_first_name_required', 10, 3 );
function make_first_name_required( $args, $key, $value ) {
    if ( 'billing_first_name' === $key ) {
        $args['required'] = true;
    }
    return $args;
}
```

To make the last name field required, you can use the same filter and modify the billing_last_name field:

```
add_filter( 'woocommerce_form_field_args', 'make_last_name_required', 10, 3 );
function make_last_name_required( $args, $key, $value ) {
    if ( 'billing_last_name' === $key ) {
        $args['required'] = true;
    }
    return $args;
}
```

= Can I add the first name and last name fields to the checkout form as well? =

Yes, you can add the first name and last name fields to the checkout form by using the same woocommerce_form_field_args filter. For example, to add the first name field to the checkout form, you can use the following code:

```
add_filter( 'woocommerce_form_field_args', 'add_first_name_to_checkout', 10, 3 );
function add_first_name_to_checkout( $args, $key, $value ) {
    if ( 'billing_first_name' === $key ) {
        $args['class'][] = 'form-row-first';
        $args['label'] = __( 'First Name', 'woocommerce' );
        $args['placeholder'] = __( 'First name', 'woocommerce' );
        $args['required'] = true;
    }
    return $args;
}

```

To add the last name field to the checkout form, you can use the same filter and modify the billing_last_name field:

```
add_filter( 'woocommerce_form_field_args', 'add_last_name_to_checkout', 10, 3 );
function add_last_name_to_checkout( $args, $key, $value ) {
    if ( 'billing_last_name' === $key ) {
        $args['class'][] = 'form-row-last';
        $args['label'] = __( 'Last Name', 'woocommerce' );
        $args['placeholder'] = __( 'Last name', 'woocommerce' );
        $args['required'] = true;
    }
    return $args;
}
```

== Changelog ==

= 1.0 =

Initial release
