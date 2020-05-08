@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">ChatTech Messenger</div>

                <div class="card-body" id="app">
                    <div class="private-chat-section col-md-8">
                        <app-chat :user="{{ auth()->user() }}"></app-chat>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

