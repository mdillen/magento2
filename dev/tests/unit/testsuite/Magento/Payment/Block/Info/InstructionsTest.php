<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Payment
 * @subpackage  unit_tests
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Test class for \Magento\Payment\Block\Info\Instructions
 */
namespace Magento\Payment\Block\Info;

class InstructionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Object
     */
    protected $_method;

    /**
     * @var \Magento\Payment\Model\Info
     */
    protected $_info;

    /**
     * @var \Magento\Payment\Block\Info\Instructions
     */
    protected $_instructions;

    protected function setUp()
    {
        $objectManagerHelper = new \Magento\TestFramework\Helper\ObjectManager($this);
        $this->_method = new \Magento\Object();
        $this->_info = $objectManagerHelper->getObject('Magento\Payment\Model\Info');
        $this->_instructions = $objectManagerHelper->getObject('Magento\Payment\Block\Info\Instructions');

        $this->_info->setMethodInstance($this->_method);
        $this->_instructions->setInfo($this->_info);
    }

    public function testGetInstructionsSetInstructions()
    {
        $this->assertNull($this->_instructions->getInstructions());
        $testInstruction = 'first test';
        $this->_method->setInstructions($testInstruction);
        $this->assertEquals($testInstruction, $this->_instructions->getInstructions());
    }

    public function testGetInstructionsSetInformation()
    {
        $this->assertNull($this->_instructions->getInstructions());
        $testInstruction = 'second test';
        $this->_info->setAdditionalInformation('instructions', $testInstruction);
        $this->assertEquals($testInstruction, $this->_instructions->getInstructions());
    }
}
