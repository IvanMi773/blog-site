<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [
    // [
    //     'title' => 'Dashboard',
    //     'icon'  => 'fas fa-tachometer-alt',
    //     'url'   => route('admin.dashboard'),
    // ],

	// [
    //     'title' => 'Articles',
    //     'icon'  => 'fas fa-info-circle',
    //     'url'   => route('admin.articles'),
    // ],

    // [
    //     'title' => 'Information',
    //     'icon'  => 'fas fa-info-circle',
    //     'url'   => route('admin.information'),
	// ],
	
	

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    
    //        \App\User::class,

    //        (new Page(\App\Models\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fas fa-users')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isAdmin();
    //            }),
    //    ]
    // ]
];
