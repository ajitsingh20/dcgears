<?php
/**
 * Copyright © 2022. Abhinav All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Vendor\Module\Model\Config\Source;

use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;
use Magento\Framework\DB\Ddl\Table;

class DesignType extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * @var OptionFactory
     */
    protected $optionFactory;

    /**
     * Get all options
     *
     * @return array
     */
    public function getAllOptions()
    {
        /* your Attribute options list*/
        $this->_options= [ 
                          ['label'=>'Design - 1 (Default)', 'value'=>'0'],
                          ['label'=>'Design - 2 (Mode 1)', 'value'=>'1'],
                          ['label'=>'Design - 3 (Mode 2)', 'value'=>'2']
                         ];
        return $this->_options;
    }
}
