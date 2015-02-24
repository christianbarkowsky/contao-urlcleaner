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


class URLCleaner extends \Frontend
{
	
	public function removeItemFromUrl($arrPage, $strParams, $strUrl)
	{
		// return if not configured		
		if(!is_array($GLOBALS['TL_CONFIG']['arrUrlFragments'])) return $strUrl;

		// remove unwanted URL parts
		foreach($GLOBALS['TL_CONFIG']['arrUrlFragments'] as $key => $value)
		{
			$strUrl = str_replace(($key . '/' . $value), $key, $strUrl);
		}
		
		return $strUrl;
	}
	
	
	public function addItemToUrl($arrFragments)
	{
		// return if not configured		
		if(!is_array($GLOBALS['TL_CONFIG']['arrUrlFragments'])) return $arrFragments;
				
		// make URL modifications
		foreach ($GLOBALS['TL_CONFIG']['arrUrlFragments'] as $key => $value)
		{
			if($arrFragments[0] == $key && $arrFragments[1] == "auto_item")
			{
				if(strpos($arrFragments[0],"/"))
				{
					$arrFragments[1] = $value;
				}
				else	
				{
					$arrFragments[0] = $arrFragments[0] . "/" . $value;
				}
			}	
		}
		
		return $arrFragments;
	}
}
