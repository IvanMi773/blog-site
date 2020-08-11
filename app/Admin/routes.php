<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}]);

// Route::get('articles', ['as' => 'admin.articles', function () {
// 	$content = 'Define your articles here.';
// 	return AdminSection::view($content, 'Articles');
// }]);