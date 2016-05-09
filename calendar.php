<?php

$post_data = $HTTP_RAW_POST_DATA;

$header[] = "Content-type: text/xml";
$header[] = "Content-length: ".strlen($post_data);

$ch = curl_init('http://www.google.com/calendar/feeds/likuski.org_umjmva7f5g00j0fgpbtaj1iocg%40group.calendar.google.com/public/basic?futureevents=true&amp;orderby=starttime&amp;sortorder=ascending' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

if ( strlen($post_data)>0 ){
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
}

$response = curl_exec($ch);
$response_headers = curl_getinfo($ch);

if (curl_errno($ch)) {
    print curl_error($ch);
} else {
    curl_close($ch);
    header( 'Content-type: ' . $response_headers['content-type']);
    print $response;
}
?>
