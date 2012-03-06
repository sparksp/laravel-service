<?php

/**
 * Register a JSON service
 * 
 * @param  Service $service
 * @return string
 */
Service::register('json', function(Service $service)
{
	$service->header('Content-Type', 'application/json');

	return json_encode($service->data);
});
