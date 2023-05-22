@extends('template.pageCommune')
@section('content')
    <div id="containerCreat">
        <form id="creationTicket" action="{{ route('storeTicket') }}" method="POST">
            @csrf
            <label for="materiel">Quel est le materiel avec un probléme? :</label>
            <input type="text" id="materiel" name="materiel" required />
            @error('materiel')
                {{ $message }}
            @enderror
            <label for="description">Veuillez expliquez votre probléme :</label>
            <textarea id="description" name="description" required></textarea><br>
            @error('description')
                {{ $message }}
            @enderror
            <button type="submit">
                Envoyer
            </button>
            <button type="reset">
                Effacer
            </button>
            <p>Tout les champs sont obligatoire</p>
    </div>
    </form>
    <p><a href="acceuil">Retour a enlever</a></p>
@endsection
