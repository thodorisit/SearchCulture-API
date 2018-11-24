<?php
    namespace thodorisit\ektapi\ShowRequest;
    
    class ElementsMap {
        
        public function apiMapModel() {
            return array(
                "collection"    => "byCollection",
                "recordId"      => "byDcCreatorContributor",
                "VIEW_URI_TYPE" => "byShowType"
            );
        }
        
    }

