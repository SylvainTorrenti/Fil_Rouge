@extends('template.pageCommune')
@section('content')
    <h2 id="Titre_Acceuil">Bienvenue sur notre plateforme de maintenance informatique de 2ISA.</h2>
    <div id="container">
        <form id="login" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus />
            </div>
            @error('email')
                {{ $message }}
            @enderror
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" required />
            </div>
            @error('password')
                {{ $message }}
            @enderror
            <button type="submit">
                Envoyer
            </button>
            <button type="reset">
                Effacer
            </button>
            <p><a href="mdpoubli">Mot de pass/login oublié?</a></p>
            <p><a id="creation" href="creationCompte">Creation de compte</a></p>
    </div>
    </form>
    <a href="{{ route('logUser') }}">A enlever</a>
@endsection
