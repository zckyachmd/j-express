<?php
require __DIR__.'/../vendor/autoload.php';

//Config
$resi = "JXEC***********";

//Step 1 : get _token & ci_session
$clientG    = new GuzzleHttp\Client(['cookies' => true]);
$res        = $clientG->request('GET', 'https://www.j-express.id/');
$body       = $res->getBody()->getContents();
$crawler    = new Symfony\Component\DomCrawler\Crawler($body);
$token      = $crawler->filter('input[name="_token"]')->extract(array('value'))[0];

$cookieJar  = $clientG->getConfig('cookies');
$cookieJar->toArray();

foreach ($cookieJar as $cookie){
    $cookies[$cookie->getName()] = $cookie->getValue();
}

$ci_session = $cookies['ci_session'];

//Step 2 : tracking
$client     = new GuzzleHttp\Client([
    'headers' => [
        'Content-Type'  => 'application/x-www-form-urlencoded; charset=UTF-8',
        'Host'          => 'www.j-express.id',
        'Origin'        => 'https://www.j-express.id',
        'Referer'       => 'https://www.j-express.id/',
        'Cookie'        => '_token='.$token.'; ci_session='.$ci_session,
        'User-Agent'    => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36',
    ]
]);
$cek        = $client->post(
    'https://www.j-express.id/api/a_tracking',
    [
        'form_params' => [
            '_token' => $token,
            'code' => $resi
        ]
    ]
);
    
$response   = $cek->getBody()->getContents();
$json       = json_decode($response);

if($json->status == "success"){
    //Data found
    $i = count($json->track);
    foreach($json->track as $track){
        echo $i . ". " . $track->times."\n";
        echo "➤ " . $track->state."\n\n";
        $i--;
    }
} else {
    echo "Data not found";
}