<?php
class acp_shareon_info
{
    function module()
    {
        return array(
            'filename'    => 'acp_shareon',
            'title'        => 'SHAREON_TITLE',
            'version'    => '3.0.0',
            'modes'        => array(
                'index'        => array('title' => 'ACP_SHAREON_TITLE', 'auth' => 'acl_a_board', 'cat' => array('')),
            ),
        );
    }

    function install()
    {
    }

    function uninstall()
    {
    }
}
?>