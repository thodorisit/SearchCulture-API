<?php
    namespace thodorisit\ektapi\SearchRequest;
    
    class ElementsMap {
        
        public function apiMapModel() {
            return array(
                "collection"                    => "byCollection",
                "dc_creator_or_dc_contributor"  => "byDcCreatorContributor",
                "dc_subject"                    => "byDcSubject",
                "dc_type"                       => "byDcType",
                "dcterms_spatial"               => "byDcTerms",
                "ektFieldsUseURIs"              => "useURI",
                "ektStrictPeriodsMode"          => "strictPeriods",
                "ekt_chronology"                => "byChronology",
                "ekt_historical_period"         => "byHistoricalPeriod",
                "ekt_type"                      => "byType",
                "general_term"                  => "byGeneralTerm",
                "institution"                   => "byIntitution",
                "page"                          => "page",
                "preferredLanguage"             => "language",
                "rightsCategoryForDigitalFiles" => "fileRights"
            );
        }
        
    }

