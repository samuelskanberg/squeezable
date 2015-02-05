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



    $form['address']['map_center_lat']['#value'] = $lat;
    $form['address']['map_center_long']['#value'] = $lon;
    return $form['address']['map_center_lat'];



    $commands = array();
    // Replace the content of '#object-1' on the page with 'some html here'.
    //$commands[] = ajax_command_replace('#coordinates-div', 'some html here');
    $commands[] = ajax_command_replace('#lat-wrapper', $form['address']['map_center_lat']);
    $commands[] = ajax_command_replace('#long-wrapper', $form['address']['map_center_long']);
    // Add a visual "changed" marker to the '#object-1' element.
    //$commands[] = ajax_command_replace('#bar-div', 'Super much html');
    // Menu 'page callback' and #ajax['callback'] functions are supposed to
    // return render arrays. If returning an Ajax commands array, it must be
    // encapsulated in a render array structure.
    return array('#type' => 'ajax', '#commands' => $commands);

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
            'wrapper' => 'lat-wrapper',
            //'method' => 'replace',
            //'effect' => 'fade',
        ),
    );
    
    $form['address']['foo'] = array(
        '#title' => t("Generated Checkboxes"),
        '#prefix' => '<div id="coordinates-div">',
        '#suffix' => '</div>',
        '#type' => 'textfield',
        '#value' => "Test",
        '#description' => t('This is where we get automatically generated checkboxes'),
    );

    $form['address']['map_center_lat'] = array(
        '#prefix' => '<div id="lat-wrapper">',
        '#suffix' => '</div>',
        '#type'          => 'textfield',
        '#title'         => t('Latitude for the center of the map'),
        '#value' => theme_get_setting('map_center_lat'),
        '#description'   => t('Will be used for center of the map in the footer.'),
    );

    $form['address']['map_center_long'] = array(
        '#prefix' => '<div id="long-wrapper">',
        '#suffix' => '</div>',
        '#type'          => 'textfield',
        '#title'         => t('Longitude for the center of the map'),
        '#value' => theme_get_setting('map_center_long'),
        '#description'   => t('Will be used for center of the map in the footer.'),
    );

    $form['address']['map_zoom_level'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Zoom level of the map'),
        '#default_value' => theme_get_setting('map_zoom_level'),
        '#description'   => t('Will be used for zoom level of the map in the footer.'),
    );
}

?>
