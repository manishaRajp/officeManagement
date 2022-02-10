@extends('admin.dashboard.layouts.master')
@section('content')
<style>
    .texterror {
        color: red;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Doctor</li>
            </ol>
        </div>
        <h5 class="page-title">Edit Doctor</h5>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Doctor</h4>
                {{ Form::model($department, ['id' => 'edit_dept', 'enctype' => 'multipart/form-data', 'novalidate' => true]) }}
                @csrf
                {{ Form::hidden('id', null, ['class' => 'form-control']) }}
                <div class="row">
                    <div class="col-md">
                        {{ Form::label('Name') }}
                        {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'id' => 'name']) }}
                        @error('name')
                        <span class="text-danger" id="nameError">{{ $message }}</span>
                        @enderror
                        </br>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']) }}
                        <a href="{{ route('admin.department.index') }}" class="btn btn-danger">
                            Cancel</a>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@push('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#edit_dept").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 225,
                },
                
            },

            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                console.log('form');
                console.log(form);
                $(document).find('.text-danger').remove();
                var formdata = new FormData(form);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    data: formdata,
                    url: "{{ route('admin.update_dept') }}",
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        window.location = "/admin/department";
                    },
                    error: function(error) {
                        $.each(error.responseJSON.errors, function(key, value) {
                            $('#' + key).after('<span class="text-danger">' +
                                value +
                                '</span>')
                        });
                    }
                });
            }
        });
    });
</script>

@endpush