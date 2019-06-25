@extends('backend.base_owner')
@section('content')
    <div class="row justify-content-center">
        <div class="bil" style="position: relative; top:150px; width: 600px;height: auto;margin-bottom: 400px;">
            <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">Update
                <label style="color: black;">Room</label>&nbsp<label style="color: tomato;">Page</label>
            </div>
            @foreach($rooms as $room)
            <form enctype="multipart/form-data" action="{{route('owners.update', $room->id)}}" autocomplete="off" class="checkout_form" method="post">
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
                    <label class="label" for="username">Room Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name"  value="{{$room->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Image:</label>
                    <br>
                    <img src="{{ url('uploads/file/'.$room->file) }}" style="width: 300px; height: 150px; margin-bottom: 5px;">
                    <input type="file" class="form-control" name="file" id="file">
                </div>
                <div class="form-group">
                    <label class="label" for="address">City</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Input Address" name="city" id="address" value="{{$room->city}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="address">Address</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Input Address" name="address" id="address" value="{{$room->address}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="descripton">Description</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Description...." name="description" id="description" value="{{$room->description}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="price">Price</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Price...." name="price" id="price" value="{{$room->price}}">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success submit-btn btn-block" type="submit">Update</button>
                    <a class="btn btn-danger submit-btn btn-block" href="{{route('owners.index')}}">Cancle</a>
                </div>
            </form>
                @endforeach
        </div>
    </div>
    @endsection