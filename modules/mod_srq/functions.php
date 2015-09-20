<?php
/**
* Author:	Omar Muhammad
* Email:	admin@omar84.com
* Website:	http://omar84.com
* Module:	Simple Random Quotes
* Version:	1.7.0
* Date:		23/8/2011
* License:	http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Copyright:Copyright © 2007 - 2011 Omar's Site. All rights reserved.
**/

defined('_JEXEC') or die('Restricted access');
function srq_fetch($backup, $renderer, $dir, $url, $sep, $source)
	{
	$data = '';
	if ($renderer==1)
		$app = new sqRenderer1();
	else if ($renderer==2)
		$app = new sqRenderer2();
	else if ($renderer==3)
		$app = new sqRenderer3();

	if ($source == "1")
		$url	= "http://www.quotedb.com/quote/quote.php?action=random_quote";
	$app->get_page($url);
	$data = $app->process($backup, $dir, $source, $sep);
	return $data;
	}

function readQuotedb($data, $dir, $align1, $align2)
	{
	$val1	= explode("document.write('",$data);
	$val2	= explode("<br>');", $val1[1]);
	$quote	= $val2[0];
	$quote	= str_replace("`", "'", $quote);
	$val3	= explode('">', $val1[2]);
	$val4	= explode('</a>', $val3[1]);
	$author	= $val4[0];
	$final	= '<div id="srq_quote" dir="'.$dir.'" align="'.$align1.'">"'.$quote.'"</div><div id="srq_author" dir="'.$dir.'" align="'.$align2.'" style="padding-top:5px;"><b>'.$author.'</b></div>';
	return $final;
	}

function readBackup($backup, $dir, $align1, $align2)
	{
	for ($i=0; $i<100; $i++)
		{
		$myquote = $backup[rand(1, 9)];
		if ($myquote!="")
			{break;}
		}
	$val2	= explode("-", $myquote);
	$quote	= $val2[0];
	$author	= $val2[1];
	$final	= '<div id="srq_quote" dir="'.$dir.'" align="'.$align1.'">'.$quote.'</div><div id="srq_author" dir="'.$dir.'" align="'.$align2.'" style="padding-top:5px;"><b>'.$author.'</b></div>';
	return $final;
	}

function readMyFile($data, $sep, $dir, $align1, $align2)
	{
	$val1	= explode ("\n", $data);
	for ($i=0; $i<100; $i++)
		{
		$line	= $val1[(rand(0, count($val1)))];
		if ($line != "")
			break;
		}
	if ($sep == "")
		{
		$quote	= $line;
		$author	= "";
		}
	else
		{
		$val2	= explode($sep, $line);
		$quote	= $val2[0];
		$author	= $val2[1];
		}
	$final	= '<div id="srq_quote" dir="'.$dir.'" align="'.$align1.'">'.$quote.'</div><div id="srq_author" dir="'.$dir.'" align="'.$align2.'" style="padding-top:5px;"><b>'.$author.'</b></div>';
	return $final;
	}

class srq_Base
	{
	var $html = '';
	function process($backup, $dir, $source, $sep)
		{
		$data = $this->html;

		if ($dir=="ltr")
			{
			$align1 = "left";
			$align2 = "right";
			}
		else
			{
			$align1 = "right";
			$align2 = "left";
			}
		if ($data=="")
			{
			$final = readBackup($backup, $dir, $align1, $align2);//get from backup file
			}
		else if ($source == "1")
			{
			$final = readQuotedb($data, $dir, $align1, $align2);
			}
		else
			{
			$final = readMyFile($data, $sep, $dir, $align1, $align2);
			}
		return $final;
		}
	}

class sqRenderer1 extends srq_Base
	{
	var $binary = 0;
	function get_page($url)
		{
		if ($url!='')
			{
			$options = array(
				CURLOPT_RETURNTRANSFER	=> true,		// return web page
				CURLOPT_HEADER			=> false,		// don't return headers
				CURLOPT_ENCODING		=> "",			// handle all encodings
				CURLOPT_USERAGENT		=> "spider",	// who am i
				CURLOPT_AUTOREFERER		=> true,		// set referer on redirect
				CURLOPT_CONNECTTIMEOUT	=> 5,			// timeout on connect
				CURLOPT_TIMEOUT			=> 5,			// timeout on response
				CURLOPT_MAXREDIRS		=> 10,			// stop after 10 redirects
				);
			$ch	= curl_init($url);
			curl_setopt_array($ch, $options);
			$this->html = curl_exec($ch);
			curl_close($ch);
			}
		}
	}

class sqRenderer2 extends srq_Base
	{
	function get_page($url)
		{
		if ($url!='')
			{
			$context = stream_context_create(array(
				'http' => array(
					'timeout' => 5		// Timeout in seconds
				)));
			$this->html = @file_get_contents($url, 0, $context);
			}
		}
	}

class sqRenderer3 extends srq_Base
	{
	function get_page($url)
		{
		if ($url!='')
			{
			$context = stream_context_create(array(
				'http' => array(
					'timeout' => 5		// Timeout in seconds
				)));
			$fp = @fopen($url, "r", false, $context);
			if (!$fp)
				{$this->html = "";}
			else
				{
				$output = @stream_get_contents($fp);
				$this->html = $output;
				fclose($fp);
				}
			}
		}
	}
?>
