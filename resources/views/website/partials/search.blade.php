<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <form action="" method="">
            <input type="search" name="search" class="search" placeholder="Search for Food..">
            <input type="button" value="Search" class="btn btn-danger search_btn">
        </form>
    </div>
</section>

@section('jsFile')
    <script src="{{ asset('js/website/search/actions.js') }}"></script>
@endsection