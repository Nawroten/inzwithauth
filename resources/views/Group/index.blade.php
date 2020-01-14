@extends('master')
@extends('sidebar')
@section('content')
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
<div class="container mt-2">
<br />
  <h3 class="text-center">Wybierz Grupę:</h3>
  <br />
<div class="row">
@foreach($groups as $row)
<div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Kierunek: {{$row['kierunek']}}</h5>
        <p class="card-text">
      <p>Semestr: {{$row['semestr']}}</p>
      <p>Grupa dziekańska: {{$row['gr_dziekanska']}}</p>
      <p>Id grupy: {{$row['id_groups']}}</p> 
      </p>
     <a href="{{ url('livetable', $row['id_groups']) }}" class="btn btn-primary">Wybierz</a>
    </div>
  </div>
  </div>
   @endforeach
</div>
@endsection
