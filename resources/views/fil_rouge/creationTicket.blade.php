@extends('template.pageCommune')
@section('content')
    <div id="containerCreat">
        <form id="creationTicket" action="{{ route('logUserPost') }}" method="POST">
            @csrf
            <label for="materiel">Avec quel matériel rencontrez-vous un problème ? :</label>
            <input type="text" id="materiel" name="materiel" required minlength="3" />
            @error('materiel')
                {{ $message }}
            @enderror
            <label for="Sujet">Veuillez expliquer votre problème :</label>
            <textarea id="Sujet" name="Sujet" required minlength="3"></textarea><br>
            @error('Sujet')
                {{ $message }}
            @enderror
            <button type="submit">
                Envoyer
            </button>
            <button type="reset">
                Effacer
            </button>
            <p>Tous les champs sont obligatoires</p>
    </div>
    </form>
@endsection
