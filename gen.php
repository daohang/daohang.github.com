<?php

$DH_input_html  = 'index.html.tpl';
$DH_output = dh_file_get_contents($DH_input_html);

$DH_input_html  = 'site.xml';
$DH_output_site = dh_file_get_contents($DH_input_html);


$DH_output = str_replace("%content10%",getcontent($DH_output_site),$DH_output);	


$DH_output_file = 'index.html';
dh_file_put_contents($DH_output_file,$DH_output);

function getcontent($DH_output_site)
{
	$ret = preg_match_all('/<r><1>(.*?)<\/1><2>(.*?)<\/2><3>(.*?)<\/3><4>(.*?)<\/4><5>(.*?)<\/5><6>(.*?)<\/6><\/r>/s',$DH_output_site,$match);
	//print_r($match);

	$DH_output_content='';

	foreach ($match[0] as $key=>$eachmatch)
	{
		$DH_output_content.='<li><div>'.$key.' <span class="line1 w100pre"><a href="'.$match[4][$key].'" target="_blank" >'.$match[5][$key].'</a></span></div><div class="hotmeta1">'.$match[6][$key].'</div></li>';
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