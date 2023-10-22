<div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateCatForm" class="updateCatForm" method="POST" >
                
                <div id="update-errors" class="text-danger m-4 "></div>
                <div id="action_message" class="text-success d-flex "></div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="title_to_update" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title_to_update" type="text" class="form-control" name="title" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="current_image" class="col-md-4 col-form-label text-md-end">{{ __('Current Image') }}</label>

                        <div class="col-md-6">
                            <img id="current_image" style="width: 5rem;" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image_to_update" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                        
                        <div class="col-md-6">
                            <input id="image_to_update" type="file" class="form-control" name="new_image"  autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="active" class="col-md-4 col-form-label text-md-end">{{ __('Active') }}</label>

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input active_to_update" type="radio" value="1" name="active" id=""checked>
                                <label class="form-check-label" for="active">
                                Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input active_to_update" type="radio" value="0" name="active" id="active-1" >
                                <label class="form-check-label" for="active_0">
                                No
                                </label>
                            </div>                        
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input class="" type="hidden" value="" name="old_image" id="old_image" >
                    <input class="" type="hidden" value="" name="cat_id" id="cat_id" >
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>