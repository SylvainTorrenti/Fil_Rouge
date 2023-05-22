@extends('template.pageCommune')
@section('content')
    <div>
        <h2>Vos tickets :</h2>
        <p>
        <ul id="ulTicket">
            <li>
                <span id="titreTicket">Ticket 1 :</span>
            </li>
            <ul id="ulTicket">
                <li>
                    <strong>Numero : </strong>2458ah47
                </li>
                <li>
                    <strong>Date : </strong>11/03/23
                </li>
                <li><strong>Materiel : </strong>{{ Request::get('materiel') }}</li>
                <li><strong>Description : </strong>{{ Request::get('description') }}</li>
                <li>
                    <strong>Intervenant : </strong>Sylvain
                </li>
                <li><a href="creationMessage"><button>Nouveau message</button></a></li>
                <li><a href="statutTicket"><button>Info</button></a></li>
            </ul>
        </ul>
        </p>
    </div>
    <div><button><a href="creationTicket">créer un ticket</a></button></div>
@endsection
