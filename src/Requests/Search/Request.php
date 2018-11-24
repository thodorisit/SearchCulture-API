<?php
    namespace thodorisit\ektapi\SearchRequest;
    
    use thodorisit\ektapi\SearchRequest\ElementsMap as Map;
    use thodorisit\ektapi\SearchRequest\Validation as Validate;
    
    class Request {
        
        const BASE_URI = 'https://www.searchculture.gr/aggregator/api/search.json';
        
        private $token;
        
        public function __construct($token) {
            $this->token = $token;
        }
        
        public function createURI() {
            $urlArray = array();
            $varMapModel = Map::apiMapModel();
            foreach($varMapModel as $i => $value) {
                if (!empty($this->{$i})) {
                    $urlArray[$i] = $this->{$i};
                }
            }
            
            $uriWithVars = http_build_query($urlArray);
            
            //Remove indexes if there is an array
                //Remove number
                $noIndexURI = preg_replace('/(%5B)\d+(%5D=)/i', '$1$2', $uriWithVars);
                //Remove brackets
                $noIndexURI = str_replace('%5B%5D', '', $noIndexURI);
            
            $callUri = self::BASE_URI . '?' . $noIndexURI . '&apiKey=' . $this->token;
            return $callUri;
        }
           
        //Assign values from GET request to custom uri var names
        public function customUri($mapArray, $uriVars) {
            
            $varToFunctionMap = Map::apiMapModel();
            
            foreach ($mapArray as $i => $value) {
                if (!empty($uriVars[$value])) {
                    switch ($i) {
                        case "ekt_type":
                            //$arrayOfData = explode(",", $uriVars[$value]);
                            //Get array of uri ?var[0]=value0&var[1]=value1 etc
                            $arrayOfData = $uriVars[$value];
                            $this->{$i} = Validate::validateArray($arrayOfData);
                            break;
                        case "general_term":
                        case "ekt_historical_period":
                        case "ekt_chronology":
                        case "dc_type":
                        case "dc_subject":
                        case "dc_creator_or_dc_contributor":
                        case "dcterms_spatial":
                        case "institution":
                        case "collection":
                        case "rightsCategoryForDigitalFiles":
                        case "preferredLanguage":
                            $this->{$i} = Validate::validateString($uriVars[$value]);
                            break;
                        case "page":
                            $this->{$i} = Validate::validateNumber($uriVars[$value]);
                            break;
                        case "ektStrictPeriodsMode":
                        case "ektFieldsUseURIs":
                            $this->{$i} = Validate::validateBoolean($uriVars[$value]);
                            break;

                    }
                }
            }
            return $this;
        }
        
        public function render() {
            $apiUrl = self::createURI();
            $ch = curl_init($apiUrl);
            $response = curl_exec($ch);
            curl_close($ch);
            if (empty($response)) {
                echo json_encode(array("error" => "There was an error while calling the Api."));
                die();
            }
            print_r($response, TRUE);
        }
        
    }
