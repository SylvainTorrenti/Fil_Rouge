@extends('template.pageCommune')
@section('content')
    <h1>Departement n°{{ $dept->DEPTNO }}</h1>
    <p>Nom : {{ $dept->DNAME }}</p>
    <p>Location : {{ $dept->LOC }}</p>
@endsection
