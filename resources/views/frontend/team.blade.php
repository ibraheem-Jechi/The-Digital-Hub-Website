@extends('layouts.frontend')
@section('page-title', 'Our Team')

@section('breadcrumb')
    <li class="breadcrumb-item active text-primary">Team</li>
@endsection

@section('content')
    @include('frontend.partials.team')
@endsection
