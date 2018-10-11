@extends('layouts.app')

@section('title','')

@push('css')
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Category / Item</p>
                            <h3 class="title">{{$categoryCount}}/{{$itemCount}}

                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">warning</i>
                                <a href="#pablo">Total category and Item</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">slideshow</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Total Slider</p>
                            <h3 class="title">{{$sliderCount}}</h3>
                        </div>
                        <div class="card-footer">
                                <div class="stats">
                                      <i class="material-icons">date_range</i> <a href="{{ route('slider.index') }}">Get More Details...</a>
                                </div>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Reservation</p>
                            <h3 class="title">{{$reservations->count()}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Reservation not confirmed
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="card-content">
                            <p class="category">Contact</p>
                            <h3 class="title">{{$contactCount}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> contact list
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            </div>
        </div>
    </div>


@endsection

@push('scripts')

@endpush