@extends('layouts.main-layout')

{{-- Includo gli script di VITALE importanza per questa view  --}}
@push('footerScripts')
    <script src="/js/manage-invitati.js"></script>
@endpush

@section('mainContent')
    <div class="container">
        <h1>Gesione lista inviati</h1>
        <div class="row">

            <div class="col-md-6">
                <fieldset>
                    <legend>Creazione Invitati</legend>
                    <input type="text" id="fldNominativo" size="30">
                    <button id="btnAggiungi">Aggiungi nominativo</button>
                </fieldset>

                <!-- s:result aggiungi zone -->
                <div id="msgAggiungiNominativo"></div>
                <!-- e:result aggiungi zone -->
            </div>

            <div class="col-md-6">
                <fieldset>
                    <legend>Cerca</legend>
                    <input type="text" id="fldNominativoDaCercare" size="30">
                    <button id="btnCerca">Avvia ricerca</button>
                </fieldset>

                <!-- s:result cerca zone -->
                <div id="msgCercaNominativo"></div>
                <!-- e:result cerca zone -->

            </div>

        </div>
    </div>

@endsection

@push('footerScripts')
<script>alert('mi trovo qui');</script>
@endpush
