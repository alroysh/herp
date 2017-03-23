<?php
$access_token = 'RkBvlAg6bm1/CvZw72YJBfyVeAsiEHCEXOBEJlDt0B0/wXr7GGPhnoyq0vX1lWjMbJpOOAZim6idr37Qdwqb1uyOMkiAg6blXwecdJ+szGT4t6f6Uv34Nqrok7oGZV+vBm8aoRZeezrXSNzZS+ae0gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
