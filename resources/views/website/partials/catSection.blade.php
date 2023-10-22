<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        @if($category_data->count() > 0)
        @foreach ($category_data as $category)
        <a href="/foodOfCategory/{{$category->id}}">
            <div class="box-3 float-container">
                <img src="{{ asset('images/' . $category->image) }}" class="img-responsive img-curve">
                <h3 class="float-text text-white">{{$category->title}}</h3>
            </div>
        </a>
        @endforeach  
        @else
        <div class='error'>Category Not Added</div>
        @endif
        <div class="clearfix"></div>
    </div>
</section>