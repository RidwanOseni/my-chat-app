@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">



            <div class="private-chat-section col-md-8 offset-md-2">
                <div class="card">
                        <div class="card-header">
                            <h3>ChatTech Messenger</h3>
                        </div>
                        <div class="card-body" id="app">
                            <app-chat :user="{{ auth()->user() }}"></app-chat>
                        </div>

                </div>
            </div>
            <div class="col-md-2">

            </div>

    </div>
</div>

<!-- Footer -->
<footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> ChatTech Inc.</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
@endsection

