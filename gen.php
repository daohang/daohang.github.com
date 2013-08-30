<?php

$DH_input_html  = 'index.html.tpl';
$DH_output = dh_file_get_contents($DH_input_html);

$DH_input_html  = 'site.xml';
$DH_output_site = dh_file_get_contents($DH_input_html);


$DH_output = str_replace("%content10%",getcontent2($DH_output_site,'1','0'),$DH_output);
$DH_output = str_replace("%content11%",getcontent2($DH_output_site,'1','1'),$DH_output);
$DH_output = str_replace("%content12%",getcontent2($DH_output_site,'1','2'),$DH_output);	
$DH_output = str_replace("%content13%",getcontent2($DH_output_site,'1','3'),$DH_output);
$DH_output = str_replace("%content14%",getcontent2($DH_output_site,'1','4'),$DH_output);

$DH_output = str_replace("%content20%",getcontent2($DH_output_site,'2','0'),$DH_output);
$DH_output = str_replace("%content21%",getcontent2($DH_output_site,'2','1'),$DH_output);
$DH_output = str_replace("%content22%",getcontent2($DH_output_site,'2','2'),$DH_output);
$DH_output = str_replace("%content23%",getcontent2($DH_output_site,'2','3'),$DH_output);

$DH_output = str_replace("%content30%",getcontent2($DH_output_site,'3','0'),$DH_output);
$DH_output = str_replace("%content31%",getcontent2($DH_output_site,'3','1'),$DH_output);
$DH_output = str_replace("%content32%",getcontent2($DH_output_site,'3','2'),$DH_output);
$DH_output = str_replace("%content33%",getcontent2($DH_output_site,'3','3'),$DH_output);
$DH_output = str_replace("%content34%",getcontent2($DH_output_site,'3','4'),$DH_output);

$DH_output = str_replace("%content40%",getcontent2($DH_output_site,'4','0'),$DH_output);
$DH_output = str_replace("%content41%",getcontent2($DH_output_site,'4','1'),$DH_output);
$DH_output = str_replace("%content42%",getcontent2($DH_output_site,'4','2'),$DH_output);

$DH_output_file = 'index.html';
dh_file_put_contents($DH_output_file,$DH_output);

function getcontent($DH_output_site)
{
	$ret = preg_match_all('/<r><1>(.*?)<\/1><2>(.*?)<\/2><3>(.*?)<\/3><4>(.*?)<\/4><5>(.*?)<\/5><6>(.*?)<\/6><7>(.*?)<\/7><8>(.*?)<\/8><\/r>/s',$DH_output_site,$match);
	//print_r($match);

	$DH_output_content='';

	foreach ($match[0] as $key=>$eachmatch)
	{
		if(empty($match[7][$key]))
			$DH_output_content.='<li><div class="siteall"><img width="16" height="16" data-src="'.$match[4][$key].'favicon.ico"/> <a href="'.$match[4][$key].'" target="_blank" >'.$match[5][$key].'</a></div><div class="hotmeta1">'.$match[6][$key].'</div></li>';
		else
			$DH_output_content.='<li><div class="siteall"><img width="16" height="16" data-src="'.$match[7][$key].'"/> <a href="'.$match[4][$key].'" target="_blank" >'.$match[5][$key].'</a></div><div class="hotmeta1">'.$match[6][$key].'</div></li>';
	}
	return $DH_output_content;
}

function getcontent1($DH_output_site,$r1)
{
	$ret = preg_match_all('/<r><1>('.$r1.')<\/1><2>(.*?)<\/2><3>(.*?)<\/3><4>(.*?)<\/4><5>(.*?)<\/5><6>(.*?)<\/6><7>(.*?)<\/7><8>(.*?)<\/8><\/r>/s',$DH_output_site,$match);
	//print_r($match);

	$DH_output_content='';

	foreach ($match[0] as $key=>$eachmatch)
	{
		if(empty($match[7][$key]))
			$DH_output_content.='<li><div class="siteall"><img width="16" height="16" data-src="'.$match[4][$key].'favicon.ico"/> <a href="'.$match[4][$key].'" target="_blank" rel="nofollow">'.$match[5][$key].'</a></div><div class="hotmeta1">'.$match[6][$key].'</div></li>';
		else
			$DH_output_content.='<li><div class="siteall"><img width="16" height="16" data-src="'.$match[7][$key].'"/> <a href="'.$match[4][$key].'" target="_blank" rel="nofollow">'.$match[5][$key].'</a></div><div class="hotmeta1">'.$match[6][$key].'</div></li>';
	}
	return $DH_output_content;
}

function getcontent2($DH_output_site,$r1,$r2)
{
	$ret = preg_match_all('/<r><1>('.$r1.')<\/1><2>('.$r2.')<\/2><3>(.*?)<\/3><4>(.*?)<\/4><5>(.*?)<\/5><6>(.*?)<\/6><7>(.*?)<\/7><8>(.*?)<\/8><\/r>/s',$DH_output_site,$match);
	//print_r($match);

	$DH_output_content='';

	foreach ($match[0] as $key=>$eachmatch)
	{
		if(empty($match[7][$key]))
			$DH_output_content.='<li><div class="siteall"><img width="16" height="16" data-src="'.$match[4][$key].'favicon.ico"/> <a href="'.$match[4][$key].'" target="_blank" rel="nofollow">'.$match[5][$key].'</a></div><div class="hotmeta1">'.$match[6][$key].'</div></li>';
		else
			$DH_output_content.='<li><div class="siteall"><img width="16" height="16" data-src="'.$match[7][$key].'"/> <a href="'.$match[4][$key].'" target="_blank" rel="nofollow">'.$match[5][$key].'</a></div><div class="hotmeta1">'.$match[6][$key].'</div></li>';
	}
	return $DH_output_content;
}

function dh_file_get_contents($filename) 
{
	$fh = fopen($filename, 'rb', false)or die("Can not open file: $filename.\n");
	clearstatcache();
	if ($fsize = @filesize($filename)) {
		$data = fread($fh, $fsize);
	} else {
		$data = '';
		while (!feof($fh)) {
			$data .= fread($fh, 8192);
		}
	}
	fclose($fh);
	return $data;
}

function dh_file_put_contents($filename, $content) {
	
	// Open the file for writing
	$fh = @fopen($filename, 'wb', false)or die("Can not open file: $filename.\n");
	// Write to the file
	$ext=strrchr($filename,'.');
//	if ($ext=='.html')
//		$content = higrid_compress_html($content);
	@fwrite($fh, $content);
	// Close the handle
	@fclose($fh);
}
?>