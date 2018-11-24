<?php
    namespace thodorisit\ektapi\SearchRequest;
    
    use thodorisit\ektapi\SearchRequest\Validation as Validate;
    
    class Search extends Request{
        
        /*
         * Search by collection name. Give the exact collection name in the language 
         * defined by the language parameter.
         * @Var: String 
        */
        protected $collection;
        
        /*
         * Search by creator or contributor. A search term, word or phrase, that will be searched 
         * in original creator and contributor (dc:creator and dc:contributor) values.
         * @Var: String
        */
        protected $dc_creator_or_dc_contributor;
        
        /*
         * Search by subject. A search term, word or phrase, that will be searched in original 
         * subject (dc:subject) values.
         * @Var: String
         */
        protected $dc_subject;
        
        /*
         * Search by (original) type. A search term, word or phrase, that will be searched in 
         * original type (dc:type) values.
         * @Var: String
         */
        protected $dc_type;
        
        /*
         * Search by place. A search term, word or phrase, that will be searched in original 
         * spacial (dcterms:spatial) values.
         * @Var: String
         */
        protected $dcterms_spatial;
        
        /*
         * ektFieldsUseURIs
         * @Var: Boolean (default : false)
         */
        protected $ektFieldsUseURIs = FALSE;
        
        /*
         * Choose between two search modes both for year/year range-based and for historical 
         * period-based search, the “loose” (false) one and the “strict” one (true). In the 
         * “loose” mode, which is the default, temporal search returns items with a year or 
         * period interval that intersects that of the search criterion. For example, for a 
         * search criterion: “1500-1600 AD”, an item dated “1550-1750 AD” will appear in the 
         * results. Similarly, for a search criterion “Classical Period”, an item dated 
         * “From Classical to Hellenistic period” will also appear in the results. In the 
         * “strict” mode, temporal search is more precise bringing only items with a year or 
         * period interval strictly within (or coinciding) the one defined by the search 
         * criterion. For example, for a search year range: “1500-1600 AD”, an item dated 
         * “1550-1750 AD” will not be included in the results, while an item with “1550-1570 AD” 
         * date will. Similarly, for a search criterion “Classical Period”, an item dated “From 
         * Classical to Hellenistic period” will not be included in the results, while an item 
         * dated “Early Classical Period” will. The “strict” mode is very useful when the user 
         * wants to find items dated exclusively within as specific year or period interval.
         * @Var: Boolean (default : false)
         */
        protected $ektStrictPeriodsMode = FALSE;
        
        /*
         * Search by EKT Chronology (year/year range). Give the year or year range when 
         * the items were created.
         * @Var: String
         */
        protected $ekt_chronology;
        
        /*
         * Search by EKT Historical Period. One or more historical periods from the Vocabulary 
         * of Greek Historical Periods created by EKT. The values are expected to be either 
         * exact labels (default) or URIs, depending on the value of the useURIsForEKTFields 
         * parameter. If labels are used, these should be in the language specified by the 
         * language parameter.
         * @Var: String
         */
        protected $ekt_historical_period;
        
        /*
         * Search by EKT Types. One or more types from the Vocabulary of Types created by EKT. 
         * The values are expected to be either exact labels (default) or URIs, depending on 
         * the value of the useURIsForEKTFields parameter. If labels are used, these should 
         * be in the language specified by the language parameter.
         * @Var: array[string]
         */
        protected $ekt_type;
        
        /*
         * A search term, word or phrase. It will be searched across all indexed metadata fields.
         * @Var: String
         */
        protected $general_term;
        
        /*
         * Search by institution name. Give the exact institution name in the language defined 
         * by the language parameter. For a list of institutions try: 
         * https://www.searchculture.gr/aggregator/portal/institutions.
         * @Var: String
         */
        protected $institution;
        
        /*
         * The results page number.
         * @Var: INT (int32) (defauly : 1)
         */
        protected $page;
        
        /*
         * The preferred language. EKT fields (type, historical period, chronology), institution 
         * and collection will returned in this language. Available values : el, en.
         * @Var: String (default : el)
         */
        protected $preferredLanguage;
        
        /*
         * Search by license category for digital file rights.
         * Available values : RIGHTS_RESERVED, CC_BY, CC_BY_SA, CC_BY_ND, CC_BY_NC, CC_BY_NC_SA, 
         * CC_BY_NC_ND.
         * @Var: String
         */
        protected $rightsCategoryForDigitalFiles;
        
        public function __construct($token) {
            parent::__construct($token);
        }
        
    //Dc search
        public function byCollection($c) { 
            $this->collection = Validate::validateString($c);
            return $this;
        }
        public function byDcCreatorContributor($c) { 
            $this->dc_creator_or_dc_contributor = Validate::validateString($c);
            return $this;
        }
        public function byDcSubject($c) {
            $this->dc_subject = Validate::validateString($c);
            return $this;
            
        }
        public function byDcType($c) {
            $this->dc_type = Validate::validateString($c);
            return $this;
        }
        public function byDcTerms($c) {
            $this->dcterms_spatial = Validate::validateString($c);
            return $this; 
        }
    
    //Boolean Vars
        public function useURI($c) {
            $this->ektFieldsUseURIs = Validate::validateBoolean($c);
            return $this;
        }
        public function strictPeriods($c) {
            $this->ektStrictPeriodsMode = Validate::validateBoolean($c);
            return $this;
        }
        
    //EKT fields
        public function byChronology($c) {
            $this->ekt_chronology = Validate::validateString($c);
            return $this;
        }
        public function byHistoricalPeriod($c) {
            $this->ekt_historical_period = Validate::validateString($c);
            return $this;
        }
        public function byType($c) {
            $this->ekt_type = Validate::validateArray($c);
            return $this;
        }
        
        public function byGeneralTerm($c) {
            $this->general_term = Validate::validateString($c);
            return $this;
        }
        public function byIntitution($c) {
            $this->institution = Validate::validateString($c);
            return $this;
        }
        
        public function page($c) {
            $this->page = Validate::validateNumber($c);
            return $this;
        }
        public function language($c) {
            $this->preferredLanguage = Validate::validateLanguage($c);
            return $this;
        }
        public function fileRights($c) {
            $this->rightsCategoryForDigitalFiles = Validate::validateFileRights($c);
            return $this;
        }
        
    }
