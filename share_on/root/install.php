<?php

/**
* @author Saske admin@phpbbsaske.es
* @package Index Tabbed
* @version $Id install.php
* @copyright (c) 2013 Saske1 ( http://www.phpbbsaske.es )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();


if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
   trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

$language_file = 'mods/info_acp_shareon';

// The name of the mod to be displayed during installation.
$mod_name = 'SHAREON_TITLE';

$version_config_name = 'shareon_version';

$versions = array(
   // Version 3.0.0
   '3.0.0'   => array(
      // Lets add a config setting
      'config_add' => array(
         array('shareon_index', true),
		 array('shareon_forum', true),
		 array('shareon_topic', true),
		),
	  
	  // Now add the module
		'module_add' => array(
			// First, lets add a new category named SO_ACP to ACP_CAT_DOT_MODS
			array('acp', 'ACP_CAT_DOT_MODS', 'SHAREON_TITLE'),
			// next let's add our module
			array('acp', 'SHAREON_TITLE', array(
					'module_basename'	=> 'shareon',
					),
				),
			),
		'cache_purge' => array('', 'template', 'theme'),
		),
	);

// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>