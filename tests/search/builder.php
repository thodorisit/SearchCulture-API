<?php
    require_once '../../vendor/autoload.php';
    
    use thodorisit\ektapi\SearchRequest\Search as Search;
   
    /*
     * Load a class instance.
     */
    
    $search = new Search('__TOKEN__');
    
    /*
     * Load data using methods.
     */
    
    $search ->byCollection('SOME_DATA') // @Var: string
            ->byDcCreatorContributor('SOME_DATA') // @Var: string
            ->byDcSubject('SOME_DATA') // @Var: string
            ->byDcType('SOME_DATA') // @Var: string
            ->byDcTerms('SOME_DATA') // @Var: string
            ->useURI(FALSE) // @Var: Boolean
            ->strictPeriods(FALSE) // @Var: Boolean
            ->byChronology('SOME_DATA') // @Var: string
            ->byHistoricalPeriod('SOME_DATA') // @Var: string
            ->byType(array('SOME_DATA', 'SOME_DATA')) // @Var: string
            ->byGeneralTerm('SOME_DATA') // @Var: string
            ->byIntitution('SOME_DATA') // @Var: string
            ->page(1) // @Var: Number (int32)
            ->language('el') // @Var: string
            ->fileRights('RIGHTS_RESERVED') // @Var: string
            ->render();
    