@include('layouts.partials.head')
<body class="hold-transition register-page">
<div class="register-box">
@if($success == 1)
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-check"></i> Alert!</h5>
      Updated user details.
    </div>
    @endif
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h3">Edit Profile Page</a>
    </div>
    <div class="card-body">
      <form action="profile" id="form" method="post">
        @csrf
        @foreach($select_user as $user_details)
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" id="user_name" name="user_name" value="{{$user_details->name}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{$user_details->email}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
       @endforeach
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" id="edit" name="edit">edit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@include('layouts.partials.footer')