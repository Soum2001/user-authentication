<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body" id="user_details">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" id="user_id" name="user_id">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Full name" id="user_name" name="user_name" style="text-align:center" >
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" id="mail_id" name="mail_id" style="text-align:center" >
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" id="edit_user_details" onclick="edit_user_details()" value="Edit">
          </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.partials.footer')