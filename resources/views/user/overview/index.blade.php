@extends('user.master')

@section('content')
    <div class="container" style="position:relative; margin-top:100px">
        <div class="row">
            <div class="col-12 col-xl-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="px-4">
                                <a class="btn btn-block btn-xl btn-light-primary font-bold mt-3"
                                    href="{{ route('user.index') }}" role="button">Overview</a>
                            </div>
                            <div class="px-4">
                                <a class="btn btn-block btn-xl btn-light-primary font-bold mt-3"
                                    href="{{ route('user.index') }}" role="button">Overview</a>
                            </div>
                            <div class="px-4">
                                <a class="btn btn-block btn-xl btn-light-primary font-bold mt-3"
                                    href="{{ route('user.index') }}" role="button">Overview</a>
                            </div>
                            <div class="px-4">
                                <a class="btn btn-block btn-xl btn-light-primary font-bold mt-3"
                                    href="{{ route('user.index') }}" role="button">Overview</a>
                            </div>
                            <div class="px-4">
                                <a class="btn btn-block btn-xl btn-light-primary font-bold mt-3"
                                    href="{{ route('user.index') }}" role="button">Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="list-group px-4 pt-4">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 text-white">List group item heading</h5>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">
                                        Donec id elit non mi porta gravida at eget metus. Maecenas sed
                                        diam eget risus varius blandit.
                                    </p>
                                    <small>Donec id elit non mi porta.</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">
                                        Donec id elit non mi porta gravida at eget metus. Maecenas sed
                                        diam eget risus varius blandit.
                                    </p>
                                    <small>Donec id elit non mi porta.</small>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">
                                        Donec id elit non mi porta gravida at eget metus. Maecenas sed
                                        diam eget risus varius blandit.
                                    </p>
                                    <small>Donec id elit non mi porta.</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="px-4">
                                    <button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">Start
                                        Conversation</button>
                                </div>
                                <div class="px-4">
                                    <button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">Start
                                        Conversation</button>
                                </div>
                                <div class="px-4">
                                    <button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">Start
                                        Conversation</button>
                                </div>
                                <div class="px-4">
                                    <button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">Start
                                        Conversation</button>
                                </div>
                                <div class="px-4">
                                    <button class="btn btn-block btn-xl btn-light-primary font-bold mt-3">Start
                                        Conversation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
