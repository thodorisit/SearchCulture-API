<?php
    namespace thodorisit\ektapi\ShowRequest;
    
    use thodorisit\ektapi\ShowRequest\Validation as Validate;
    
    class Show extends Request{
        
        /*
         * Search by collection name. Give the exact collection name in the language 
         * defined by the language parameter.
         * @Var: String 
        */
        protected $collection;
        
        public function byCollection($c) {
            $this->collection = Validate::validateString($c);
            return $this;
        }
        
        public function byRecordId($c) {
            $this->recordId = Validate::validateString($c);
            return $this;
        }
        
        public function byShowType($c) {
            $this->VIEW_URI_TYPE = Validate::validateEdmType($c);
            return $this;
        }
        
    }
