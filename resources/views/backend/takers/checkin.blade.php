@extends('backend.base_takers')
@section('content')
    <div class="row justify-content-center" style="width: 100%">
    <div class="bil" style="position: relative; top:150px; width: 600px;height: auto;margin-bottom: 400px;">
        @foreach($builds as $build)
            <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">Check
                <label style="color: black;">Room</label>&nbsp<label style="color: tomato;">Page</label>
            </div>
            <form enctype="multipart/form-data" autocomplete="off" class="checkout_form" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <hr>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label name="name" style="font-size: 30px;">{{$build->name}}</label>
                    <br>
                    <div class="imgs" style="position: relative; bottom: 12px;">
                        <img src="{{asset('assets/images/location-point.png')}}" style="width: 20px; height: 20px;"><label name="city" >{{$build->address}}, {{$build->city}}, Indonesia</label>
                        <hr>
                    </div>

                    <!-- Image Form -->
                    <br>
                    <img src="{{ url('uploads/file/'.$build->file) }}" id="myImg" style="position: relative;width: 100%; height: 450px; margin-bottom: 5px;" onclick="ShowDialog1()">

                    <!-- The Modal -->
                    <div id="myModal" class="modal" style="width: 100%;">
                        <span class="close" style="color: white; position: relative;right: 50px;" >&times;</span>
                        <img class="modal-content" id="img01" style="max-width: 100%; height: 650px;">
                        <div id="caption"></div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="label" for="descripton" style="font-size: 20px;">Description:</label>
                    <div class="input-group">
                        <textarea style="background-color: white; font-size: 20px;" class="form-control" readonly>{{$build->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="price" style="font-size: 20px;">Price:</label>
                    <div class="input-group">
                        <a style="font-size: 30px;color: #fa8231;font-weight: bolder">Rp. {{$build>price}}</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-form-lg">
                        <div class="col-form-label" style="color: black; font-weight: bold">Status:</div>
                        @if($build->status == "1")
                            <small><span class="badge badge-success" style="font-size: 25px;">Available</span></small>
                        @elseif($build->status == "0")
                            <small><span class="badge badge-danger" style="font-size: 25px;">Full</span></small>
                        @else
                            <small><span class="badge badge-warning" style="font-size: 25px;">Maintenance</span></small>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <button type="button" class="btn btn-success submit-btn btn-block" data-toggle="modal" data-target="#Modal" >Check-In</button>
                    <a class="btn btn-danger submit-btn btn-block" href="{{route('Base.index_home')}}">Cancle</a>
                </div>
            </form>

        <!-- Modal Form For Booking -->

                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <label class="modal-title" id="exampleModalLabel" style="color: tomato;font-family: 'Ultra', serif;font-size: 30px; margin: 0 auto;">| Book<label style="color: black;font-family: 'Ultra', serif;font-size: 30px;">Ing</label> |</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @foreach($takers as $taker)
                                <form method="post" action="{{route('takers.index')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label" style="color: tomato;font-family: 'Ultra', serif;font-size: 20px;">{{$build->name}}</label><br>
                                        <label for="recipient-name" class="col-form-label"  style="color: #2f3542;font-size: 15px; position:relative;bottom: 20px;">{{$build->address, $build->city}}, Indonesia</label>
                                        <img src="{{ url('uploads/file/'.$room->file) }}" id="myImg" style="position: relative;width: 100%; height: 200px; bottom: 15px;">
                                        <div class="checks">
                                            <input type="checkbox" name="vehicle" style="position: relative; top: 25px;" required><label style="text-align: center">Terms and conditions apply, please give a check if you<label style="text-align: center"> have read the conditions</label></label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="customer_id" value="{{$taker->id}}" hidden>
                                        <input type="text" class="form-control"  name="owner_id" value="{{$build->owner_id}}" hidden>
                                        <input type="text" class="form-control" name="room_id" value="{{$build->id}}" hidden>
                                    </div>
                                    <div class="card">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label" style="color: black">Check-In Date</label>
                                            <input type="date" class="form-control checks-in" id="checks-in" name="check-in"  min="{{$dateCurrent}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label" style="color: black">Check-Out Date</label>
                                            <input type="date" class="form-control checks-out" id="checks-out" name="check-out" min="{{$dateCurrent}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <h3>Total: <span id="total-price">0</span></h3>
                                    </div>

{{--                                    <script>--}}
{{--                                        var date_diff_indays = function (date1, date2) {--}}
{{--                                            dt1 = new Date(date1);--}}
{{--                                            dt2 = new Date(date2);--}}
{{--                                            return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDay()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDay()))/(1000*60*60*24));--}}
{{--                                        }--}}

{{--                                        var date1 = document.getElementById('check-in').value;--}}
{{--                                        var date2 = document.getElementById('check-out').value;--}}
{{--                                    </script>--}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success submit-btn btn-block">Booking</button>
                                    </div>

                                </form>
                                    @endforeach
                            </div>

                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    </div>

    <!-- Script For Image-->
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
    <script type="text/javascript">

    </script>
@endsection
