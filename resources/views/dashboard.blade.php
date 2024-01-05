@extends('layouts.app')
@section('content')
<div class="dashboard">
    <div class="container">
        <div id="sidebar-open">
            <img src="{{ asset('storage/images/bars.svg') }}" alt="">
        </div>
        <div class="dashboard-wrapper">
            <aside id="sidebar">
                <div class="side-menu">
                    <img id="sidebar-close" src="{{asset('storage/images/times.svg')}}">
                    <ul>
                        <li><a href="{{ route('user-detail.index') }}">Details</a></li>
                        <li><a href="{{ route('experience.index') }}">Experiences</a></li>
                        <li><a href="{{ route('education.index') }}">Education</a></li>
                        <li><a href="{{ route('skill.index') }}">Skills</a></li>
                        <li><a href="{{ route('certificate.index') }}">Certificates</a></li>
                    </ul>
                    @if (!empty($user->details) || count($user->skills) > 0 || count($user->experiences) > 0 || count($user->education) > 0 || count($user->certificates) > 0)
                        <button class="btn" type="button" onclick="Convert_HTML_To_PDF();" style="">
                            Download Resume
                        </button>
                    @endif
                </div>
            </aside>
            <div class="main">
                <div class="resume-wrapper">
                    @if (empty($user->details) && count($user->skills) == 0 && count($user->experiences) == 0 && count($user->education) == 0 && count($user->certificates) == 0)
                        <p style="text-align: center; font-size: 1.25rem;text-decoration: underline; color: #030e2c; margin-top: 3rem"><a href="{{ route('user-detail.create') }}">Create Resume</a></p>
                    @else
                    <div id="print" class="resume">
                        <!-- left column -->
                        <div class="left">
                            <div class="details">
                                @if ($user->details)
                                <h1 class="">{{$user->details->first_name}} {{$user->details->last_name}}</h1>
                                <h2>Web Developer</h2>
                                <div class="info">
                                    <h3>Gender</h3>
                                    <p style="text-transform: capitalize;">{{ $user->details->gender }}</p>
                                </div>
                                <div class="info">
                                    <h3>Date of Birth</h3>
                                    <p>{{ $user->details->age->format('d M Y') }}</p>
                                </div>
                                @endif
                            </div>
                            <div class="contact">
                                @if ($user->details)
                                <h2>Contact</h2>
                                <div>
                                    <h3>Address</h3>
                                    <p>{{$user->details->address}}</p>
                                </div>
                                <div>
                                    <h3>Phone</h3>
                                    <p>{{$user->details->phone}}</p>
                                </div>
                                <div>
                                    <h3>Email</h3>
                                    <p>{{$user->details->email}}</p>
                                </div>
                                @endif
                            </div>
                            <div class="skills">
                                @if (count($user->skills))
                                <h2>Skills</h2>
                                @foreach ($user->skills as $skill)
                                <p>{{$skill->name}}</p>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- right column -->
                        <div class="right">
                            <div class="summary">
                                @if ($user->details)
                                <p class="">{{$user->details->summary}}</p>
                                @endif
                            </div>
                            <div class="work">
                                @if (count($user->experiences))
                                <h2 class="title">Work History</h2>
                                <div class="work-wrapper">
                                    @foreach ($user->experiences as $experience)
                                    @php
                                    if ($experience->current_job) {
                                    $experience->current_job = "till date";
                                    }
                                    @endphp
                                    <div class="row">
                                        <p class="left-col">
                                            {{ $experience->start_date->format('M Y') }} - <br>
                                            {{ $experience->end_date && !$experience->current_job ? $experience->start_date->format('M Y') : $experience->current_job }}
                                        </p>
                                        <div class="right-col">
                                            <h3>{{ $experience->job_title }}</h3>
                                            <h4>{{ $experience->employer }}, {{ $experience->address }}</h4>
                                            {!!$experience->job_desc!!}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="education">
                                @if (count($user->education))
                                <h2 class="title">Education</h2>
                                <div class="education-wrapper">
                                    @foreach ($user->education as $education)
                                    @php
                                    if ($education->current_school) {
                                    $education->current_school = "current";
                                    }
                                    @endphp
                                    <div class="row">
                                        <P class="left-col">
                                            {{$education->start_date->format('M Y')}}-<br>
                                            {{$education->end_date ? $education->end_date->format('M Y') : $education->current_school}}
                                        </P>
                                        <div class="right-col">
                                            <h3>{{$education->degree}}: {{$education->field_of_study}}</h3>
                                            <h4>{{ $education->school_name }}, {{ $education->address }} </h4>
                                            {!! $education->edu_desc !!}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="certificate">
                                @if (count($user->certificates))
                                <h2 class="title">Certificates</h2>
                                <div class="certificate-wrapper">
                                    @foreach ($user->certificates as $certificate)
                                    <div class="row">
                                        <div class="left-col">
                                            <P>{{$certificate->date->format('M Y')}}</P>
                                        </div>
                                        <div class="right-col">
                                            <h3>{{$certificate->certificate}}</h3>
                                            <h4>{{$certificate->issuer }}, {{$certificate->address }}</h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn" type="button" onclick="Convert_HTML_To_PDF();" style="display: block;margin: 2rem auto 0;">
                        Download Resume
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
