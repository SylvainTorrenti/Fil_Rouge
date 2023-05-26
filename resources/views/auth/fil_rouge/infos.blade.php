@extends('template.pageCommune')
@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf {{-- protection csrf --}}
        <label for="nom">Entrez votre nom : </label>
        <input type="text" name="nom" id="nom">
        <input type="submit" value="Envoyer !">
    </form>
    @error('nom')
        {{ $message }}
    @enderror
@endsection
