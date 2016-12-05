<?php

/** 
 *           Copyright (C) 2013 creativ.com
 * 
 *  This file is part of CREATIV Portal system developed
 *  by creativ.com.
 * 
 *  PHP Version 5
 *  file: config.php
 * 
 *  @author    depirianto@creativ.com
 *  @copyright 2013 creativ.com
 *  @version   SVN: <svn_id> Release: 1.0
 *  @link      www.creativ.com
 *  @since     Release: www.creativ.com March 26, 2013 8:21:00 PM
 */

define('REFRESH_ALL_CACHE', true);

defined('BASE_DOMAIN') || define('BASE_DOMAIN', 'site.com');

defined('GA_UA') || define('GA_UA', 'UA-40198227-1');

defined('COOKIE_BASED') || define('COOKIE_BASED', '.' . BASE_DOMAIN);

if (isset($noInternal) and $noInternal) {
    
} else {
    define('INTERNAL_ONLY', 'tc-free');
}

define('APPLICATION_ENV', 'development');

define('THEMES_DIR', 'sith');
define('M_THEMES_DIR', 'me');
define('HTTPS', false);
define('CACHE_HOST', 'localhost');
define('DYNAMODB_TABLE_PREFIX', '');
define('DYNAMODB_REG','us-west-2');
define('MSG_CACHEHOST', 'msg_localhost');
define('ELASTICHOST', 'localhost');
define('ELASTICPORT', '9200');
define('REDISHOST', 'localhost');
define('BUCKETIMAGE', 'tc_userimages');
define('BUCKETMUSIC', 'tc_usermusic');
define('DB_PORT', '3036');
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'tallcat');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('MUSICRTMP', 'rtmp://s1iwsrfdjhu0ep.cloudfront.net/cfx/st');
define('MUSICCF', 'https://d262ruh3jsyv1o.cloudfront.net');
define('IMAGECF', 'http://local-static.site.com/sith/repository');


define('SOCKET_HOST', '127.0.0.1');
define('SOCKET_PORT', '20000');
define('TAGSERVER_HOST', '127.0.0.1');
define('TAGSERVER_PORT', '20001');
define('NEO4JHOST', 'localhost');
define('PIWIKURL', '');
define('PIWIKID', '');
define('PIWIKTITLE', 'Iamacreativ');
define('PIWIKAUTH', 'tallcat');

define('LOG_PATH', 'D:/Projects/Git/php/www_logs/tallcat/');
define('AUTH_NS', 'Tallcat_Auth');

$portalSub = 'local-my';
$publicSub = 'local-www';
$staticSub = 'local-static';
$uploadSub = 'local-upload';
$communitySub = 'local-change';
$apiSub="local-api";
$mobileSub="local-m";

$proto = 'http';
if (isset($_SERVER['X-Forwarded-Proto'])) {
    $proto = strtolower($_SERVER['X-Forwarded-Proto']);
}

if (HTTPS && ($proto == 'http')) {
    header('Location: https://' . $publicSub . '.' . BASE_DOMAIN);
    exit;
} else{
    if ($proto == 'https') { 
        header('Location: http://' . $publicSub . '.' . BASE_DOMAIN);
        exit;
    }
}
    
define('PROTO', $proto);

define('CHANGE_DOMAIN', $communitySub . '.' . BASE_DOMAIN);
define('COMMUNITY_BASE', $proto . '://' . $communitySub . '.' . BASE_DOMAIN);
define('PORTAL_BASE', $proto . '://' . $portalSub . '.' . BASE_DOMAIN);
define('TALLCAT_BASE', $proto . "://" . $publicSub . '.' . BASE_DOMAIN);
define('TALLCAT_MAIL', 'http://' . $publicSub . '.' . BASE_DOMAIN);
define('STATIC_BASE', $proto . '://' . $staticSub . '.' . BASE_DOMAIN); 
define('API_BASE', $proto . '://' . $apiSub . '.' . BASE_DOMAIN); 
define('UPLOAD_BASE', $proto . '://' . $uploadSub . '.' . BASE_DOMAIN);

define('WEB_BASE', PROTO . '://' . $publicSub . '.' . BASE_DOMAIN);
define('MOBILE_BASE', PROTO . '://'.$mobileSub.'.' . BASE_DOMAIN);
define('DS', DIRECTORY_SEPARATOR);
defined('VERSION_FILE_PATH') || define('VERSION_FILE_PATH', '000');
define('CONFIG_PATH', __DIR__);
defined('FORCE_HTTP') || define('FORCE_HTTP', true);
defined('FORCE_HTTPS') || define('FORCE_HTTPS', false);