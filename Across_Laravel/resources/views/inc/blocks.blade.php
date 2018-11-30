
@php $i = 0 @endphp
<div class="container pt-5">
    <div class="row rowresponsive">
        @foreach(\App\Category::whereNull('parent_id')->get() as $category)
            <div class="col blocks-{{$i}} text-center">
                <div class="col respon1">
                    <img src="/storage/uploads/{{ $category->category_logo }}" class="mt4" >
                </div>
                <div class="col respon2">
                    <p class="text-white size mt-4">{{ $category->name }}</p>
                </div>
                <div class="col respon3">
                    <a href="/category/{{$category->id}}" class="btn text-white bg-transparent "> > </a>
                </div>
            </div>
            @php $i++ @endphp
        @endforeach

    </div>
</div>