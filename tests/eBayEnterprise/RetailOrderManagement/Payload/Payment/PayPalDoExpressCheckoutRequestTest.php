<?php
/**
 * Copyright (c) 2013-2014 eBay Enterprise, Inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @copyright   Copyright (c) 2013-2014 eBay Enterprise, Inc. (http://www.ebayenterprise.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace eBayEnterprise\RetailOrderManagement\Payload\Payment;

use eBayEnterprise\RetailOrderManagement\Payload;
use eBayEnterprise\RetailOrderManagement\Util\TPayloadTest;

class PayPalDoExpressCheckoutRequestTest extends \PHPUnit_Framework_TestCase
{
    use TPayloadTest;

    /** @var  Payload\IValidator */
    protected $validatorStub;
    /** @var Payload\IValidatorIterator */
    protected $validatorIterator;
    /** @var  Payload\ISchemaValidator */
    protected $schemaValidatorStub;
    /** @var Payload\IPayloadMap (stub) */
    protected $payloadMapStub;

    /**
     * data provider of empty array of properties
     * Empty properties will generate an invalid IPayload object
     *
     * @return array $payloadData
     */
    public function provideInvalidPayload()
    {
        $payloadData = [];

        return [
            [$payloadData]
        ];
    }

    /**
     * Provide test data to verify serializeShippingAddress
     */
    public function provideShippingAddressData()
    {
        return [
            [
                [
                    'shipToLines' => [
                        'Chester Cheetah',
                        '',
                        '630 Allendale Rd',
                        '2nd FL',
                    ],
                    'shipToCity' => 'King of Prussia',
                    'shipToMainDivision' => 'PA',
                    'shipToCountryCode' => 'US',
                    'shipToPostalCode' => '19406'
                ],
                // full section returned
                '<ShippingAddress>'
                . '<Line1>Chester Cheetah</Line1>'
                . '<Line2></Line2>'
                . '<Line3>630 Allendale Rd</Line3>'
                . '<Line4>2nd FL</Line4>'
                . '<City>King of Prussia</City>'
                . '<MainDivision>PA</MainDivision>'
                . '<CountryCode>US</CountryCode>'
                . '<PostalCode>19406</PostalCode>'
                . '</ShippingAddress>'
            ]
        ];
    }

    /**
     * @param array $payloadData
     * @dataProvider provideInvalidPayload
     * @expectedException \eBayEnterprise\RetailOrderManagement\Payload\Exception\InvalidPayload
     */
    public function testValidateWillFail(array $payloadData)
    {
        $payload = $this->buildPayload($payloadData);
        $this->validatorStub->expects($this->any())
            ->method('validate')
            ->will($this->throwException(new Payload\Exception\InvalidPayload));
        $payload->validate();
    }

    /**
     * Take an array of property values with property names as keys and return an IPayload object
     *
     * @param array $properties
     * @return PayPalDoExpressCheckoutRequest
     */
    protected function buildPayload(array $properties)
    {
        $payload = new PayPalDoExpressCheckoutRequest(
            $this->validatorIterator,
            $this->schemaValidatorStub,
            $this->payloadMapStub
        );
        foreach ($properties as $property => $value) {
            $payload->$property($value);
        }
        return $payload;
    }

    /**
     * @param array $payloadData
     * @dataProvider provideInvalidPayload
     * @expectedException \eBayEnterprise\RetailOrderManagement\Payload\Exception\InvalidPayload
     */
    public function testSerializeWillFailPayloadValidation(array $payloadData)
    {
        $payload = $this->buildPayload($payloadData);
        $this->validatorStub->expects($this->any())
            ->method('validate')
            ->will($this->throwException(new Payload\Exception\InvalidPayload()));
        $payload->serialize();
    }

    protected function setUp()
    {
        $this->payloadMapStub = $this->stubPayloadMap();
        $this->validatorStub = $this->getMock('\eBayEnterprise\RetailOrderManagement\Payload\IValidator');
        $this->validatorIterator = new Payload\ValidatorIterator([$this->validatorStub]);
        $this->schemaValidatorStub = $this->getMock('\eBayEnterprise\RetailOrderManagement\Payload\ISchemaValidator');
    }

    /**
     * Read an XML file with valid payload data and return a canonicalized string
     *
     * @return string
     */
    protected function xmlTestString()
    {
        $dom = new \DOMDocument();
        $dom->load(__DIR__.'/Fixtures/PayPalDoExpressCheckoutRequest.xml');
        $string = $dom->C14N();

        return $string;
    }

    /**
     * Inject property values into $class
     *
     * @param $class
     * @param array $properties array of property => value pairs
     */
    protected function injectProperties($class, $properties)
    {
        // use reflection to inject properties/values into the $class object
        $reflection = new \ReflectionClass($class);
        foreach ($properties as $property => $value) {
            $requestProperty = $reflection->getProperty($property);
            $requestProperty->setAccessible(true);
            $requestProperty->setValue($class, $value);
        }
    }
}
