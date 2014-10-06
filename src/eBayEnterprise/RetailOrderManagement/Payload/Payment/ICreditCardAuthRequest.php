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

use eBayEnterprise\RetailOrderManagement\Payload\IPayload;

/**
 * Interface ICreditCardAuthRequest
 * @package eBayEnterprise\RetailOrderManagement\Payload\Payment
 *
 */
interface ICreditCardAuthRequest extends IPayload
{
    /**
     * RequestId is used to globally identify a request message and is used
     * for duplicate request protection.
     *
     * xsd restrictions: 1-40 characters
     * @return string
     */
    public function getRequestId();
    /**
     * @param string $requestId
     * @return self
     */
    public function setRequestId($requestId);
    /**
     * A unique identifier for the order
     * The client is responsible for ensuring uniqueness across all transactions the client initiates with this service.
     *
     * xsd restrictions: 1-20 characters
     * @return string
     */
    public function getOrderId();
    /**
     * @param string $orderId
     * @return self
     */
    public function setOrderId($orderId);
    /**
     * Indicates if the Payment Account Number (PAN) is the actual number, or a representation of the number.
     *
     * @return bool true if the PAN is a token, false if it's the actual number
     */
    public function getPanIsToken();
    /**
     * @param bool $isToken
     * @return self
     */
    public function setPanIsToken($isToken);
    /**
     * Either a tokenized or plain credit card number.
     *
     * xsd restrictions: 1-22 characters
     * @see get/setPanIsToken
     * @return string
     */
    public function getCardNumber();
    /**
     * @param string $ccNum
     * @return self
     */
    public function setCardNumber($ccNum);
    /**
     * Expiration date of the credit card.
     *
     * xsd note: xsd:gYearMonth
     * @link http://www.w3.org/TR/xmlschema-2/#gYearMonth
     * @return \DateTime
     */
    public function getExpirationDate();
    /**
     * @param \DateTime $date
     * @return self
     */
    public function setExpirationDate(\DateTime $date);
    /**
     * The card security code is the number on the back of the credit card
     * that is normally required for authorizations.
     *
     * xsd note: maxLength 4
     *           pattern (\d{3,4})?
     * return string
     */
    public function getCardSecurityCode();
    /**
     * @param string $cvv
     * @return self
     */
    public function setCardSecurityCode($cvv);
    /**
     * The amount to authorize
     *
     * xsd note: minimum value 0
     *           maximum precision 2 decimal places
     * @return float
     */
    public function getAmount();
    /**
     * @param float $amount
     * @return self
     */
    public function setAmount($amount);
    /**
     * The 3-character ISO 4217 code that represents
     * the type of currency being used for a transaction.
     *
     * @link http://www.iso.org/iso/home/standards/currency_codes.htm
     * @return string
     */
    public function getCurrencyCode();
    /**
     * @param string $code
     * @return self
     */
    public function setCurrencyCode($code);
    /**
     * E-mail address of the customer making the purchase.
     *
     * xsd restrictions: 1-70 characters
     * xsd pattern: ([a-zA-Z0-9_\-])([a-zA-Z0-9_\-\.]*)@(\[((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}|((([a-zA-Z0-9\-]+)\.)+))([a-zA-Z]{2,}|(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\])
     *
     * @return string
     */
    public function getEmail();
    /**
     * @param string $email
     * @return self
     */
    public function setEmail($email);
    /**
     * IP Address of the customer making the purchase.
     *
     * xsd pattern: ((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])
     *
     * @return string
     */
    public function getIp();
    /**
     * @param string $ip
     * @return self
     */
    public function setIp($ip);
    /**
     * First name of the person on the billing address of the credit card
     *
     * @return string
     */
    public function getBillingFirstName();
    /**
     * @param string $name
     * @return self
     */
    public function setBillingFirstName($name);
    /**
     * Last name of the person on the billing address of the credit card
     *
     * @return string
     */
    public function getBillingLastName();
    /**
     * @param string $name
     * @return self
     */
    public function setBillingLastName($name);
    /**
     * Billing phone number of the person
     *
     * @return string
     */
    public function getBillingPhone();
    /**
     * @param string $phone
     * @return self
     */
    public function setBillingPhone($phone);
    /**
     * The street address and/or suite and building
     *
     * Newline-delimited string, at most four lines
     * xsd restriction: 1-70 characters per line
     * @return string
     */
    public function getBillingLines();
    /**
     * @param string $lines
     * @return self
     */
    public function setBillingLines($lines);
    /**
     * Name of the city
     *
     * xsd restriction: 1-35 characters
     * @return string
     */
    public function getBillingCity();
    /**
     * @param string $city
     * @return self
     */
    public function setBillingCity($city);
    /**
     * Typically a two- or three-digit postal abbreviation for the state or province.
     * ISO 3166-2 code is recommended, but not required
     *
     * xsd restriction: 1-35 characters
     * @return string
     */
    public function getBillingMainDivision();
    /**
     * @param string $div
     * @return self
     */
    public function setBillingMainDivision($div);
    /**
     * Two character country code.
     *
     * xsd restriction: 2-40 characters
     * @return string
     */
    public function getBillingCountryCode();
    /**
     * @param string $code
     * @return self
     */
    public function setBillingCountryCode($code);
    /**
     * Typically, the string of letters and/or numbers that more closely
     * specifies the delivery area than just the City component alone,
     * for example, the Zip Code in the U.S.
     *
     * xsd restriction: 1-15 characters
     * @return string
     */
    public function getBillingPostalCode();
    /**
     * @param string $code
     * @return self
     */
    public function setBillingPostalCode($code);
    /**
     * First name of the person on the shipping address of the order
     *
     * @return string
     */
    public function getShipToFirstName();
    /**
     * @param string $name
     * @return self
     */
    public function setShipToFirstName($name);
    /**
     * Last name of the person on the shipping address of the order
     *
     * @return string
     */
    public function getShipToLastName();
    /**
     * @param string $name
     * @return self
     */
    public function setShipToLastName($name);
    /**
     * ShipTo phone number of the person
     *
     * @return string
     */
    public function getShipToPhone();
    /**
     * @param string $phone
     * @return self
     */
    public function setShipToPhone($phone);
    /**
     * The street address and/or suite and building
     *
     * Newline-delimited string, at most four lines
     * xsd restriction: 1-70 characters per line
     * @return string
     */
    public function getShipToLines();
    /**
     * @param string $lines
     * @return self
     */
    public function setShipToLines($lines);
    /**
     * Name of the city
     *
     * xsd restriction: 1-35 characters
     * @return string
     */
    public function getShipToCity();
    /**
     * @param string $city
     * @return self
     */
    public function setShipToCity($city);
    /**
     * Typically a two- or three-digit postal abbreviation for the state or province.
     * ISO 3166-2 code is recommended, but not required
     *
     * xsd restriction: 1-35 characters
     * @return string
     */
    public function getShipToMainDivision();
    /**
     * @param string $div
     * @return self
     */
    public function setShipToMainDivision($div);
    /**
     * Two character country code.
     *
     * xsd restriction: 2-40 characters
     * @return string
     */
    public function getShipToCountryCode();
    /**
     * @param string $code
     * @return self
     */
    public function setShipToCountryCode($code);
    /**
     * Typically, the string of letters and/or numbers that more closely
     * specifies the delivery area than just the City component alone,
     * for example, the Zip Code in the U.S.
     *
     * xsd restriction: 1-15 characters
     * @return string
     */
    public function getShipToPostalCode();
    /**
     * @param string $code
     * @return self
     */
    public function setShipToPostalCode($code);
    /**
     * Indicates that this is an authorization re-submission to correct AVS or CVV2 error.
     * If set to true, this will process the transaction specifically as an AVS/CVV check.
     * This is important to set correctly, otherwise the cardholder will have
     * their credit card authed multiple times for the full payment amount when correcting
     * AVS/CSC errors.
     *
     * @return bool
     */
    public function getIsRequestToCorrectCvvOrAvsError();
    /**
     * @param bool $flag
     * @return self
     */
    public function setIsRequestToCorrectCvvOrAvsError($flag);
    /**
     * Verified by VISA (VPAS) e-commerce transactions only.
     * Verify Enrollment Response from the VERes message,
     * returned to the POE from the ACS server as a result of a Verify Enrollment Request
     *
     * 'Y' - Card eligible for authentication processing
     * 'N' - Attempted authentication. Card eligible for attempts liability,
     *       but attempts proof is not available from Issuer.
     * 'U' - Unable to process or card not eligible for attempts.
     *
     * @return string
     */
    public function getAuthenticationAvailable();
    /**
     * @param string $token
     * @return self
     */
    public function setAuthenticationAvailable($token);
    /**
     * Verified by VISA (VPAS) / MasterCard Secure Code (UCAF)
     * Transaction Status: For e-commerce VISA and MasterCard transactions only.
     * Returned in the PARes message from the ACS server in the “Transaction Status” field.
     *
     * 'Y' - Authentication Approved
     * 'A' - Authentication attempted.
     * 'U' - Unable to authenticate (due to technical problems or excluded card type).
     * 'N' - Authentication failed.
     *
     * @return string
     */
    public function getAuthenticationStatus();
    /**
     * @param string $token
     * @return self
     */
    public function setAuthenticationStatus($token);
    /**
     * E-commerce Verified by VISA and MasterCard SecureCode transactions only.
     * Data returned in authentication request.
     * For VISA, this field contains CAVV values in upacked, displayable format (0-9, A-F).
     * For MasterCard, this field contains the UCAF data in upacked, displayable base-64 format
     * (A-Z, a-z, 0-9, +, /, -).
     *
     * xsd restriction: maxLength 64 characters
     *
     * @return string
     */
    public function getCavvUcaf();
    /**
     * @param string $data
     * @return self
     */
    public function setCavvUcaf($data);
    /**
     * E-commerce Verified by VISA transactions only.
     * XID data returned from authentication request
     * in upacked, displayable format (0-9, AF).
     *
     * xsd restriction: maxLength 64 characters
     *
     * @return string
     */
    public function getTransactionId();
    /**
     * @param string $id
     * @return self
     */
    public function setTransactionId($id);
    /**
     * @return string
     */
    public function getEci();
    /**
     * @param string $eci
     * @return self
     */
    public function setEci($eci);
    /**
     * The Issuer Bank ACS (Access Control Server) authenticates the cardholder.
     * The authentication result is represented by the Payer Authentication Response (PARes)
     * generated by the Card Issuer ACS.
     *
     * xsd restriction: maxLength 10000 characters
     *
     * @return string
     */
    public function getPayerAuthenticationResponse();
    /**
     * @param string $response
     * @return self
     */
    public function setPayerAuthenticationResponse($response);
}