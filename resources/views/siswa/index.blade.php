
	@extends('layouts.master')
	@section('content')


	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
  		{{session('sukses')}}
	</div>
	@endif
	<div class="row">
		<div class="col-6">
			<h1>Data Siswa</h1>
		</div>	
		<div class="col-6">
			<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
 			 Tambah Data Siswa
			</button>
		</div>
		
<table class="table ">
	<tr>
	<th>Nama Depan</th>
	<th>Nama Belakang</th>
	<th>Jenis Kelamin</th>
	<th>Agama</th>
	<th>Alamat</th>
	<th>Aksi</th>
	</tr>
	@foreach($data_siswa as $siswa)
	<tr>
		<td>{{$siswa->nama_depan}}</td>
		<td>{{$siswa->nama_belakang}}</td>
		<td>{{$siswa->jenis_kelamin}}</td>
		<td>{{$siswa->agama}}</td>
		<td>{{$siswa->alamat}}</td>
		<td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
			<a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm ('BENARINNI MAU DIHAPUS?')">Delete</a>
		</td>
	</tr>
	@endforeach
</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="/siswa/create" method="POST">
       	{{csrf_field()}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nama Depan</label>
	    <input type="text" class="form-control" name="nama_depan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Depan">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	  <label for="exampleInputEmail1">Nama Belakang</label>
	    <input type="text" class="form-control" name="nama_belakang" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Belakang">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
	    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
	      <option value="L">Laki-Laki</option>
	      <option value="P">Perempuan</option>
	    </select>
  </div>
  <div class="form-group">
	  <label for="exampleInputEmail1">Agama</label>
	    <input type="text" class="form-control" name="agama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	   <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Submit</button>
     </form>
      </div>
    </div>
  </div>

	@endsection


