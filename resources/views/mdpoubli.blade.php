@extends('template.pageCommune')
@section('content')
    <div id="container">
        <form id="email" action="{{ route('mdpOubliForm') }}" method="POST">
            @csrf
            <label for="Login">Veuillez indiquer votre email :</label>
            <input type="email" id="email" name="email" required />
            @error('email')
                {{ $message }}
            @enderror
            <button type="submit">Valider</button>
    </div>
    </form>
    <p><a href="acceuil">Retour a enlever</a></p>
@endsection
