<x-panel-layout>
  <x-slot name="title">
    - مدیریت کاربران
  </x-slot>
  <x-slot name="styles">
    <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">
  </x-slot>
    <div class="breadcrumb">
      <ul>
          <li><a href="{{ route('dashboard') }}" >پیشخوان</a></li>
          <li><a href="{{ route('admin.product.index') }}" class="is-active">پیست</a></li>
      </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('admin.product.index') }}">همه    product</a>
                <a class="tab__item" href="{{ route('admin.product.create') }}">product   جدید</a>
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
        </div>
        <div class="bg-white table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>تصویر</th>
                    <th>پیست</th>
                    <th>استان</th>
                    <th>شهر</th>
                    <th>لوکیشنن</th>
                    <th>کاربر</th>
                    <th>تاریخ ثبت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                    <tr role="row" class="">
                        <td>{{ $product->id }}</td>
                        {{-- <td><img src="{{ $track->image }}" alt="" title="" width="40px" height="40px"></td> --}}
                        <td>{{ $product->name }}</td>
                        <td>{{ substr($product->desc, 0, 28) . '...'  }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->image }}</td>
                        <td>{{ $product->categoryshop->name }}</td>
                        <td>{{ $product->user->name }}</td>
                        <td>{{ $product->created_at }}</td>
                        {{-- <td>{{ $track->getCreatedAtInJalali() }}</td> --}}
                        <td>
                            {{-- @if(auth()->user()->id !== $user->id && $user->role !== 'admin') --}}
                            <a href="{{ route('track.destroy', $product->id) }}" onclick="destroyTrack(event, {{ $product->id }})" class="item-delete mlg-15" title="حذف"></a>
                            {{-- @endif --}}
                            <a href="{{ route('track.edit', $product->id) }}" class="item-edit " title="ویرایش"></a>
                            <form action="{{ route('track.destroy', $product->id) }}" method="post" id="destroy-track-{{ $product->id }}">
                              @csrf
                              @method('delete')
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
    <x-slot name="scripts">
      <script>
        function destroyTrack(event, id) {
          event.preventDefault();
          Swal.fire({
          title: 'ایا مطمئن هستید این کار را میخواهید حذف کنید؟',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: 'rgb(221, 51, 51)',
          cancelButtonColor: 'rgb(48, 133, 214)',
          confirmButtonText: 'بله حذف کن!',
          cancelButtonText: 'کنسل'
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById(`destroy-track-${id}`).submit()
          }
        })
        }
      </script>
    </x-slot>
</x-panel-layout>
