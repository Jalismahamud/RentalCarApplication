@extends('admin.admin_dashboard')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@section('admin')
    <h3>Add Aminites</h3>

    <div class="page-content">

           
            <div class="col-md-8 m-auto col-xl-10 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add New Aminites</h6>

                            <form  id="myForm" action="{{ route('store.aminities') }}" method="POST" 
                                class="forms-sample">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="exampleInputUsername1" class="form-label">Aminities</label>
                                    <input type="text" name="aminities_name" placeholder="Aminities Name" class="form-control">
                                       
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Add Aiminites</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
  
    </div>
@endsection

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                aminities_name: {
                    required : true,
                }, 
                
            },
            messages :{
                aminities_name: {
                    required : 'Please Enter AMinitise Name',
                }, 
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
