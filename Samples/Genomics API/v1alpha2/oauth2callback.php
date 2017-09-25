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
//     Template File Name:  ServiceAccount.tt
//     Build date: 2017-09-25
//     PHP generator version: 1.0.0
//     
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------  
// About 
// 
// Unofficial sample for the genomics v1alpha2 API for PHP. 
// This sample is designed to be used with the Google PHP client library. (https://github.com/google/google-api-php-client)
// 
// API Description: Upload, process, query, and search Genomics data in the cloud.
// API Documentation Link https://cloud.google.com/genomics
//
// Discovery Doc  https://www.googleapis.com/discovery/v1/apis/Genomics/v1alpha2/rest
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
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Oauth2Authentication.php';

// Start a session to persist credentials.
session_start();

// Handle authorization flow from the server.
if (! isset($_GET['code'])) {
	$client = buildClient();
	$auth_url = $client->createAuthUrl();
	header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
	$client = buildClient();
	$client->authenticate($_GET['code']); // Exchange the authencation code for a refresh token and access token.
	// Add access token and refresh token to seession.
	$_SESSION['access_token'] = $client->getAccessToken();
	$_SESSION['refresh_token'] = $client->getRefreshToken();	
	//Redirect back to main script
	$redirect_uri = str_replace("oauth2callback.php",$_SESSION['mainScript'],$client->getRedirectUri()); 	
	header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

?>