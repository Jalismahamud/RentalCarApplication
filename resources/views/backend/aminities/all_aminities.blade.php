@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <a href="{{route('add.aminities')}}" class="btn btn-inverse-primary">Add Aminites</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">ALL Aminities</h6>                   
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Aminities</th>                      
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                                  
                                    @foreach ($aminities as $key => $aminities)  
                                    <tr>
                                    <td>{{$key +1 }}</td>
                                    <td>{{$aminities->aminities_name }}</td>                           
                                    <td width="300px">
                                        <a href="{{route('edit.aminities',$aminities->id)}}" class="btn btn-inverse-warning">Edit</a>
                                        <a href="{{route('delete.aminities',$aminities->id)}}" class="btn btn-inverse-danger" id="delete">Delete</a>
                                    </td>                                                                           
                                    </tr>
                                    @endforeach                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection