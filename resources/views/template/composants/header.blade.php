<header>
    <div id="logo"><img src="/image/logo.webp" alt="Logo 2ISA"></div>
    <div id="Titre_Header">
        <a href="{{ route('acceuil') }}">
            <h1 id="TitrePrincipale">Maintenance du Parc Informatique</h1>
        </a>
    </div>
    @if (!auth()->guest())
        <div id="textAvatar">{{ auth()->user()->name }} <img id="avatar" src="/image/profile.png" alt="avatar"></div>
        <form method="POST" action="{{ route('logout') }}">
            <button type="submit">Se déconnecter</button>
            @csrf
        @else
    @endif

    </form>
</header>
