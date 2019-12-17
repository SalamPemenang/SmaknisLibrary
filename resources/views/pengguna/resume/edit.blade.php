@extends('layouts.user-layouts')

@section('title', 'Edit Resume')

@section('content')
<div class="container">
	<div class="card uper">
  <div class="card-header">
    Edit Data Resume
  </div>
  <div class="card-body">
  	@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif