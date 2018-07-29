@extends('layouts.main')

@section('style')
@endsection

@section('content')
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 push-lg-4">
                    <span class="icon icon-xl icon-success"><i class="ti ti-check-box"></i></span>
                    <h1 class="mb-2">Thank you for your order!</h1>
                    <br>
                    <h3 class="mb-2">This is your order number <strong>{{$order->id}}</strong></h3>
                    <br>
                    <h4 class="text-muted mb-5">You will recieve it in 15-30 minutes.</h4>
                    <a href="{{url('order/menu')}}" class="btn btn-outline-secondary"><span>Go back to menu</span></a>
                </div>
            </div>
        </div>
    </section>
@endsection