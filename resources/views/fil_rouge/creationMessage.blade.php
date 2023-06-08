@extends('template.pageCommune')
@section('content')
    <form id="creationMessage" action="{{ route('storeMessage', ['ticketId' => $ticketId]) }}" method="post">
        @csrf
        <fieldset>
            <legend>Entrez votre message</legend>
            <textarea name="Content" id="Content" cols="30" rows="10" minlength="3" maxlength="255"></textarea>
        </fieldset>
        <button type="submit">Envoyer</button>
        @error('Content')
            {{ $message }}
        @enderror

    </form>
@endsection
