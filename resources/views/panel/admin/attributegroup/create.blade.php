<x-panel-layout>
    <x-slot name="title">
        - ساخت کاربر جدید
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{ route('admin.attributegroup.index') }}" class="">محصول</a></li>
            <li><a href="{{ route('admin.attributegroup.create') }}" class="is-active">ثبت محصول جدید</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ثبت محصول</p>
                {{-- {{ route('tracks.store') }} --}}
                <form action="{{ route('admin.attributegroup.store') }}" class="padding-30" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <select class="select" name="categoryshop_id" id="categoryshop_id">
                        <option value="">انتخاب کنید</option>
                        @foreach (\App\H::allCategoryShop() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryshop_id')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <input type="text" name="name" class="text" placeholder="نام محصول" value="{{ old('name') }}">
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <input type="number" name="rate" class="text" placeholder="rate" value="{{ old('rate') }}">
                    @error('rate')
                        <p class="error">{{ $message }}</p>
                    @enderror


                    <button class="btn btn-skaters">ساخت</button>
                </form>


                {{-- <input type="hidden" value="{{ json_encode($provinces->toArray()) }}" id="pro"> --}}

            </div>
        </div>
    </div>



    <script>
        function change() {
            province = document.getElementById("province");
            val = province.options[province.selectedIndex].value;

            pro = JSON.parse(document.getElementById("pro").value);

            cities = pro[val - 1].cities;

            selectCtiy = document.getElementById("ct");
            for (x = 0; x < cities.length; x++) {
                option = document.createElement('option');
                option.value = cities[x].id;
                option.text = cities[x].name;
                selectCtiy.appendChild(option);
            }

            var x = document.getElementById("ct");
            var option = document.createElement("option");
            option.text = "Kiwi";
            x.add(option);


        }
        // https://stackoverflow.com/questions/17730621/how-to-dynamically-add-options-to-an-existing-select-in-vanilla-javascript
    </script>

</x-panel-layout>
