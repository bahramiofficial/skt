<x-app-layout>

<x-slot name="title">
    -  پیست اسکیت
</x-slot>

<main>
     
        <province></province>
      

    <div class="container1 menuarticle">
        <div class="menuarticles__item">
            <form>
                <div class="menuarticles__item_to flxxx">

                    <select class="dropdown-select">
                        <option value="0">استان</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name}}</option>
                        @endforeach
                    </select>

                    <select class="dropdown-select">
                        <option>کهگلویه و بویر احمد</option>
                        <option>18</option>
                        <option>کهگلویه و بویر احمد</option>
                    </select>

                    <input type="text" class="dropdown-select">
                    <input  type="submit" value="serch" class="dropdown-select">
                </div>
            </div>
        </form>
    </div>



    <article class="container article">

        <div class="articles">

            @forelse($tracks as $track)
            <div class="articles__item">
                {{--  {{ route('post.show', $post->slug) }}   --}}
                <a href="#shoimgae" class="articles__link">
                    <div class="articles__title">
                        <h2>{{ $track->name }}</h2>
                    </div>

                    <div class="articles__img">
                        <img src="{{ $track->image }}" class="articles__img-src">
                    </div>

                    <div class="articles__details">
                        <div class="articles__desc">
                            {{ $track->desc }}
                        </div>

                    </div>

                    <div class="articles__details">
                        <div class="articles__author">نویسنده : {{ $track->user->name }}</div>
                        {{-- <div class="articles__date">تاریخ : {{ $post->getCreatedAtInJalali() }}</div>   --}}
                        <div class="articles__date">
                            map
                            {{-- <a class="" tyle="cursor: pointer;" target="_blank" onclick="myNavFunc( {{ $track->lat }}, {{ $track->lat }} )"> --}}
                                {{-- <img src="http://localhost:8000/images/banners/gmap.jpg" class="articles__img-src"> --}}
                             {{-- map </a> --}}
                            {{--toer milad  35.74501068179643, 51.37529919812113 --}}


                            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6476.543696755367!2d51.36991332245927!3d35.74412248227705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0710d5918403%3A0x74f5290b67841378!2sBorj-e%20Milad!5e0!3m2!1sde!2s!4v1628555207547!5m2!1sde!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}

                            <script>
                                function myNavFunc(lan, long){
                                    var loc = lan.toString()  + "," + long.toString();
                                                // If it's an iPhone..
                                    if( (navigator.platform.indexOf("iPhone") != -1)
                                      || (navigator.platform.indexOf("iPod") != -1)
                                      || (navigator.platform.indexOf("iPad") != -1))
                                            window.open("maps://maps.google.com/maps?daddr="+ loc +"&amp;ll=");
                                     else
                                            window.open("http://maps.google.com/maps?daddr="+ loc +"&amp;ll=");
                                }
                            </script>

                        </div>

                    </div>
                </a>
            </div>
            @empty
            <p>هیچ مقاله ای یافت نشد!</p>
            @endforelse

        </div>
    </article>
    {{-- {{ $track->appends(request()->query())->links() }} --}}
</main>
</x-app-layout>
