<?php
    namespace thodorisit\ektapi\ShowRequest;
    
    class Validation {
        
        public function validateString($s) {
            return (string)$s;
        }
        
        public function validateEdmType($t) {
            $type = strtolower($t);
            $allowed_types = array('json', 'html', 'view', 'xml');
            switch ($type) {
                case "json":
                    return 'json';
                    break;
                case "html":
                case "view":
                    return 'view';
                    break;
                case "xml":
                    return 'xml';
                    break;
                default:
                    return 'json';
            }
        }
        
    }
