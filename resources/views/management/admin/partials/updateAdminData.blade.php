<div class="modal fade" id="updateAdminDateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateDataForm" class="updateDataForm" method="POST" >
                <div id="update-errors" class="text-danger m-4 "></div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="name_to_update" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name_to_update" type="text" class="form-control" name="name_to_update" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email_to_update" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email_to_update" type="text" class="form-control" name="email_to_update" required autocomplete="new-password">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="admin_id" name="admin_id" >
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>