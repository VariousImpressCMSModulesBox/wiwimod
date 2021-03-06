<?php
/**
 * Main header file of SimplyWiki
 *
 * @package SimplyWiki
 * @author Wiwimod: Xavier JIMENEZ
 *
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @version $Id$
 */

/*
 * Be sure mainfile has been included
 */
include_once '../../mainfile.php';
defined('ICMS_URL') || define('ICMS_URL', XOOPS_URL);
defined('ICMS_ROOT_PATH') || define('ICMS_ROOT_PATH', XOOPS_ROOT_PATH);

$myts = MyTextSanitizer::getInstance();

global $wikiModDir;
$wikiModDir = basename(dirname(__FILE__));
$modversion['dirname'] = $wikiModDir;

include_once ICMS_ROOT_PATH . '/class/xoopsformloader.php';
include_once ICMS_ROOT_PATH . '/modules/' . $wikiModDir . '/include/functions.php';

