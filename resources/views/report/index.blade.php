@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Bank
                </div>
	                <table class="table table-bordered table-striped">
	                	<thead>
						    <tr>
						      <th>Kode</th>
						      <th>Tanggal</th>
						      <th>Akun Bank</th>
						      <th>Jumlah</th>
					      	</tr>
					  	</thead>
					  	<tbody>

		                @foreach($list_bank as $bank)
		                <tr>
		                	<td class="text-center">
                                <a href="{{url('bank/'.$bank->id)}}">{{$bank->form_number}}</a>
                            </td>
		                	<td>
			                	{{$bank->form_date}}
		                	</td>
		                	<td>
			                	{{$bank->bank_account}}
		                	</td>
		                	<td>
			                	{{$bank->total}}
		                	</td>
		                </tr>
		                @endforeach
					  	</tbody>
	                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


