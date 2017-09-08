<?php

namespace App\Http\Controllers;

use App\Helpers\ReportHelper;
use App\Models\Bank;
use Illuminate\Http\Request;

class ReportController extends Controller
{
	private $api = 'Of4FyAcAulVREqGJo4KqTefcUkU2';

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
   		$view = view('report.report-firebase');
   		$data = $this->getUrlContent('http://api.attendance.app/Of4FyAcAulVREqGJo4KqTefcUkU2/report');
   		$view->list_report = json_decode($data);

    	return $view;
    }

    public function createStep2(Request $request)
    {
   		$data = $this->getUrlContent('http://api.attendance.app/Of4FyAcAulVREqGJo4KqTefcUkU2/report');

    	$view = view('report.create-step-2');
		$view->list_report = json_decode($data);
    	$view->report_id = \Input::get('report_id');
    	$view->report_rid = \Input::get('report_rid');
    	$view->name = \Input::get('name');
    	$view->gaji = \Input::get('gaji');

    	return $view;
    }

    public function store(Request $request)
    {
    	\DB::beginTransaction();
    	
    	$bank = ReportHelper::create($request);

    	\DB::commit();

    	return redirect('bank');
    	dd($bank);
    }

    public function bank()
    {
    	$view = view('report.index');
		$view->list_bank = Bank::all();

		return $view;
    }

    function getUrlContent($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
		curl_setopt($ch, CURLOPT_TIMEOUT, 50);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($httpcode>=200 && $httpcode<300) ? $data : $httpcode;
	}

}
