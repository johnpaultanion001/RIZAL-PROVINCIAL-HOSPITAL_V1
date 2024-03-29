@extends('../layouts.site')
@section('sub-title','Update')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <br><br><br>
            
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10 ml-auto mr-auto">
            <h2 class="text-center title text-white">Update Information</h2>
            <p class="description text-white text-center text-uppercase">Complete all Required Field</p>
          </div>
    
          <div class="col-md-12">
            <form method="post" id="updateForm" >
              @csrf
              <div class="card">
                <div class="card-body">
                
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                     <div class="form-group">
                         <label class="bmd-label-floating">ID PICTURE <span class="text-danger">*</span></label>
                        <input type="file" name="id_picture" id="id_picture" class="form-control id_picture" accept="image/*"/>
                        <a href="/assets/img/id/{{Auth::user()->id_picture}}" target="_blank">{{Auth::user()->id_picture ?? ''}}</a>
                        <span class="invalid-feedback" role="alert">
                            <strong id="error-id_picture"></strong>
                        </span>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}" readonly>
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-name"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact Number <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" name="contact_number" id="contact_number" value="{{Auth::user()->contact_number}}" readonly>
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-contact_number"></strong>
                          </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Gender <span class="text-danger">*</span></label>
                                @if(Auth()->user()->isRegistered == '0')
                                    <select name="gender" id="gender" class="form-control select2" style="width: 100%" >
                                      <option value="" disabled selected>Gender</option>
                                      <option value="MALE" {{Auth::user()->gender == 'MALE' ? 'selected' : '' }}>MALE</option>
                                      <option value="FEMALE" {{Auth::user()->gender == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
                                    </select>
                                @else
                                  <input type="text" class="form-control" value="{{Auth::user()->gender}}" readonly>
                                @endif
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-gender"></strong>
                                </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Civil Status <span class="text-danger">*</span></label>
                                @if(Auth()->user()->isRegistered == '0')
                                  <select name="civil_status" id="civil_status" class="form-control select2" style="width: 100%">
                                      <option value="" disabled selected>Civil Status</option>
                                      <option value="SINGLE" {{Auth::user()->civil_status == 'SINGLE' ? 'selected' : ''}}>SINGLE</option>
                                      <option value="MARRIED" {{Auth::user()->civil_status == 'MARRIED' ? 'selected' : ''}}>MARRIED</option>
                                      <option value="WIDOWED" {{Auth::user()->civil_status == 'WIDOWED' ? 'selected' : ''}}>WIDOWED</option>
                                  </select>
                                @else
                                  <input type="text" class="form-control" value="{{Auth::user()->civil_status}}" readonly>
                                @endif
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-civil_status"></strong>
                                </span>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="address" id="address" value="{{Auth::user()->address}}" {{Auth()->user()->isRegistered == '1' ? 'readonly':''}}>
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-address"></strong>
                          </span>
                        </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label >Date Of Birth <span class="text-danger">*</span></label>

                          <input type="date" id="birth_date" name="birth_date" class="form-control" min="01-jan-2022"  value="{{Auth::user()->birth_date}}" {{Auth()->user()->isRegistered == '1' ? 'readonly':''}}>
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-birth_date"></strong>
                          </span>
                      </div>
                    </div>
                   

                    

                    </div>
                  
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" value="{{Auth::user()->id}}" />
          
                  <div class="col-12">
                    <div class="col text-right">
                      <button type="button" id="changepassword" class="btn btn-sm btn-warning">Change Password</button>
                      <input type="submit" name="action_button" id="action_button" class="btn btn-sm btn-primary" value="Submit" />
                    </div>
                  </div>
                  
                  
                </div>
              </div>




            </form>
          </div>
          

        
          
         

        </div>
       </div>
      </div>
</div>

<form method="post" id="cpForm" class="contact-form">
    @csrf
    <div class="modal fade" id="cpModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="cp-modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="material-icons">clear</i>
            </button>
          </div>
          <div class="modal-body">
        
            <div class="col-sm-12">
                  <div class="form-group">
                      <label class="control-label text-uppercase" >Current Password: </label>
                      <input type="password" name="current_password" id="current_password" class="form-control" />
                      <span toggle="#current_password-field" class="fa fa-fw fa-eye field_icon toggle-current_password" style="float: right; margin-left: -25px; margin-top: -25px; position: relative; z-index: 2;"></span>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-current_password"></strong>
                      </span>
                  </div>
              </div>

              <div class="col-sm-12">
                  <div class="form-group">
                      <label class="control-label text-uppercase" >New Password: </label>
                      <input type="password" name="new_password" id="new_password" class="form-control" />
                      <span toggle="#new_password-field" class="fa fa-fw fa-eye field_icon toggle-new_password" style="float: right; margin-left: -25px; margin-top: -25px; position: relative; z-index: 2;"></span>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-new_password"></strong>
                      </span>
                  </div>
              </div>
              
              <div class="col-sm-12">
                  <div class="form-group">
                      <label class="control-label text-uppercase" >Confirm New Password: </label>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
                      <span toggle="#confirm_password-field" class="fa fa-fw fa-eye field_icon toggle-confirm_password" style="float: right; margin-left: -25px; margin-top: -25px; position: relative; z-index: 2;"></span>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-confirm_password"></strong>
                      </span>
                  </div>
              </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            <input type="submit" name="cp_action_button" id="cp_action_button" class="btn btn-link text-primary" value="Save" />
          </div>
        </div>
      </div>
    </div>
  </form>


@endsection


@section('footer')
    @include('../partials.site.footer')
@endsection



@section('script')
<script> 

$(document).on('click', '#changepassword', function(){
    $('#cpModal').modal('show');
    $('#cpForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.cp-modal-title').text('Change Password');
    $('#cp_button').val('Submit');
});

$('#updateForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var id = $('#hidden_id').val();
    var action_url = "update/" + id;
    var type = "POST";

    $.ajax({
        url: action_url,
        method:type,
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType:"json",

        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").attr("value", "Loading..");
        },
        success:function(data){
          $("#action_button").attr("disabled", false);
          $("#action_button").attr("value", "Submit");
            if(data.errors){
                $.each(data.errors, function(key,value){
                if(key == $('#'+key).attr('id')){
                      $('#'+key).addClass('is-invalid')
                      $('#error-'+key).text(value)
                  }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid');
                $.confirm({
                    title: 'Confirmation',
                    content: data.success,
                    type: 'green',
                    buttons: {
                            confirm: {
                                text: 'confirm',
                                btnClass: 'btn-blue',
                                keys: ['enter', 'shift'],
                                action: function(){
                                    location.reload();
                                }
                            },
                            
                        }
                    });
            }
        
        }
    });
});

$('#cpForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var id = $('#hidden_id').val();
    var action_url = "changepassword/" + id;
    var type = "PUT";

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#cp_action_button").attr("disabled", true);
            $("#cp_action_button").attr("value", "Loading..");
        },
        success:function(data){
          $("#cp_action_button").attr("disabled", false);
          $("#cp_action_button").attr("value", "Submit");
            if(data.errors){
                $.each(data.errors, function(key,value){
                if(key == $('#'+key).attr('id')){
                      $('#'+key).addClass('is-invalid')
                      $('#error-'+key).text(value)
                  }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid');
                $.confirm({
                    title: 'Confirmation',
                    content: data.success,
                    type: 'green',
                    buttons: {
                            confirm: {
                                text: 'confirm',
                                btnClass: 'btn-blue',
                                keys: ['enter', 'shift'],
                                action: function(){
                                    location.reload();
                                }
                            },
                            
                        }
                    });
            }
        
        }
    });
});

$("body").on('click', '.toggle-current_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#current_password");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});

$("body").on('click', '.toggle-new_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#new_password");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});

$("body").on('click', '.toggle-confirm_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#confirm_password");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});

</script>
@endsection
