<x-panel-layout>
<x-slot name="title">
  - ویرایش دسته بندی
</x-slot>
  <div class="breadcrumb">
    <ul>
        <li><a href="{{ route('dashboard') }}" title="پیشخوان">پیشخوان</a></li>
        <li><a href="{{ route('categoryshop.index') }}" class="">دسته بندی ها</a></li>
        <li><a href="{{ route('categoryshop.edit', $categoryshop->id) }}" class="is-active">ویرایش دسته بندی</a></li>
    </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters bg-white margin-bottom-20">
            <div class="col-12">
                <p class="box__title">ویرایش دسته بندی</p>
                <form action="{{ route('categoryshop.update', $categoryshop->id) }}" class="padding-30" method="post">
                    @csrf
                    @method('put')
                    <input type="text" name="name" class="text" value="{{ $categoryshop->name }}" placeholder="نام و نام خانوادگی">
                    @error('name')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <select class="select" name="parent_id" id="parent_id">
                        <option value="">ندارد</option>
                        @foreach($parentCategoryshops as $parentCategory)
                          <option value="{{ $parentCategory->id }}" @if($parentCategory->id === $categoryshop->parent_id) selected @endif>{{ $parentCategory->name }}</option>
                        @endforeach
                    </select>
                    @error('parent_id')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <button class="btn btn-skaters">ویرایش دسته بندی</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>
