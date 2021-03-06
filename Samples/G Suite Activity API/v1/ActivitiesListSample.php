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
//     Build date: 2017-10-08
//     PHP generator version: 1.0.0
//     
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------  
// About 
// 
// Unofficial sample for the appsactivity v1 API for PHP. 
// This sample is designed to be used with the Google PHP client library. (https://github.com/google/google-api-php-client)
// 
// API Description: Provides a historical view of activity.
// API Documentation Link https://developers.google.com/google-apps/activity/
//
// Discovery Doc  https://www.googleapis.com/discovery/v1/apis/appsactivity/v1/rest
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
* $service = new Google_Service_Appsactivity($client); 
****************************************************/

// Option paramaters can be set as needed.
 $optParams = array(
            
  //'drive.ancestorId' => '[YourValue]',  // Identifies the Drive folder containing the items for which to return activities.
            
  //'drive.fileId' => '[YourValue]',  // Identifies the Drive item to return activities for.
            
  //'groupingStrategy' => '[YourValue]',  // Indicates the strategy to use when grouping singleEvents items in the associated combinedEvent object.
            
  //'pageSize' => '[YourValue]',  // The maximum number of events to return on a page. The response includes a continuation token if there are more events.
            
  //'pageToken' => '[YourValue]',  // A token to retrieve a specific page of results.
            
  //'source' => '[YourValue]',  // The Google service from which to return activities. Possible values of source are: - drive.google.com
            
  //'userId' => '[YourValue]',  // Indicates the user to return activity for. Use the special value me to indicate the currently authenticated user.
  'fields' => '*'
);
// Single Request.
$results = activitiesListExample($service, $optParams);

// Paginiation Example
do {
    if (!$results->getNextPageToken()) 
		break;

	$optParams['pageToken'] = $results->getNextPageToken();
	$results = filesListExample($service, $optParams);	
} while($results->getNextPageToken());  

/**
* Returns a list of activities visible to the current logged in user. Visible activities are determined by the visiblity settings of the object that was acted on, e.g. Drive files a user can see. An activity is a record of past events. Multiple events may be merged if they are similar. A request is scoped to activities from a given Google service using the source parameter.
* @service Authenticated Appsactivity service.
* @optParams Optional paramaters are not required by a request.
* @return ListActivitiesResponse
*/
function activitiesListExample($service, $optParams)
{
	try
	{
		// Parameter validation.
		if ($service == null)
			throw new Exception("service is required.");
		if ($optParams == null)
			throw new Exception("optParams is required.");
		// Make the request and return the results.
		return $service->activities->ListActivities($optParams);
	}
	catch (Exception $e)
	{
		print "An error occurred: " . $e->getMessage();
	}
}
?>
