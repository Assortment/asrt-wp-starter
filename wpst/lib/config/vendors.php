<?php

/**
 *******************************************************************************
 * Vendors
 *******************************************************************************
 *
 * Any 3rd party plugins or modules that are used should be configured within
 * here, if needs must, a `/lib/config/vendors/` folder should be created.
 *
 * $. Advanced Custom Fields
 * $. Gravity Forms
 *
 */



/**
 * $. Advanced Custom Fields
 ******************************************************************************/

// Add ACF options page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}



/**
 * $. Gravity Forms
 ******************************************************************************/

// Better validation message
function wpst_update_validation_message( $msg, $form ){
    $output  = '<div class="alert alert--error">';
    $output .= '<strong>Error:</strong> Please complete the required fields and try again';
    $output .= '</div>';

    return $output;
}

add_filter( 'gform_validation_message', 'wpst_update_validation_message', 10, 2 );

// Update the Form submit button
function wpst_gforms_submit_button( $btn, $form ){
    $output  = '<button type="submit" class="btn btn--primary" id="gform_submit_button_' . $form['id'] . '">';
    $output .= $form['button']['text'];
    $output .= '</button>';

    return $output;
}

add_filter( 'gform_submit_button', 'wpst_gforms_submit_button', 10, 2 );

