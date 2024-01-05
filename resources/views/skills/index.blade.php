@extends('layouts.app')

@section('content')
<div id="skills" class="skills-page">
    <div class="container">
        <div style="max-width: 500px; margin: 0 auto;">

            <h1 style="margin-bottom: 2rem;">Skills</h1>

            @foreach($skills as $skill)

                <div class="skills_wrapper">
                    <h2>{{$skill->name}}</h2>

                    <a class="btn edit" href="{{route('skill.edit', $skill)}}" style="margin-top: 0.5rem;">Edit</a>

                    <form action="{{route('skill.destroy', $skill)}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Delete" class="btn delete" style="margin-top: 0.5rem;">
                    </form>
                </div>

            @endforeach

            <a class="btn add" href="{{route('skill.create')}}">+ Add Skill</a>

            <div class="buttons">
                <a class="btn back" href="{{route('education.index')}}">Back</a>

                <a class="btn next" href="{{route('certificate.index')}}"><em>next</em>: Certificates</a>
                
            </div>
        </div>     
    </div>
</div>


@endsection
