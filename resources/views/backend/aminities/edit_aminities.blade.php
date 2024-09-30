@extends('admin.admin_dashboard')

@section('admin')
    <h3>Edit Aminities</h3>

    <div class="page-content">

         
            <div class="col-md-8 m-auto col-xl-10 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Aminities</h6>

                            <form action="{{ route('update.aminities',$aminities->id) }}" method="POST" class="forms-sample">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Aminities Name</label>
                                    <input type="text" name="aminities_name" value="{{$aminities->aminities_name}}" placeholder="Aminities Name" class="form-control"
                                        @error('aminities_name')
                                      is-invalid @enderror
                                        id="aminities_name" autocomplete="off">
                                    @error('aminities_name')
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
