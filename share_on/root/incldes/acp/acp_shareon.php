<?php
class acp_shareon
{
   var $u_action;
   function main($id, $mode)
   {
		global $db, $user, $auth, $template, $cache;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		
		$user->add_lang('acp/common');
		$this->tpl_name = 'acp_shareon';
		$this->page_title = $user->lang['SHAREON_TITLE'];
		
		/*
		* Sumbit form
		*/
		$submit = (isset($_POST['submit'])) ? true : false;
				if ($submit)
		{
			if (!check_form_key('acp_shareon'))
			{
				trigger_error('FORM_INVALID');
			}

			set_config('shareon_index', request_var('shareon_index', true));
			set_config('shareon_forum', request_var('shareon_forum', true));
			set_config('shareon_topic', request_var('shareon_topic', true));

			trigger_error($user->lang['SHAREON_SAVED'] . adm_back_link($this->u_action));
		}
		
		$template->assign_vars(array(
			'SHAREON_INDEX'		=> (!empty($config['shareon_index'])) ? true : false,
			'SHAREON_FORUM'	=> (!empty($config['shareon_forum'])) ? true : false,
			'SHAREON_TOPIC'	=> (!empty($config['shareon_topic'])) ? true : false,
			'U_ACTION'		=> $this->u_action,
			'SHAREON_VERSION'		=> $config['SHAREON_VERSION'],
			'S_VERSION_UP_TO_DATE'	=> $this->shareon_version_compare($config['SHAREON_VERSION']),
		));
		
		/*
		* Version Checker
		* By Saske
		*/
		
		add_form_key('acp_shareon');
		$config['SHAREON_VERSION'] = (isset($config['SHAREON_VERSION'])) ? $config['SHAREON_VERSION'] : '3.0.0';


   }
   
   	function shareon_version_compare($current_version = '', $version_up_to_date = true, $ttl = 86400)
	{
		global $cache, $template;

		$info = $cache->get('shareon_versioncheck');

		if ($info === false)
		{
		$errstr = '';
		$errno = 0;

		$info = get_remote_file('www.phpbbsaske.es', '/version', 'shareon.txt', $errstr, $errno);
		if ($info === false)
		{
			$template->assign_var('S_VERSIONCHECK_FAIL', true);
			$cache->destroy('shareon_versioncheck');
		}
		}

		if ($info !== false)
	{
		$cache->put('shareon_versioncheck', $info, $ttl);
		$latest_version_info = explode("\n", $info);

		$latest_version = strtolower(trim($latest_version_info[0]));
		$current_version = strtolower(trim($current_version));
		$version_up_to_date = version_compare($current_version, $latest_version, '<') ? false : true;

		$template->assign_vars(array(
			'U_VERSIONCHECK'	=> ($version_up_to_date) ? false : $latest_version_info[1],
			'S_VERSIONOLD'		=>	(isset($config['SHAREON_VERSION'])) ? $config['SHAREON_VERSION'] : '3.0.0',
			'S_VERSIONNEW'		=> ($version_up_to_date) ? false : $latest_version_info[0],
		));
	}

		return $version_up_to_date;
	}
}
?>