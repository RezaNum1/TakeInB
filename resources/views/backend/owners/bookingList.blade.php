@extends('backend.base_owner')
@section('content')
    <div class="super_container_inner">
        <div class="products">
            <div class="container">
                <div class="row products_row products_container grid">
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success mt-3">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                <!-- Product -->
                    @forelse($builds as $build)
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 mb-3">
                                            <img src="{{ url('uploads/file/'.$build->BuildingOwners->file) }}" class="img-fluid" style="width: 200px; height: 150px;">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="col-form-label">Booking Date For:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $build->booking_date}}</small>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-form-label">Total Price:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $build->total_price }}</small>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-form-label">Total Price:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $build->BuildingOwners->name }}</small>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <div class="col-form-label">Request Created At:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $build->created_at}}</small>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <div class="col-form-label">Status:</div>
                                                    @if($build->status == "1")
                                                        <small><span class="badge badge-success">Accepted</span></small>
                                                    @elseif($build->status == "2")
                                                        <small><span class="badge badge-danger">Requst Refuse</span></small>
                                                    @else
                                                        <span class="badge badge-warning">Waiting For Request</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
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
                                                                    <div class="form-group">
                                                                        <textarea class="form-control">{{$build->description}}</textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 mt-3">
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Set Satatus
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item" href="{{route('owners.statusBooking', $build->id)}}" style="position: relative; right: 4px;"><i class="fa"></i>
                                                        @if($build->status == "1")
                                                            <img src="{{asset('assets/images/flag.png')}}"> Waiting For Request
                                                        @elseif($build->status == "2")
                                                            <img src="{{asset('assets/images/rooms-available.png')}}" style="margin-bottom: 5px; margin-right: 5px;">Accepted
                                                        @else
                                                            <img src="{{asset('assets/images/spanner.png')}}" style="margin-bottom: 5px; margin-right: 5px;">Refuse
                                                        @endif
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('owners.delete', $build->id)}}"><img src="{{asset('assets/images/rubbish-bin.png')}}"><i class="fa"></i> Delete</a>
                                                    <div class="dropdown-divider"></div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success submit-btn btn-block" data-toggle="modal" style="margin-top: 10px;" data-target="#Modal" >Check Description</button>
                                    </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Tidak ada merk ditemukan.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection