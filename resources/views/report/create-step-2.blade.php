@extends('layouts.app')

@section('content')
<script type="text/javascript">
    $("#check-all").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
</script>
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
                            <input type="date" name="form_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Akun Bank </label>
                        <div class="col-md-6">
                        	<select class="form-control" name="bank_account">
                        		<option value="BNI IDR">BNI IDR</option>
                        		<option value="BRI IDR">BRI IDR</option>
                        		<option value="BCA IDR">BCA IDR</option>
                        	</select>
                        </div>
                    </div>
                	<div class="form-group">
                        <label class="col-md-3 control-label">Keterangan</label>
                        <div class="col-md-6">
                            <input type="text" name="notes" class="form-control">
                        </div>
                    </div>

	                <table class="table table-bordered table-striped">
	                	<thead>
						    <tr>
						      <th>Akun</th>
						      <th>Nama</th>
						      <th>Keterangan</th>
						      <th>Jumlah</th>
					      	</tr>
					  	</thead>
					  	<tbody>
                        <?php $total_gaji = 0;?>

			  			@if($report_id)
		                @foreach($report_id as $key => $id)
		                <?php
		                $i = array_search($id, $report_rid);
                        $total_gaji += $gaji[$i];
                        ?>
		                
		                <tr>
		                	<td class="text-center">
                                <input type="text" name="account_name[]" value="Akun Gaji Pegawai" class="form-control">
                            </td>
		                	<td>
			                	<input type="text" class="form-control" name="name[]" value="{{ $name[$i] }}">
		                	</td>
		                	<td>
			                	<input type="text" name="notes_detail[]" value="" class="form-control">
		                	</td>
		                	<td>
			                	<input type="text" name="amount[]" class="form-control text-right" value="{{$gaji[$i]}}">
		                	</td>
		                </tr>
		                @endforeach
		                <tr>
		                	<input type="hidden" name="total" value="{{$total_gaji}}">
		                	<td colspan="4" class="text-right">{{$total_gaji}}</td>
		                </tr>
		                @endif
					  	</tbody>
	                </table>
	                <input type="submit" class="btn btn-default" value="Submit">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


