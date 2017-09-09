<?php

namespace App\Helpers;

use App\Models\Bank;
use App\Models\BankDetail;

class ReportHelper
{
	public static function getData()
	{
		$data = array(
			['name' => 'Yuliati',
			'id' => '1',
			'date' => '08-09-2017',
			'time_in' => '08:00',
			'time_out' => '16:00',
			'selisih' => '2 Menit',
			'check_in' => '07:45',
			'check_out' => '16:12',
			'selisih_jam_pulang' => '12 Menit',
			'selisih_jam_datang' => '15 Menit',
			'denda' => '0',
			'tunjangan_parkir' => '5000',
			'tunjangan_makan' => '5000',
			'tunjangan_pulsa' => '5000',
			'gaji' => '100000'],
			['name' => 'Dewi',
			'id' => '2',
			'date' => '08-09-2017',
			'time_in' => '08:00',
			'time_out' => '16:00',
			'selisih' => '0 Menit',
			'check_in' => '07:55',
			'check_out' => '16:01',
			'selisih_jam_pulang' => '01 Menit',
			'selisih_jam_datang' => '55 Menit',
			'denda' => '0',
			'tunjangan_parkir' => '5000',
			'tunjangan_makan' => '5000',
			'tunjangan_pulsa' => '5000',
			'gaji' => '100000'],
			['name' => 'Dangga',
			'id' => '3',
			'date' => '08-09-2017',
			'time_in' => '08:00',
			'time_out' => '16:00',
			'selisih' => '0 Menit',
			'check_in' => '08:10',
			'check_out' => '16:00',
			'selisih_jam_pulang' => '00 Menit',
			'selisih_jam_datang' => '00 Menit',
			'denda' => '2000',
			'tunjangan_parkir' => '5000',
			'tunjangan_makan' => '5000',
			'tunjangan_pulsa' => '5000',
			'gaji' => '100000'],
		);		

		return $data;	
	}

	public static function create($request)
	{
		$bank = new Bank;
		$number = self::number($request->input('form_date'));
		$bank->form_date = $request->input('form_date');
		$bank->form_number = $number['number'];
		$bank->raw_number = $number['raw'];
		$bank->bank_account = $request->input('bank_account');
		$bank->notes = $request->input('notes');
		$bank->payment_flow = 'out';
		$bank->total = $request->input('total');
		$bank->save();

		for ($i=0; $i < count($request->input('name')); $i++) { 
			$bank_detail = new BankDetail;
			$bank_detail->finance_bank_id = $bank->id;
			$bank_detail->account_name = $request->input('account_name')[$i];
			$bank_detail->person_name = $request->input('name')[$i];
			$bank_detail->notes = $request->input('notes_detail')[$i];
			$bank_detail->amount = $request->input('amount')[$i];
			$bank_detail->save();
		}

		return $bank;
	}

	public static function number($date)
	{
		$date = explode('-', $date);
		$raw_number = 1;
		$last_number = Bank::max('raw_number');
		if ($last_number) {
			$raw_number = $last_number + 1;
		}
		$number = 'BANK-KELUAR/'.$raw_number.'/'.$date[1].'/'.$date[2];

		return array('raw' => $raw_number, 'number' => $number);
	}

}