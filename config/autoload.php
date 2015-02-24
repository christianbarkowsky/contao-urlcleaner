<?php

/**
 * urlcleaner
 * 
 * Copyright (C) 2015 Christian Barkowsky
 * Copyright (C) Jan Theofel 2011-2014
 * Copyright (C) ETES GmbH 2010
 * 
 * @package		urlcleaner
 * @author		Christian Barkowsky <http://christianbarkowsky.de>
 * @author		Jan Theofel <http://www.theofel.de>
 * @author		Sebastian Leitz <sebastian.leitz@etes.de>
 * @license		LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'URLCleaner' => 'system/modules/urlcleaner/classes/URLCleaner.php',
));
