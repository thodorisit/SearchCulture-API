<?php
    namespace thodorisit\ektapi\SearchRequest;
    
    class Validation {
        
        public function validateString($s) {
            return (string)$s;
        }
        
        public function validateArray($array = array()) {
            if (is_array($array)) {
                return $array;
            } else {
                echo json_encode(array("error" => "Error while validating Array data type."));
                die();
            }
        }
        
        public function validateNumber($s) {
            return (int)$s;
        }
        
        public function validateBoolean($s) {
            if ($s === TRUE) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        public function validateLanguage($s) {
            $type = strtolower($s);
            if ($type == 'en') {
                return 'en';
            } else {
                return 'el';
            }
        }
        
        public function validateFileRights($s) {
            $allowed = array('RIGHTS_RESERVED', 'CC_BY', 'CC_BY_SA', 'CC_BY_ND', 'CC_BY_NC', 'CC_BY_NC_SA', 'CC_BY_NC_ND');
            if ( (empty($type)) || (!in_array($type, $allowed_types)) ) {
                return NULL;
            } else {
                return $s;
            }
        }
        
    }
