<?php
class Location extends DataObject{
    static $db = array(
        'CountryCode' => 'Varchar',
        'CountryName' => 'Varchar',
        'RegionCode' => 'Varchar',
        'RegionName' => 'Varchar',
        'City' => 'Varchar',
        'Latitude' => 'Varchar',
        'Longitude' => 'Varchar'
    );
    
}