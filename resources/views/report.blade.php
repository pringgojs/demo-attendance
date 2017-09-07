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
                	Report
                </div>
                <form action="{{url('bank/create-2')}}" method="post">
            	{!! csrf_field() !!}
                <div class="panel-body">
	                <table class="table table-bordered table-striped">
	                	<thead>
						    <tr>
						      <th rowspan="2"><input type="checkbox" id="check-all"></th>
						      <th rowspan="2">Nama</th>
						      <th rowspan="2">Tanggal</th>
						      <th colspan="3">Shift</th>
						      <th colspan="3">Kerja</th>
						      <th colspan="3">Denda Terlambat</th>
						      <th colspan="3">Tunjangan</th>
						      <th rowspan="2">Gaji</th>
					      	</tr>
					      	<tr>
						      <th>Datang</th>
						      <th>Pulang</th>
						      <th>Total</th>
						      <th>Datang</th>
						      <th>Pulang</th>
						      <th>Total</th>
						      <th>Selisih Jam Datang</th>
						      <th>Selisih Jam Pulang</th>
						      <th>Denda</th>
						      <th>Parkir</th>
						      <th>Makan</th>
						      <th>Pulsa</th>
						    </tr>
					  	</thead>
					  	<tbody>
			  			<?php $i = 1; ?>
			  			@if($list_report)
		                @foreach($list_report as $key => $report)
		                <?php $gaji = $report->gaji + $report->tunjangan_pulsa + $report->tunjangan_makan + $report->tunjangan_parkir - $report->denda;?>
		                <input type="hidden" name="gaji[]" value="{{ $gaji }}">
		                <input type="hidden" name="name[]" value="{{ $report->name }}">
		                <tr>
		                	<td class="text-center">
                                <input type="checkbox" name="report_id[]" value="{{$report->id}}">
                            </td>
		                	<td>{{ $report->name }}</td>
		                	<td>{{ $report->date }}</td>
		                	<td>{{ $report->time_in }}</td>
		                	<td>{{ $report->time_out }}</td>
		                	<td>109 menit</td>
		                	<td>{{ $report->check_in }}</td>
		                	<td>{{ $report->check_out }}</td>
		                	<td>09 menit</td>
		                	<td>{{ $report->selisih_jam_datang }}</td>
		                	<td>{{ $report->selisih_jam_pulang }}</td>
		                	<td>{{ $report->denda }}</td>
		                	<td>{{ $report->tunjangan_parkir }}</td>
		                	<td>{{ $report->tunjangan_makan }}</td>
		                	<td>{{ $report->tunjangan_pulsa }}</td>
		                	<td>{{ $gaji }}</td>
		                </tr>
		                <?php $i++;?>
		                @endforeach
		                @endif
					  	</tbody>
	                </table>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


