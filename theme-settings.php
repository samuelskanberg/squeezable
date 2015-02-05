<?php

function squeezable_form_system_theme_settings_alter(&$form, $form_state) {
    $form['address']['street_address'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Street address'),
        '#default_value' => theme_get_setting('street_address'),
        '#description'   => t('The street name to be shown in the footer.'),
    );

    $form['address']['map_center_lat'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Latitude for the center of the map'),
        '#default_value' => theme_get_setting('map_center_lat'),
        '#description'   => t('Will be used for center of the map in the footer.'),
    );

    $form['address']['map_center_long'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Longitude for the center of the map'),
        '#default_value' => theme_get_setting('map_center_long'),
        '#description'   => t('Will be used for center of the map in the footer.'),
    );
}

?>
