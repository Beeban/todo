@extends('layouts.app')

@section('content')

<page-heading title="Организации"></page-heading>

<div>
    <hr>
    <legal-search-form></legal-search-form>
    <hr>
    @if($legals->count())
    <legals-table :legals="{{json_encode($legals)}}"></legals-table>
    @else

    @endif
</div>
@endsection