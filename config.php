<?php
	
	$config['plugins'] = [
		[
			'name' => 'aosjs',
			'assets' => [
				'css' => [
					'local' => 'assets/aosjs/*.css',
					'cdn' => 'https://unpkg.com/aos@next/dist/aos.css'
				],
				'js' => [
					'local' => 'assets/aosjs/*.js',
					'cdn' => 'https://unpkg.com/aos@next/dist/aos.js',
					'init' => '<script>AOS.init();</script/>'
				]
			]
		],
		[
			'name' => 'jquery',
			'assets' => [
				'js' => [
					'local' => 'assets/jquery-3.4.1/*.js',
				]
			]
		],
		[
			'name' => 'bootstrap',
			'assets' => [
				'css' => [
					'local' => 'assets/bootstrap-4.3.1-dist/css/*.css',
					'cdn' => 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css'
				],
				'js' => [
					'local' => 'assets/bootstrap-4.3.1-dist/js/*.js',
					'cdn' => 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'
				]
			]
		],
		[
			'name' => 'animatecss',
			'assets' => [
				'css' => [
					'local' => 'assets/animatecss/*.css',
					'cdn' => 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css'
				]
			]
		],
		
		[
			'name' => 'themify',
			'assets' => [
				'css' => [
					'local' => 'assets/themify-icons/themify-icons.css'
				]
			]
		],
		[
			'name' => 'flexslider',
			'assets' => [
				'css' => [
					'local' => 'assets/flexslider/*.css'
				],
				'js' => [
					'local' => 'assets/flexslider/*.js',
				]

 			]
		],
		[
			'name' => 'smoothscroll',
			'assets' => [
				'js' => [
					'local' => 'assets/smoothscroll/*.js',
				]
			]
		],
		[
			'name' => 'materialicons',
			'assets' => [
				'css' => [
					'local' => 'assets/material-icons/css/*.css'
				]
			]
		],
		[
			'name' => 'pdcomponents',
			'assets' => [
				'css' => [
					'local' => 'assets/pdcomponents/*.css'
				],
				'js' => [
					'local' => 'assets/pdcomponents/*.js'
				]
			]
		]
	];


	// $config['autoload'] = [
	// 	'header' => [
	// 		[
	// 			'type' => 'css',
	// 			'src' => 'mama.css',
	// 			'media' => 'print'
	// 		],
	// 		[
	// 			'type' => 'css',
	// 			'src' => 'mama2.css',
	// 			'media' => 'all'
	// 		],
	// 		[
	// 			'type' => 'js',
	// 			'src' => 'mama.js',
	// 			'async' => true
	// 		]
	// 	],
	// 	'footer' => [
	// 		[
	// 			'src' => 'mama.js',
	// 			'async' => true
	// 		]
	// 	]
	// ];