@extends('template.pageCommune')
@section('content')
    @if ($statut->Label == 'En cours')


        <div id="statut">
            <h2><strong>Ticket Numero : </strong>{{ $ticket->Id }}</h2>
            <p><strong>Le ticket concerne : </strong>{{ $ticket->Materiel }}</p>
            <p><strong>Le problème rencontré est : </strong>{{ $ticket->Sujet }}</p>
            @if (auth()->user()->isAdmin())
                <p><strong>L'auteur est : </strong>{{ $user->Prenom }} {{ $user->name }}</p>
            @endif
            <p><strong>Le ticket a été créé le :</strong>{{ $ticket->CreatedAt }}</p>
            <p><strong>Statut : </strong>
                <span id="statut-label">{{ $statut->Label }}</span>
                @if (auth()->user()->isAdmin())
                    <p>
                        <button id="ButtonStatut"
                            onclick="changeStatutTicket({{ $ticket->Id }},'{{ route('changeStatut', ['ticketId' => $ticket->Id]) }}')">Changer
                            le statut</button>
                    </p>
                @endif
            </p>
            <div>

                <strong>Message :</strong>
                <ul>
                    @if ($messages == null)
                        <li>Il n'y a pas encore de message</li>
                    @else
                        @forelse ($messages as $message)
                            @if (auth()->user()->id == $message->user_id)
                                <li><span><strong>Vous : </strong></span><span id="date">{{ $message->CreatedAt }}
                                        :</span>
                                    {{ $message->Content }} </li>
                            @else
                                <li><span><strong>{{ $message->Prenom }} {{ $message->name }} :</strong></span>
                                    <span id="date">{{ $message->CreatedAt }}:</span>
                                    {{ $message->Content }}
                                </li>
                            @endif
                        @empty
                        @endforelse
                    @endif
                    <p>
                        <button id="ButtonCreation"><a id="creation"
                                href="{{ route('creationMessage', ['ticketId' => $ticket->Id]) }}">Ecrire un
                                message</a></button>
                    </p>

                </ul>
            </div>


            <p><button><a href="{{ route('logUser') }}">Retour aux tickets</a></button></p>
        @else
            <div id="statut">
                <h2><strong>Ticket Numero : </strong>{{ $ticket->Id }}</h2>
                <p><strong>Le ticket concerne : </strong>{{ $ticket->Materiel }}</p>
                <p><strong>Le problème rencontré est : </strong>{{ $ticket->Sujet }}</p>
                @if (auth()->user()->isAdmin())
                    <p><strong>L'auteur est : </strong>{{ $user->Prenom }} {{ $user->name }}</p>
                @endif
                <p><strong>Le ticket a été créé le :</strong>{{ $ticket->CreatedAt }}</p>
                <p><strong>Statut : </strong>
                    <span id="statut-label">{{ $statut->Label }}</span>
                    @if (auth()->user()->isAdmin())
                        <p>
                            <button id="ButtonStatut"
                                onclick="changeStatutTicket({{ $ticket->Id }},'{{ route('changeStatut', ['ticketId' => $ticket->Id]) }}')">Changer
                                le statut</button>
                        </p>
                    @endif
                </p>
                <div>

                    <strong>Message :</strong>
                    <ul>
                        @if ($messages == null)
                            <li>Il n'y a pas encore de message</li>
                        @else
                            @forelse ($messages as $message)
                                @if (auth()->user()->id == $message->user_id)
                                    <li><span><strong>Vous : </strong></span><span id="date">{{ $message->CreatedAt }}
                                            :</span>
                                        {{ $message->Content }} </li>
                                @else
                                    <li><span><strong>{{ $message->Prenom }} {{ $message->name }} :</strong></span>
                                        <span id="date">{{ $message->CreatedAt }}:</span>
                                        {{ $message->Content }}
                                    </li>
                                @endif
                            @empty
                            @endforelse
                        @endif

                    </ul>
                </div>
    @endif
    <script>
        function changeStatutTicket(idTicket, route) {


            fetch(route, {
                    method: "POST",
                    headers: {
                        "X-CSRF-Token": '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        response.json().then(body => {
                            document.getElementById("statut-label").innerText = body.Label;
                            location.reload();
                        });

                    }
                });

        }
    </script>
@endsection
