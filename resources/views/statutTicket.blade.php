@extends('template.pageCommune')
@section('content')
    <div id="statut">
        <table>
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Materiel</th>
                    <th>Panne</th>
                    <th>Message</th>
                    <th>Auteur</th>
                    <th>Date de la création</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $ticket->Id }}</td>
                    <td>{{ $ticket->Sujet }}</td>
                    <td>{{ $ticket->IdTypePanne }}</td>
                    {{-- Relier idTypePanne avec le nom de la panne --}}
                    <td>a completer (MESSAGE)</td>
                    <td>{{ $ticket->IdAuteur }}</td>
                    {{-- relier id auteur au nom --}}
                    <td>{{ $ticket->CreatedAt }}</td>
                    <td>{{ $ticket->IdStatus }}</td>
                    {{-- relier status id avec le bon label --}}
                </tr>
            </tbody>
        </table>
    </div>
    <p><a href="{{ route('logUser') }}">Retour a enlever</a></p>
@endsection
