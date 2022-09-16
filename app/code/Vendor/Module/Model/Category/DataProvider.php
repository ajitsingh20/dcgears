<?php
/**
 * Copyright © 2022. Abhinav All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Vendor\Module\Model\Category;
 
class DataProvider extends \Magento\Catalog\Model\Category\DataProvider
{
 
	protected function getFieldsMap()
	{
    	$fields = parent::getFieldsMap();
        $fields['content'][] = 'custom_image'; // custom image field
	$fields['content'][] = 'frontend_design'; // custom frontend design    	
    	return $fields;
	}
}
