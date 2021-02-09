<table class="table" style="border:1px solid;">
	<thead style="border:1px solid;">
		<tr>
			<th>NAMA LENGKAP</th>
			<th>JENIS KELAMIN</th>
			<th>AGAMA</th>
			<th>NILAI RATA-RATA</th>
		</tr>
	</thead>
	<tbody >
		@foreach($siswa as $s)
		<tr >
			<td>{{$s->nama_lengkap()}}</td>
			<td>{{$s->jenis_kelamin}}</td>
			<td>{{$s->agama}}</td>
			<td>{{$s->rataRataNilai()}}</td>
		</tr>
		@endforeach
	</tbody>
		
</table>