@extends('layouts.app')

@section('content')
<div id="work" class="work-page">
    <div class="container">

        <h1 class="">Work</h1>
        @if ($experiences)
        @foreach($experiences as $e)

            @php 
                if ($e->current_job) {
                    $e->current_job = "till date";
                }               
            @endphp

            <div class="work_wrapper">
                <div class="row">
                    <h2 class="col">{{ $e->job_title }}, <br><span>{{ $e->employer }}</span></h2>
                    <h4 class="col"><em>{{ $e->address }}</em></h4>
                    <h4 class="col">({{ $e->start_date->format('M Y') }} - {{ $e->end_date && !$e->current_job ? $e->end_date->format('M Y') : $e->current_job }})</h4>
                </div>

                <p>{!!$e->job_desc!!}</p>

                <a class="btn edit" href="{{route('experience.edit', $e)}}" style="margin-top: 0;">Edit</a>

                <form action="{{route('experience.destroy', $e)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Delete" class="btn delete" style="margin-top: 0;">
                </form>
            </div>
        
        @endforeach
        @endif

        <a class="btn add" href="{{route('experience.create')}}">+ Add Experience</a>

        <div class="buttons">
            <a class="btn back" href="{{route('user-detail.index')}}">Back</a>

            <a class="btn next" href="{{route('education.index')}}"><em>next</em>: Education</a>
            
        </div>
    </div>
</div>
@endsection
