@extends('layouts.app')

@section('content')

<page-heading title="Организации"></page-heading>

<div>
    <hr>
    <b-row>
        <legal-search-form class="col"></legal-search-form>
    </b-row>
    <br>
    @if($legals->count())
    <legals-table class="col" :legals="{{json_encode($legals)}}"></legals-table>
    @else

    @endif
</div>
@endsection