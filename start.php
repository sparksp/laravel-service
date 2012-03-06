<?php

// Register a JSON service
Service::register('json', function(Service $service)
{
	$service->header('Content-Type', 'application/json');

	return json_encode($service->data);
});
