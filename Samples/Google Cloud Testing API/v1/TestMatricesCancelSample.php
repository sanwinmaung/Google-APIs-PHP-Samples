﻿<?php
// Copyright 2017 DAIMTO ([Linda Lawton](https://twitter.com/LindaLawtonDK)) :  [www.daimto.com](http://www.daimto.com/)
//
// Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with
// the License. You may obtain a copy of the License at
//
// http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on
// an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the
// specific language governing permissions and limitations under the License.
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by DAIMTO-Google-apis-Sample-generator 1.0.0
//     Template File Name:  methodTemplate.tt
//     Build date: 2017-09-25
//     PHP generator version: 1.0.0
//     
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------  
// About 
// 
// Unofficial sample for the testing v1 API for PHP. 
// This sample is designed to be used with the Google PHP client library. (https://github.com/google/google-api-php-client)
// 
// API Description: Allows developers to run automated tests for their mobile applications on Google infrastructure.
// API Documentation Link https://developers.google.com/cloud-test-lab/
//
// Discovery Doc  https://www.googleapis.com/discovery/v1/apis/Testing/v1/rest
//
//------------------------------------------------------------------------------
// Installation
//
// The preferred method is via https://getcomposer.org. Follow the installation instructions https://getcomposer.org/doc/00-intro.md 
// if you do not already have composer installed.
//
// Once composer is installed, execute the following command in your project root to install this library:
//
// composer require google/apiclient:^2.0
//
//------------------------------------------------------------------------------  
// Load the Google API PHP Client Library.
require_once __DIR__ . '/vendor/autoload.php';
session_start();

/***************************************************
* Include this line for service account authencation.  Note: Not all APIs support service accounts.  
//require_once __DIR__ . '/ServiceAccount.php';     
* Include the following four lines Oauth2 authencation.
* require_once __DIR__ . '/Oauth2Authentication.php';
* $_SESSION['mainScript'] = basename($_SERVER['PHP_SELF']);   // Oauth2callback.php will return here.
* $client = getGoogleClient();
* $service = new Google_Service_Testing($client); 
****************************************************/

print_r(testMatricesCancelExample($service, $projectId, $testMatrixId));

/**
* Cancels unfinished test executions in a test matrix.This call returns immediately and cancellation proceeds asychronously.If the matrix is already final, this operation will have no effect.May return any of the following canonical error codes:- PERMISSION_DENIED - if the user is not authorized to read project- INVALID_ARGUMENT - if the request is malformed- NOT_FOUND - if the Test Matrix does not exist
* @service Authenticated Testing service.
* @projectId Cloud project that owns the test.
* @testMatrixId Test matrix that will be canceled.
* @return CancelTestMatrixResponse</returns>
*/
function testMatricesCancelExample($service, $projectId, $testMatrixId)
{
	try
	{
		// Parameter validation.
		if ($service == null)
			throw new Exception("service is required.");
		if (projectId == null)
			throw new Exception("projectId is required.");
		if (testMatrixId == null)
			throw new Exception("testMatrixId is required.");
		// Make the request and return the results.
		return $service->testMatrices->CancelTestMatrices($projectId, $testMatrixId);
	}
	catch (Exception $ex)
	{
		print "An error occurred: " . $e->getMessage();
	}
}
?>
