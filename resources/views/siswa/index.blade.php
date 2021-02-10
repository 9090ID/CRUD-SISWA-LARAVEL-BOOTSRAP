
	@extends('layouts.master')
	@section('content')
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
									<div class="right">
									<a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importsiswa">
									  Import Excel
									</a>
									<a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Export Excel</a>	
									<a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export Pdf</a>	
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle" ></i></button>

								</div>
									</div>
								<div class="panel-body">
									<table class="table table-striped" id="id_table">
										<thead>
											<tr>
												<th>Nomor</th>
												<th>Nama Lengkap</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Alamat</th>
												<th>Nilai Rata-Rata</th>
												<th>Aksi</th>
											</tr>
										</thead>
										
									</table>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>

<!-- Modal Import Data Excel -->
<div class="modal fade" id="importsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {!! Form::open(['route' => 'siswa.import','class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
		
		{!!Form::file('data_siswa')!!}
		
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-sm btn-primary" value="import">
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>




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
       <form action="/siswa/create" method="POST" enctype="multipart/form-data">
       	{{csrf_field()}}
	  <div class="form-group{{$errors->has('nama_depan') ? 'has-error' : ''}}">
	    <label for="exampleInputEmail1">Nama Depan</label>
	    <input type="text" class="form-control" name="nama_depan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Depan" value="{{old('nama_depan')}}">
	    @if($errors->has('nama_depan'))
	    <span class="help-block">{{$errors->first('nama_depan')}}</span>
	    @endif
	  </div>
	  <div class="form-group">
	  <label for="exampleInputEmail1">Nama Belakang</label>
	    <input type="text" class="form-control" name="nama_belakang" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nama Belakang" value="{{old('nama_belakang')}}">
	  </div>

	   <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
	  <label for="exampleInputEmail1">Email</label>
	    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" value="{{old('email')}}">
	    @if($errors->has('email'))
	    <span class="help-block">{{$errors->first('email')}}</span>
	    @endif
	  </div>

	   <div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
	    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
	    <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
	      <option value="L">Laki-Laki</option>
	      <option value="P">Perempuan</option>
	    </select>
	    @if($errors->has('jenis_kelamin'))
	    <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
	    @endif
  </div>
  <div class="form-group">
	  <label for="exampleInputEmail1">Agama</label>
	    <input type="text" class="form-control" name="agama" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
	  </div>
	  <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
  </div>
  <div class="form-group{{$errors->has('avatar') ? 'has-error' : ''}}">
						    <label for="exampleFormControlTextarea1">Avatar</label>
						     <input type="file" class="form-control" name="avatar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('avatar')}}" >
						  </div>
						 @if($errors->has('avatar'))
	    <span class="help-block">{{$errors->first('avatar')}}</span>
	    @endif  
   </div>
 

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Submit</button>
     </form>
      </div>
    </div>
  </div>


	@stop

	@section('footer')
	<script>

		$(document).ready(function(){

			$('#id_table').DataTable({
				processing:true,
				serverside:true,
				ajax:"{{route('ajax.get.data.siswa')}}",
				columns:[
						{data:'DT_RowIndex', name:'DT_RowIndex'}, 
						{data:'nama_lengkap',name:'nama_lengkap'},
						{data:'jenis_kelamin',name:'jenis_kelamin'},
						{data:'agama',name:'agama'},
						{data:'alamat',name:'alamat'},
						{data:'rata2_nilai',name:'rata2_nilai'},
						//{data:'aksi',name:'aksi'},
						//{data:'delete',name:'delete'},
						{
			                data: 'action', 
			                name: 'action', 
			                orderable: true, 
			                searchable: true
			            },
						]
				});

			$('body').on('click','.delete',function(){

						var siswa_id = $(this).attr('siswa-id');
						swal({
								  title: "Yakin Mau dihapus?",
								  text: "Dihapus untuk siswa dengan id "+siswa_id + " ??",
								  icon: "warning",
								  buttons: true,
								  dangerMode: true,
								})
								.then((willDelete) => {
								console.log(willDelete);
								  
								  if (willDelete) {
								  	window.location = "/siswa/"+siswa_id+"/delete";
								  }
						});
					});

			});

	</script>
	@stop