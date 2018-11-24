<?php
    require_once '../../vendor/autoload.php';
    
    use thodorisit\ektapi\SearchRequest\Search as Search;
   
    /*
     * Load a class instance.
     */
    
    $search = new Search('__TOKEN__');
    
    /*
     * To use your own custom url parameters, rename the values of the array bellow. (_CUSTOM_VAR_*)
     * Now, you can request results to: _URL_/?_CUSTOM_VAR_1=value&_CUSTOM_VAR_2=value2& etc..
     * 
     * The ekt_type field must be an Array. The ekt_type parameters must have brackets with or without indexes.
     * Examples: _URL_/?_CUSTOM_VAR_10[]=value&_CUSTOM_VAR_10[]=value2& etc..
     *           _URL_/?_CUSTOM_VAR_10[0]=value&_CUSTOM_VAR_10[1]=value2& etc..
     */
    
    $customUriArray = array(
        "collection"                    => "_CUSTOM_VAR_1",
        "dc_creator_or_dc_contributor"  => "_CUSTOM_VAR_2",
        "dc_subject"                    => "_CUSTOM_VAR_3",
        "dc_type"                       => "_CUSTOM_VAR_4",
        "dcterms_spatial"               => "_CUSTOM_VAR_5",

        "ektFieldsUseURIs"              => "_CUSTOM_VAR_6",
        "ektStrictPeriodsMode"          => "_CUSTOM_VAR_7",

        "ekt_chronology"                => "_CUSTOM_VAR_8",
        "ekt_historical_period"         => "_CUSTOM_VAR_9",
        "ekt_type"                      => "_CUSTOM_VAR_10",

        "general_term"                  => "_CUSTOM_VAR_11",
        "institution"                   => "_CUSTOM_VAR_12",

        "page"                          => "_CUSTOM_VAR_13",
        "preferredLanguage"             => "_CUSTOM_VAR_14",
        "rightsCategoryForDigitalFiles" => "_CUSTOM_VAR_15"
    );
    
    /*
     * In order to use your own URI parameters, you should call the "customUri" method.
     * "customUri" method accepts two parameters, the first one is the "$customUriArray" array.
     * The second parameter is the GET request with all its data.
     */
    
    $search->customUri($customUriArray, $_GET)
           ->render();