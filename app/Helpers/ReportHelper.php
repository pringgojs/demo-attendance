<?php

namespace App\Helpers;

use App\Models\Bank;
use App\Models\BankDetail;

class ReportHelper
{
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