@extends('template.pageCommune')
@section('content')
    <div id="container">
        <form id="email" action="" method="POST">Veuillez indiquer votre email : <label for="Login">
                :</label>
            <input type="email" id="email" name="email" required />
            <button type="submit">Valider</button>
    </div>
    </form>
    <p><a href="acceuil">Retour a enlever</a></p>
@endsection
