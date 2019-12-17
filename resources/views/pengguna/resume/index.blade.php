@extends('layouts.user-layouts')

@section('title', 'Data Resume')

@section('content')
@if(session()->get('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div><br/>
@endif
<a href="{{ route('resume.tambah') }}" class="btn btn-primary btn-sm">+ Tambah</a><br><br>
<table class="table table-striped border text-center">
    <thead>
        <tr>
          <td>Anggota Id</td>
          <td>Kelas Id</td>
          <td>Deskripsi</td>
          <td colspan="2">Kelola Data</td>
      	</tr>
    </thead>
    <tbody>
        @foreach($resume as $res)
        <tr>
            <td>{{$res->anggota_id}}</td>
            <td>{{$res->kelas_id}}</td>
            <td>{{$res->deskripsi}}</td>
            <td><a href="{{ route('resume.edit', $res->resume_id)}}" class="btn btn-warning btn-sm">Edit</a></td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
@stop