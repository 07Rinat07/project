<?php 	

$settings_settings  = R::find( 'settings', 'section LIKE ? ', [ 'settings' ] );

$settings = [];

foreach ($settings_settings as $key => $value) {
	$settings[$value['name']] = $value['value'];
}