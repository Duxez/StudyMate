<?php


namespace App\Services;


class QrCode
{

    private $googleApiUrl = 'https://chart.googleapis.com/chart?';

    public function __construct()
    {
        $this->getQrCode();
    }

    private function getQrCode()
    {
        $filename = null;
        $call = curl_init();
        curl_setopt($call, CURLOPT_URL, $this->googleApiUrl);
        curl_setopt($call, CURLOPT_POST, true);
        curl_setopt($call, CURLOPT_POSTFIELDS, "chs=150x150&cht=qr&chl=http://127.0.0.1:8000/dashboard");
        curl_setopt($call, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($call, CURLOPT_HEADER, false);
        $img = curl_exec($call);
        curl_close($call);

        if($img) {
            if($filename) {
                if(!preg_match("#\.png$#i", $filename)) {
                    $filename .= ".png";
                }

                return file_put_contents($filename, $img);
            } else {
                header("Content-type: image/png");
                print $img;
                return true;
            }
        }
        return false;
    }

}
