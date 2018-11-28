<div class="container pt-5">
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

