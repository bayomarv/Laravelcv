@extends('layouts.app')

@section('content')
<div id="certificate" class="certificate-page">
    <div class="container">

        <h1 class="">Certificate</h1>

        @if ($certificates)
            @foreach($certificates as $c)

            <div class="certificate_wrapper">
                <div class="row">
                    <h2 class="col">{{ $c->certificate }} </h2>
                    <h4 class="col">({{ $c->date->format('M Y') }}) </h4>
                </div>

                <p>{{ $c->issuer }}, {{ $c->address }}</p>

                <a class="btn edit" href="{{route('certificate.edit', $c)}}" style="margin-top: 0;">Edit</a>

                <form action="{{route('certificate.destroy', $c)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Delete" class="btn delete" style="margin-top: 0;">
                </form>
 
            </div>
            
        @endforeach
        @endif

        <a class="btn add" href="{{route('certificate.create')}}">+ Add Certificate</a>

        <div class="buttons">
            <a class="btn back" href="{{route('skill.index')}}">Back</a>

            <a class="btn next" href="{{route('dashboard')}}"><em>Resume</em></a>
            
        </div>
    </div>
</div>

@endsection
