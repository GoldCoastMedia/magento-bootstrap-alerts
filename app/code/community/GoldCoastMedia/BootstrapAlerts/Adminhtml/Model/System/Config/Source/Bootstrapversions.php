<?php
/**
 * Bootstrap Version
 *
 * @author     Dan Gibbs <dan@goldcoastmedia.co.uk>
 * @copyright  Copyright (c) 2013 Gold Coast Media Ltd <http://www.goldcoastmedia.co.uk>
 */
class GoldCoastMedia_BootstrapAlerts_Adminhtml_Model_System_Config_Source_Bootstrapversions
{
	public function toOptionArray()
	{
		return array(
			array('value' => 3, 'label' => Mage::helper('adminhtml')->__('Bootstrap 3')),
			array('value' => 2, 'label' => Mage::helper('adminhtml')->__('Bootstrap 2')),
		);
	}
}
