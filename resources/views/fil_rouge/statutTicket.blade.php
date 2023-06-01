@extends('template.pageCommune')
@section('content')
    <div id="statut">
        <h2><strong>Ticket Numero : </strong>{{ $ticket->Id }}</h2>
        <p><strong>Le ticket concerne : </strong>{{ $ticket->Sujet }}</p>
        <p><strong>La panne est : </strong>{{ $ticket->Type_panne_id }}</p>
        <p><strong>Message :</strong>
        <ul>
            @if ($messages == null)
                <li>Il n'y a pas encore de message</li>
            @else
                @forelse ($messages as $message)
                    <li><span><strong>{{ $message->name }} </strong></span><span id="date">{{ $message->CreatedAt }}
                            :</span>
                        {{ $message->Content }} </li>
                @empty
                @endforelse
            @endif
            <p><button><a href="{{ route('creationMessage', ['ticketId' => $ticket->Id]) }}">Ecrire un message</a></button>
            </p>
        </ul>
        </p>
        <p><strong>L'auteur est : </strong>{{ $user->name }}</p>
        <p><strong>Le ticket a été créé le :</strong>{{ $ticket->CreatedAt }}</p>
        <p><strong>Statut : </strong>
            <span id="statut-label">{{ $statut->Label }}</span>
            @if (auth()->user()->isAdmin())
                <button
                    onclick="changeStatutTicket({{ $ticket->Id }},'{{ route('changeStatut', ['ticketId' => $ticket->Id]) }}')">Changer
                    le statut</a></button>
            @endif
        </p>

        <p><a href="{{ route('logUser') }}">Retour a enlever</a></p>
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
                            });

                        }
                    });

            }
        </script>
    @endsection
