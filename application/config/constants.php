<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| Cookies
|--------------------------------------------------------------------------
 */
define('COOKIE_EXPIRES', 60 * 60 * 24 * 90);                // cookie expires.
define('COOKIE_LOGGEDIN', 'loggedIn');                      // LoggedIn cookie name.
define('COOKIE_RECRUITER_INFO', 'recruiter_info');          // Recruiter info cookie name.
define('COOKIE_SIMILAR_JOB', 'similar_currentjob');      // Similar jobs cookie name.
define('COOKIE_JOBSIMILAR_SUCCESS', 'jobsimilar_successpage');   // Similar jobs cookie for success page.
define('COOKIE_FORCE_FULL_SITE_VIEW', 'force_full_site_view'); // 'View RGF full site' on mobile page.
define('COOKIE_LIST_TITLE', 'list_title');              // Title of list for mobile breadcrumb.
define('COOKIE_LIST_URL', 'list_url');                  // Url of list for mobile breadcrumb.
define('COOKIE_LIST_TOTAL_COUNT', 'list_total_count');  // Total count of list for mobile breadcrumb.
define('COOKIE_LIST_OFFSET', 'list_offset');            // Offset of list for mobile breadcrumb.
define('COOKIE_LIST_MODE', 'list_mode');                // Mode of list for mobile breadcrumb.(search, newjobs, featuredjobs)
define('COOKIE_LIST_WORDS', 'list_words');              // querystring for search mode.

define('COOKIE_COMMON_SEPARATOR', '_');                 // cookie string separator.
define('COOKIE_STRING_LIMIT', 10);                      // max save num.
define('COOKIE_RECENT_VIEW_LIMIT', 12);                 // recent view max save num.
define('COOKIE_SIMILAR_JOB_LIMIT', 700);                // similar job max save num.

define('LIST_MODE_SEARCH', 'search');                   // list mode search.
define('LIST_MODE_NEWJOBS', 'newjobs');                 // list mode newjobs.
define('LIST_MODE_FEATUREDJOBS', 'featuredjobs');       // list mode featuredjobs.

define('COOKIE_SOURCE', 'source');                    // JobCart cookie name.

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('RGF_MAIL_FROM', 'sunil.madana.kumar@ricemerchant.com');
define('RGF_MAIL_TO', 'sunil.madana.kumar@gmail.com');
define('RGF_EMP_MAIL_TO', 'sunil.madana.kumar@gmail.com');
define('RGF_JOFORM_MAIL_TO', 'sunil.madana.kumar@gmail.com');
define('RGF_MAIL_ERROR_TO', 'sunil.madana.kumar@gmail.com');

/* End of file constants.php */
/* Location: ./application/config/constants.php */