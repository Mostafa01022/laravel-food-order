<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="changePasswordForm" class="change_pass_form" method="POST" >
                <div id="change-errors" class="text-danger m-4 "></div>
                <div id="wrong_password" class="text-danger m-4 "></div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="old_password" class="col-md-4 col-form-label text-md-end">{{ __('Old Password') }}</label>

                        <div class="col-md-6">
                            <input id="old_password" type="password" class="form-control" name="old_password" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control" name="new_password" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary change_submit">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>