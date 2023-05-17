@extends('template.pageCommune')
@section('content')
    <form id="creationMessage" action="messageUser" method="get">
        <fieldset>
            <legend>Entrez votre message</legend>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </fieldset>
        <button type="submit">Envoyer</button>
        <p><a href="acceuil">Retour a enlever</a></p>
    </form>
@endsection
