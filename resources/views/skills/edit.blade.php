@extends('layouts.app')

@section('content')
<div id="create-form" class="create-form">
    <div class="container">
        <div class="create-form_wrapper">
            <h1 class="">Edit Skills</h1>

            <form action="{{route('skill.update', $skill)}}" method='POST'>
                @csrf
                @method('PUT')

                <div class="form-group">
                        <label for="name">Skill</label>
                        <input type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ $skill->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
