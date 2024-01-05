@extends('layouts.app')

@section('content')
<div id="education" class="education-page">
    <div class="container">

        <h1 class="">Education</h1>

        @if ($education)
        @foreach($education as $e)

            @php 
                if ($e->current_school) {
                    $e->current_school = "current";
                }               
            @endphp

            <div class="education_wrapper">
                <div class="row">
                    <h2 class="col">{{ $e->degree }}, <span>{{ $e->field_of_study }}</span></h2>
                    <h4 class="col">({{ $e->start_date->format('M Y') }} - {{ $e->end_date && !$e->current_job ? $e->end_date->format('M Y') : $e->current_job }})</h4>
                </div>

                <p>{!!$e->edu_desc!!}</p>

                <a class="btn edit" href="{{route('education.edit', $e)}}" style="margin-top: 0;">Edit</a>

                <form action="{{route('education.destroy', $e)}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Delete" class="btn delete" style="margin-top: 0;">
                </form>
 
            </div>
            
        @endforeach
        @endif

        <a class="btn add" href="{{route('education.create')}}">+ Add Education</a>

        <div class="buttons">
            <a class="btn back" href=" {{route('experience.index')}} ">Back</a>

            <a class="btn next" href=" {{route('skill.index')}} "><em>next</em>: Skill</a>
            
        </div>
    </div>
</div>

@endsection
