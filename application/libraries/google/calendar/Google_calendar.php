<?php
require_once __DIR__ . '/../google_api/autoload.php';

 class Google_calendar{
     
     protected $_credentials = __DIR__.'/calendar-php-quickstart.json';
     
     protected $_client_secret = __DIR__.'/client_secret.json';
     
     protected $_client;
     
      protected $_service;
     
     public function __construct(){
         $this->_client = $this->getClient();
         $this->_service = new Google_Service_Calendar($this->_client);
     }
     
     protected function getClient() {
        $client = new Google_Client();
        $client->setApplicationName(GOOGLE_APPLICATION_NAME);
        $client->setScopes(implode(' ', array(
            Google_Service_Calendar::CALENDAR_READONLY)
          )); 
        $client->setAuthConfig($this->_client_secret);
        $client->setAccessType('offline');

        // Load previously authorized credentials from a file.
        $credentialsPath = ($this->_credentials);

        
          $accessToken = json_decode(file_get_contents($credentialsPath), true);
        
        $client->setAccessToken($accessToken);

        // Refresh the token if it's expired.
        if ($client->isAccessTokenExpired()) {
          $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
          file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
        }
        return $client;
      }
      
      public function get_events($from,$to=''){
          
          $optParams = array(
            'maxResults' => 100,
            'timeMin' => $from,            
            'orderBy' => 'startTime',
            'singleEvents' => TRUE,
            
          );
          if($to != ''){
              $optParams['timeMax'] = $to;
          }
          return $this->_service->events->listEvents(GOOGLE_CALENDAR_ID, $optParams);
          
      }
     
 }

