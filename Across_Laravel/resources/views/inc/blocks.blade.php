<!--<div class="container pt-5">
    <p class="text-primary" >Lorem ipsum dolor</p>
            <div class="row rowresponsive">
                @php
                    $i=1;
                @endphp
                @foreach($category as $item)
                    @if($item-> parent_id == null)


                    <div class="Blocks BlocksColor-{{$i}}">

                        <div class=" respon1">
                            <img src="/storage/uploads/{{$item->category_logo}}" >
                        </div>
                        <div class=" respon2">
                            <p class="text-white">{{$item->name}}</p>
                        </div>
                        <div class=" respon3">
                            <a href="/category/{{$item->id}}" class="btn text-white bg-transparent "> > </a>
                        </div>
                    </div>
                        @php
                            $i++;
                        @endphp
                    @endif
                @endforeach
            </div>
    </div>
-->
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
                    <a href="{{ route('categories.show' , $category->id)}}"  class="btn text-white bg-transparent " style="font-size: 1.3em; "> > </a>
                </div>
            </div>
            @php $i++ @endphp
        @endforeach

    </div>
</div>