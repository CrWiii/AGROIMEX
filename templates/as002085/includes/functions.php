<?php 

/*******************************************************************************************/
/*
/*		Designed by 'AS Designing'
/*		Web: http://www.asdesigning.com
/*		Web: http://www.astemplates.com
/*		License: GNU/GPL
/*
/******************************************************************************************/

defined('_JEXEC') or die;

// Wrap Title words with Spans
function wrap_with_span($string)
{
	if(strpos($string, '||'))
	{
	  $string_delim_arr = explode('||', $string);
	  $string = $string_delim_arr[0];
	}
	$string_array = explode(" ", $string); 
	$string_spans[] = "";
  
    foreach ($string_array as $key => $value) 
	{
      $string_spans[] = '<span class="item_title_part' . $key . '">'.$value.'</span> ';
    }
  
	$wrapped_string = implode($string_spans);
	return  $wrapped_string;
}

function str_split_unicode($str) 
{
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
}

// Wrap chars words with Spans
function wrap_chars_with_span($string)
{
	$string_array = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY); 
	$string_spans[] = "";
	foreach ($string_array as $key => $value) 
	{
		if($value == " ")
			$value = "&nbsp;";
		$string_spans[] = '<span class="char_' . $key . '">'.$value.'</span> ';
	}
	$wrapped_string = implode($string_spans);
	return  $wrapped_string;
}  

//Limit words
function limit_words($string, $word_limit)
{
	$words = explode (" ",$string);
	return implode (" ",array_splice ($words,0,$word_limit));
}

//Wrap with tags
function wrap_with_tag($string, $tag)
{
	$wrapped_string = '<'. $tag .'>'. $string .'</'. $tag .'>';
	return  $wrapped_string;
}