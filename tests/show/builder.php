<?php
    require_once '../../vendor/autoload.php';
    
    use thodorisit\ektapi\ShowRequest\Show as Show;
    
    /*
     * Load a class instance.
     */
    
    $show = new Show();
    
    /*
     * Load data using methods.
     */
    
    $show ->byCollection("SOME_DATA") // @Var: string Example: "EIM"
          ->byRecordId("SOME_DATA") // @Var: string Example: "000042-355545"
          ->byShowType("json") // @Var: string (Allowed: json, xml, html (or) view, rdf)
          ->render();