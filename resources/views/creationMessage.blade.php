@extends('template.pageCommune')
@section('content')
    <form id="creationMessage" action="{{ route('storeMessage') }}" method="post">
        @csrf
        <fieldset>
            <legend>Entrez votre message</legend>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </fieldset>
        <button type="submit">Envoyer</button>
        @error('message')
            {{ $message }}
        @enderror
        <p><a href="acceuil">Retour a enlever</a></p>
    </form>
@endsection
