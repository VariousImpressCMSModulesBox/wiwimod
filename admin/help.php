<?php
/**
 * About SimplyWiki, the wysiwyg wiki
 * 
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id: about.php 5726 2008-10-16 16:00:36Z skenow $  
 */
/** Include the admin header for SimplyWiki */   
include_once 'admin_header.php';

xoops_cp_header();
if (method_exists($xoopsModule, 'displayAdminMenu')) {
	echo $xoopsModule->displayAdminMenu(5, 'help');
} else {
	echo getAdminMenu(5, 'help');
}
echo "in development...";

xoops_cp_footer();
