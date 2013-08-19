<?php
/**
*
* Share On [Español]
*
* @package language
* @version $Id: info_acp_shareon.php
* @copyright (c) Saske ( http://www.phpbbsaske.es )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* 
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
    $lang = array();
}
// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_SHAREON_TITLE'	=>	'Share On',
	'SHAREON_TITLE'		=>	'Share On',
	'SHAREON_EXPLAIN'		=>	'Este MOD te permite compartir los enlaces de tu foro en la redes sociales!',
	'SHAREON_CONFIG'		=>	'Configuración General',
	'SHAREON_INDEX'		=>	'Activar Share On en el indice',
	'SHAREON_INDEX_EXPLAIN'		=>	'Habilitar o deshabilitar los iconos en el índice del foro',
	'SHAREON_FORUM'		=>	'Activar Share On en el foro',
	'SHAREON_FORUM_EXPLAIN'		=>	'Habilitar o deshabilitar los iconos viendo un foro',
	'SHAREON_TOPIC'		=>	'Activar Share On en el tema',
	'SHAREON_TOPIC_EXPLAIN'		=>	'Habilitar o deshabilitar los iconos viendo un tema',
	'SHAREON_VERSION_OLD'		=>	'Versión Actual del MOD:',
	'SHAREON_VERSION_NEW'		=>	'Versión mas reciente del MOD:',
	'SHAREON_SAVED'				=> 'Configuración Actualizada',

));

?>