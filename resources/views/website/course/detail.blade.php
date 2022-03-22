@extends('master.front.master');

@section('title')
    Details Page
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center text-success">{{ Session::get('message') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body">
                        <img src="{{ asset($subject->image) }}" alt="" class="h-100" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-body">
                        <h1>{{ $subject->title }}</h1>
                        <p>Course Fee: {{ $subject->fee }}Tk</p>
                        <a href="{{ route('enroll-now', ['id' => $subject->id]) }}" name="" class="btn btn-outline-success w-25 mx-auto">Enroll Now</a>
                        <hr/>
                        <h3>Trainer Name {{ $subject->teacher->name }}</h3>
                        <img src="{{ asset($subject->teacher->image) }}" alt="" height="100" width="100" />
                        <hr/>
                        <div>{!! $subject->short_description !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-body">
                        <h1>Course Modul details</h1>
                        <hr/>
                        <div>{!! $subject->long_description !!}</div>
                        <hr/>
                        <a href="{{ route('enroll-now', ['id' => $subject->id]) }}" class="btn btn-outline-success w-25 mx-auto  ">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
