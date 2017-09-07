<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
	private $api = 'Of4FyAcAulVREqGJo4KqTefcUkU2';

    public function index()
    {
   		$view = view('report');
   		$data = $this->getUrlContent('http://api.attendance.app/Of4FyAcAulVREqGJo4KqTefcUkU2/report');
   		$view->list_report = json_decode($data);

    	return $view;
    }

    function getUrlContent($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($httpcode>=200 && $httpcode<300) ? $data : $httpcode;
	}

}
