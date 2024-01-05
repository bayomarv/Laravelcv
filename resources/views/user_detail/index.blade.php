@extends('layouts.app')

@section('content')
<div id="details" class="details-page">
    <div class="container">

        <h1 class="">Personal Details</h1>

        @if($details)
            <div class="details_wrapper">
            

                <div class="row">
                    <h2 class="col">{{$details->first_name}} {{$details->last_name}}</h2>
                    <h4 class="col">{{$details->email}}</h4>
                    <h4 class="col phone">{{$details->phone}}</h4>
                </div>

                <div style="display: flex">
                    <h4 style="border-left: none; text-transform: capitalize;"><strong>Gender: </strong>{{$details->gender}}</h4>
                    <h4 ><strong>Date of Birth: </strong>{{$details->age->format('d M Y')}}</h4>
                </div>

                <p>{{$details->summary}}</p>

                <a class="btn edit" href="{{route('user-detail.edit', $details)}}">Edit</a>

                <form action="{{route('user-detail.destroy', $details)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Delete" class="btn delete">
                </form>
            
                
            </div>
        @endif

        <a class="btn add" href="{{route('user-detail.create')}}">+ Create Details</a>

        <div class="" style="text-align: right;">
            <a class="btn next" href="{{ route('experience.index') }}"><em>next</em>: Work</a>
        </div>
    </div>
</div>
@endsection
