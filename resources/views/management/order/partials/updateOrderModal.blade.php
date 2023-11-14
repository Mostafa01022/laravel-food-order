<div class="modal fade" id="updateOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateOrderForm" class="updateOrderForm" method="POST">
                <div id="validation_errors_update" class="text-danger m-4 "></div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                        <div class="col-md-6">
                            <select class="form-select" name="status" aria-label="Default select example">
                                <option value="pending">Pending</option>
                                <option value="delivered">Delivered</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
