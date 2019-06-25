@extends('backend.base_takers')
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
                    @forelse($books as $book)
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 mb-3">
                                            <img src="{{ url('uploads/file/'.$book->BuildingOwners->file) }}" class="img-fluid" style="width: 200px; height: 150px;">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="col-form-label">Booking Date For:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->booking_date}}</small>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-form-label">Total Price:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->total_price }}</small>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-form-label">Total Price:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->BuildingOwners->name }}</small>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <div class="col-form-label">Request Created At:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->created_at}}</small>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <div class="col-form-label">Status:</div>
                                                    @if($book->status == "1")
                                                        <small><span class="badge badge-success">Accepted</span></small>
                                                    @elseif($book->status == "2")
                                                        <small><span class="badge badge-danger">Requst Refuse</span></small>
                                                    @else
                                                        <span class="badge badge-warning">Waiting For Request</span>
                                                    @endif
                                                </div>
                                                <div class="row justify-content-center">
                                                    @if($book->status == "1")
                                                        <button class="btn btn-success submit-btn btn-block">Go To Payment</button>
                                                    @elseif($book->status == "2")
                                                        <label class="btn btn-outline-danger">Booking Date Is Refuse</label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
@endsection