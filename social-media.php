<?php

function twitter_acc($user) {
	$a = simplexml_load_string(file_get_contents("http://twitter.com/users/show.xml?screen_name=$user"));
	if($a===FALSE) {
		return;
	} else {
		return array($a->followers_count, $a->statuses_count);
	}
}

function fb_likes($user) {
        $xml = json_decode(file_get_contents("http://graph.facebook.com/$user"));
        return array($xml->likes, $xml->talking_about_count);
}

function fb_shares($user) {
        $xml = json_decode(file_get_contents("http://graph.facebook.com/$user"));
        return $xml->shares;
}

?>
