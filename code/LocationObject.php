<?php
/***
 *
 *
 ***/
class LocationObject extends DataObjectDecorator
{
    function extraStatics() {
		return array(
			'has_one' => array(
				'Location' => 'Location'
			),
		);
	}
	
    
    function onBeforeWrite(){
	parent::onBeforeWrite();
	//$controller = Controller::curr();
	
	//$loc = $controller->getGeoLocation('219.89.224.209');
	
	//$this->owner->LocationID = $loc->ID;
    }
    
    function onAfterWrite(){
	parent::onAfterWrite();
	
    }
}