<?php
/**
 * This block displays the Wiwi index.
 * 
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$  
 */

defined('ICMS_URL') || define('ICMS_URL', XOOPS_URL);
defined('ICMS_ROOT_PATH') || define('ICMS_ROOT_PATH', XOOPS_ROOT_PATH);

$wikiModDir = basename(dirname(dirname(__FILE__)));
include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/class/wiwiRevision.class.php';

function swiki_toc() {
	global $xoopsDB, $xoopsUser;
	$wikiModDir = basename(dirname(dirname(__FILE__)));
	$block = array();
	$myts =& MyTextSanitizer::getInstance();

	$sql = 'SELECT keyword, title, visible, prid FROM ' . $xoopsDB->prefix('wiki_pages') . ' p, ' 
		. $xoopsDB->prefix('wiki_revisions') . ' r WHERE p.pageid=r.pageid AND lastmodified=modified AND visible>0 ORDER BY visible, title ';
	$result = $xoopsDB->query($sql);
	
	//Filter each entry according to its privilege
	$prf = new WiwiProfile();
	while($tcontent = $xoopsDB->fetchArray($result)) {
		$prf->load($tcontent['prid']);
		if ($prf->canRead()) {
			$link = array();
			$link['page'] = wiwiRevision::encode($tcontent['keyword']);
			$link['title'] = $myts->htmlSpecialChars($tcontent['title']);
			$block['links'][] = $link;
		}
	}

	$block['dirname'] = $wikiModDir;
	return $block;
}
