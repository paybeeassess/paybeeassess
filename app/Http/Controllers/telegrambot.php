<?php
/**
 * Created by PhpStorm.
 * User: BORIS
 * Date: 2017/01/20
 * Time: 1:04 AM
 */

/**
 * Our bot token
 * @var $botToken
 */
$botToken = "238881504:AAHUN0OE_mCJSaQG0L79ECOfOMPd_863Gok";

/**
 * The website we are going to access
 * @var $website
 * @var $botToken
 */
$website = "https://api.telegram.org/bot".$botToken;


/**
 * Update our variable
 * @var $website
 */

$update = file_get_contents($website."/getupdates");

//Display the update on the website

print_r($update);
