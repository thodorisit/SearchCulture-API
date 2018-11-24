<?php
    namespace thodorisit\ektapi\ShowRequest;
    
    use thodorisit\ektapi\ShowRequest\ElementsMap as Map;
    use thodorisit\ektapi\ShowRequest\Validation as Validate;
    
    class Request {
        
        const BASE_URI = 'https://www.searchculture.gr/aggregator/edm/';
           
        public function customUri($mapArray, $uriVars) {
            foreach ($mapArray as $key => $value) {
                switch ($key) {
                    case "collection":
                    case "recordId":
                        $this->{$key} = Validate::validateString($uriVars[$value]);
                        break;
                    case "VIEW_URI_TYPE":
                        $this->{$key} = Validate::validateEdmType($uriVars[$value]);
                        break;
                }
            }
            return $this;
        }
        
        public function createURI() {
            
            foreach(Map::apiMapModel() as $i => $value) {
                if (empty($this->{$i}) && ($i != 'VIEW_URI_TYPE') ) {
                    echo json_encode(array("error" => "Missing data."));
                    die();
                }
            }
            
            $callUri = self::BASE_URI . $this->collection . '/' . $this->recordId . '/' . $this->VIEW_URI_TYPE;
            return $callUri;
            
        }
        
        public function render() {
            $apiUrl = self::createURI();
            if ($this->VIEW_URI_TYPE == 'xml') {
                $ch = curl_init($apiUrl);
                $response = curl_exec($ch);
                curl_close($ch);
                if (empty($response)) {
                    echo json_encode(array("error" => "There was an error while calling the Api."));
                    die();
                }
                header('Content-Type: application/xml');
                $xml = simplexml_load_string($response);
                print ($xml);
            } else {
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
        
    }
