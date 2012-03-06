#Service Bundle

Simplified service routing

##Install with Artisan

	php artisan bundle:install service

##Bundle Registration

	'service' => array(
		'autoloads' => array(
			'map' => array(
				'Service' => '(:bundle)/service.php',
			),
		),
	),

##Method A

	Service::get('some/(path)', array('html', 'json', 'xml'), function(Service $service, $arg1)
	{
		$service->data['users'] = User::where_active(1);
		
		switch ($service->type)
		{
			case 'html':
				return View::make('some.view', array(
					'content' => $service->data
				));
			break;
		}
		
		// return $service; implied
	});
	
##Method B

	Route::get(array('some/path', 'some/path.(json|xml)'), function($type = 'html')
	{
		return Service::respond($type, array('html', 'json', 'xml'), function(Service $service)
		{
			$service->data['users'] = User::where_active(1);

 		switch ($service->type)
			{
				case 'html':
					return View::make('some.view', array(
						'content' => $service->data
					));
				break;
			}
		
			// return $service; implied
		});
	});
