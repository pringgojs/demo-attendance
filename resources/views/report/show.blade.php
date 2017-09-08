@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Bank
                </div>
                <form action="{{url('bank/save')}}" method="post" class="form-horizontal form-bordered">
            	{!! csrf_field() !!}
                <div class="panel-body">
                	<div class="form-group">
                        <label class="col-md-3 control-label">Tanggal Formulir</label>
                        <div class="col-md-6">
                            {{ $bank->form_date }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nomor Formulir</label>
                        <div class="col-md-6">
                            {{ $bank->form_number }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Akun Bank </label>
                        <div class="col-md-6">
                        	{{ $bank->bank_account}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Total</label>
                        <div class="col-md-6">
                            {{ $bank->total}}
                        </div>
                    </div>
                	<div class="form-group">
                        <label class="col-md-3 control-label">Keterangan</label>
                        <div class="col-md-6">
                            {{ $bank->notes}}
                        </div>
                    </div>

	                <table class="table table-bordered table-striped">
	                	<thead>
						    <tr>
						      <th>Akun</th>
						      <th>Nama</th>
						      <th>Keterangan</th>
						      <th class="text-right">Jumlah</th>
					      	</tr>
					  	</thead>
					  	<tbody>

		                @foreach($bank->details as $bank_detail)
		                <tr>
		                	<td>{{ $bank_detail->account_name }}</td>
                            <td>{{ $bank_detail->person_name}}</td>
                            <td>{{ $bank_detail->notes}}</td>
		                	<td>{{ $bank_detail->amount}}</td>
		                </tr>
		                @endforeach
					  	</tbody>
	                </table>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


