@extends('layouts.app')

@section('content')

<page-heading title="Организации"></page-heading>

<div>
    <b-row>
        <b-input-group prepend="ИНН" class="mt-3">
            <b-form-input></b-form-input>
            <b-input-group-append>
                <b-button variant="info">Найти</b-button>
            </b-input-group-append>
        </b-input-group>
    </b-row>
</div>
@endsection