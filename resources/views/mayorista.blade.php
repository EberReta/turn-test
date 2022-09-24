@extends('layouts.app')


@section('content')
<h1>Mayorista</h1>

<div class="d-flex justify-content-between">
    <mayorista-search-input></mayorista-search-input>
    <div>
        <a class="btn btn-dark" href="/mayorista/create" >+ Nuevo Mayorista</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <mayorista-table></mayorista-table>
    </div>
</div>

@endsection
