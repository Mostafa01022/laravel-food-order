<div class="modal fade" id="addFoodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addFoodForm" class="addFoodForm" method="POST">

                <div id="add-errors" class="text-danger m-4 "></div>
                <div id="action_message" class="text-success d-flex "></div>

                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" required
                                autocomplete="title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control" name="price" required
                                autocomplete="price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description"
                            class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control" name="description" required
                                autocomplete="description">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control" name="image" required
                                autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

                        <div class="col-md-6">
                            @if($category_data)
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option selected @disabled(true)>Open this select menu</option>
                                @foreach ($category_data as $category_data)
                                <option value="{{ $category_data->id }}">{{ $category_data->title }}</option>
                            @endforeach
                        @else
                            <option value="0">No Category Found</option>
                            @endif
                                </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="active" class="col-md-4 col-form-label text-md-end">{{ __('Active') }}</label>

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="1" name="active"
                                    id=""checked>
                                <label class="form-check-label" for="active">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="0" name="active"
                                    id="active-1">
                                <label class="form-check-label" for="active_0">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
