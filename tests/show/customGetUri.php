<?php
    require_once '../../vendor/autoload.php';
    
    use thodorisit\ektapi\ShowRequest\Show as Show;
    
    /*
     * Load a class instance.
     */
    
    $show = new Show();
    
    /*
     * To use your own custom url parameters, rename the values of the array bellow. (_CUSTOM_VAR_*)
     * Now, you can request results to: _URL_/?_CUSTOM_VAR_1=value&_CUSTOM_VAR_2=value2& etc..
     */
    
    $customUriArray = array(
        "collection"    => "_CUSTOM_VAR_1",
        "recordId"      => "_CUSTOM_VAR_2",
        "VIEW_URI_TYPE" => "_CUSTOM_VAR_3"
    );
    
    /*
     * In order to use your own URI parameters, you should call the "customUri" method.
     * "customUri" method accepts two parameters, the first one is the "$customUriArray" array.
     * The second parameter is the GET request with all its data.
     */
    
    $show ->customUri($customUriArray, $_GET)
          ->render();