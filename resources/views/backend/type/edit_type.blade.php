@extends('admin.admin_dashboard')

@section('admin')
    <h3>Edit Type Information</h3>

    <div class="page-content">

           
            <div class="col-md-8 m-auto col-xl-10 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Property Type</h6>

                            <form action="{{ route('update.type',$type->id) }}" method="POST" class="forms-sample">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Type Name</label>
                                    <input type="text" name="type_name" value="{{$type->type_name}}" placeholder="Property Type Name" class="form-control"
                                        @error('type_name')
                                      is-invalid @enderror
                                        id="type_name" autocomplete="off">
                                    @error('type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Type Icon</label>
                                    <input type="text" value="{{$type->type_icon}}" placeholder="Property Type Icon" name="type_icon" class="form-control"
                                        @error('type_icon')
                                      is-invalid @enderror
                                        id="type_icon" autocomplete="off">
                                    @error('type_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                               

                                <button type="submit" class="btn btn-primary me-2">Update Changes</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
  
    </div>
@endsection
