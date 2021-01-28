<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function index()
  {
    $this->load->view('home');
  }

  public function check()
  {
    if ($_POST) {
      $recaptcha = new \ReCaptcha\ReCaptcha('6Le3UgUaAAAAACaZDdWY38D7x2PrHSSBsZ5I7Cov');
      $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])->verify($_POST['g-recaptcha-response'],  $_SERVER['REMOTE_ADDR']);

      if (!$resp->isSuccess()) {
        $this->session->set_flashdata('error', 'Captcha verification failed!');

        redirect(base_url('/'));
      }

      $this->form_validation->set_rules('resi', 'Resi', 'required');

      if ($this->form_validation->run() != FALSE) {
        $resi = $this->input->post('resi');

        //Step 1 : get _token & ci_session
        $clientG    = new GuzzleHttp\Client(['cookies' => true]);
        $res        = $clientG->request('GET', 'https://www.j-express.id/');
        $body       = $res->getBody()->getContents();
        $crawler    = new Symfony\Component\DomCrawler\Crawler($body);
        $token      = $crawler->filter('input[name="_token"]')->extract(array('value'))[0];

        $cookieJar  = $clientG->getConfig('cookies');
        $cookieJar->toArray();

        foreach ($cookieJar as $cookie) {
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
            'Cookie'        => '_token=' . $token . '; ci_session=' . $ci_session,
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

        $this->session->set_flashdata('result', $response);
      } else {
        $this->session->set_flashdata('error', 'Oops! Something went wrong!');
      }
    }

    redirect(base_url('/'));
  }
}
