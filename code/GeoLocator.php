<?php
/***
 *Geo location extension for the ipinfodb geolocation API.
 *To register for a key go to http://ipinfodb.com/register.php.
 *
 ***/
class GeoLocator extends Extension{
    private static $api_key = "";
    
    public static function set_api_key($key){
        self::$api_key = $key;
    }
    
    public function getIPInfo(){
        $ipinfo = new ipinfodb;
        $ipinfo->setKey(self::$api_key);
        
        return $ipinfo;
    }
    
    public function getGeoLocation($ip){
        $ipinfo = $this->getIPInfo();
        $locations = $ipinfo->getGeoLocation($ip);
        //The real code $locations = $ipinfodb->getGeoLocation($this->getRequest()->getIP());
        $errors = $ipinfo->getError();
        $dtLoc = DataObject::get('Location', "City = '".$locations['City']."'");
        if(! $dtLoc){
            $loc = new Location();
            $loc->CountryCode = $locations['CountryCode'];
            $loc->CountryName = $locations['CountryName'];
            $loc->RegionCode = $locations['RegionCode'];
            $loc->RegionName = $locations['RegionName'];
            $loc->City = $locations['City'];
            $loc->Latitude = $locations['Latitude'];
            $loc->Longitude = $locations['Longitude'];
            
            $loc->write();
            
            return $loc;
        }
        else{
            return $dtLoc;
        }
        
    }
}