@extends('backend.base_takers')
@section('content')
    <div class="home" style="height: auto;">
        <!-- Home Slider -->
        <div class="home_slider_container">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://blog.tiket.com/wp-content/uploads/2016/02/socmed-banner_1200x628px.jpg" class="d-block w-100" style="height: 750px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="http://blog.tiket.com/wp-content/uploads/2016/04/promo-all-hotel-apps_Sosial-media-banner-1200x628-min.png" style="height: 750px;" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://wallpaperaccess.com/full/119615.jpg" class="d-block w-100" style="height: 750px;" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <form action="{{route('Base.search')}}" method="GET" class="menu_search_form" style="margin-top: 20px;">
            <label style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;" class="row justify-content-center">Find Your Building</label>
            <div class="input-group">
                <input type="text" name="builds"  class="search_input" placeholder="Search By Build Name or City" required="required" value="{{ old('builds') }}" style="width: 20cm;">
                <button class="button" style="width: 40px; height: 40px;"><img src="{{asset('assets/images/search.png')}}" alt=""></button>
            </div>
        </form>
    </div>

    <div class="super_container_inner">
        <div class="products">
            <div class="container">
                <div class="row products_row products_container grid">
                    <!-- Product -->
                    @foreach($builds as $build)
                        @if($build->status == "1" || $build->status == "0")
                    <div class="col-xl-4 col-md-6 grid-item sale">
                        <div class="product">
                            <div class="product_image"><img src="{{ url('uploads/file/'.$build->file) }}" alt="" style="height: 300px;"></div>
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                            <div class="product_name"><a href="product.html" style="font-size: 30px;">{{$build->name}}</a></div>
                                            <div class="product"><img src="{{asset('assets/images/location-point.png')}}" style="margin-bottom: 3px;margin-right: 2px;"><a href="product.html" style="color: #7f8c8d;font-size: 20px;" >{{$build->city}}, Indonesia</a></div>
                                                <hr style="position: relative; width: 500px;right: 20px">
                                    </div>
                                </div>

                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div style="position: relative; bottom: 15px;">
                                        <div class="product_name"><a style="font-size: 30px;color: #fa8231;font-weight: bolder">Rp.{{$build->price}}</a></div>
                                        <div><a style="font-size: 30px;">/</a><a style="font-size: 30px;color: #fa8231;font-weight: bolder">Hour </a></div>
                                        <div class="col-form-label">Status:</div>
                                        @if($build->status == "1")
                                            <small><span class="badge badge-success" style="font-size: 15px;">Available</span></small>
                                        @elseif($build->status == "0")
                                            <small><span class="badge badge-danger" style="font-size: 15px;">Full</span></small>
                                        @else
                                            <small><span class="badge badge-warning" style="font-size: 15px;">Maintenance</span></small>
                                        @endif
                                        <div class="col-form-label">Rating:</div>
                                        <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                    </div>
                                </div>
                                <div class="product_buttons">
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            @if($build->status == "0")
                                            <button class="btn btn-danger submit-btn btn-block" style="height: 60px;font-weight: bolder; font-size: 30px;" disabled="disabled">Check</button>
                                                @else
                                                <a href="{{route('takers.checkin', $build->id)}}" class="btn btn-success submit-btn btn-block" style="height: 60px;font-weight: bolder; font-size: 30px;">Check</a>
                                                @endif
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection