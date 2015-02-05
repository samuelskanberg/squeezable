<?php

function squeezable_ajax_find_coordinates_callback($form, $form_state) {
    $street_address = $form_state['values']['street_address'];

    // Convert to url string
    $url_street_address = urlencode($street_address);
    $base_url = "http://nominatim.openstreetmap.org";
   
    // E.g. http://nominatim.openstreetmap.org/search?q=t-centralen&format=json 
    $complete_url = $base_url . "/search?q=" . $url_street_address . "&format=json";


    $response = drupal_http_request($complete_url);
    $data = drupal_json_decode($response->data);

    $lat = $data[0]['lat'];
    $lon = $data[0]['lon'];

    $form['address']['map_center_coordinates']['#value'] = $lat . ',' . $lon;
    return $form['address']['map_center_coordinates'];
}

function squeezable_form_system_theme_settings_alter(&$form, $form_state) {
    $form['address']['street_address'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Street address'),
        '#default_value' => theme_get_setting('street_address'),
        '#description'   => t('The street name to be shown in the footer.'),
    );

    $form['address']['street_address_find'] = array(
        '#type'         => 'button',
        '#value'        => t('Find coordinates'),
        '#ajax' => array(
            'callback' => 'squeezable_ajax_find_coordinates_callback',
            'wrapper' => 'coordinates-wrapper',
            'method' => 'replace',
            'effect' => 'fade',
        ),
    );

    $form['address']['map_center_coordinates'] = array(
        '#prefix' => '<div id="coordinates-wrapper">',
        '#suffix' => '</div>',
        '#type'          => 'textfield',
        '#title'         => t('Latitude and longitude for the center of the map'),
        '#default_value' => theme_get_setting('map_center_coordinates'),
        '#description'   => t('Will be used for center of the map in the footer. You can also visit: http://www.openstreetmap.org and get coordinates from there'),
    );

    $form['address']['map_zoom_level'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Zoom level of the map'),
        '#default_value' => theme_get_setting('map_zoom_level'),
        '#description'   => t('Will be used for zoom level of the map in the footer.'),
    );
}

?>
