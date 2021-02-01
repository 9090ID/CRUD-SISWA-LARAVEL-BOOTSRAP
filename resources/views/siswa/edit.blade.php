
	
	@extends('layouts.master')
	@section('content')

	<h1>Edit Data Siswa</h1>
	@if(session('sukses'))
	<div class="alert alert-success" role="alert">
  		{{session('sukses')}}
	</div>
	@endif
	<div class="row">
		<div class="col-lg-12">
<form action="/siswa/{{$siswa->id}}/update" method="POST">
       	{{csrf_field()}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nama Depan</label>
	    <input type="text" class="form-control" name="nama_depan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Depan" value="{{$siswa->nama_depan}}">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	  <label for="exampleInputEmail1">Nama Belakang</label>
	    <input type="text" class="form-control" name="nama_belakang" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Belakang" value="{{$siswa->nama_belakang}}">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	   <div class="form-group">
	    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
	    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
	      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
	      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
	    </select>

  <div class="form-group">
	  <label for="exampleInputEmail1">Agama</label>
	    <input type="text" class="form-control" name="agama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}" >
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	   <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
  </div>
      </div>
      <div class="modal-footer">
     <button type="submit" class="btn btn-warning">Update</button>
     </form>
</div>
@endsection
