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
          <li><a href="{{ route('track.index') }}" class="is-active">پیست</a></li>
      </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('track.index') }}">همه پیست ها</a>
                <a class="tab__item" href="{{ route('track.create') }}">ایجاد پیست جدید</a>
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
                  @foreach($tracks as $track)
                    <tr role="row" class="">
                        <td>{{ $track->id }}</td> 
                        <td><img src="{{ $track->image }}" alt="" title="" width="40px" height="40px"></td> 
                        <td>{{ $track->name }}</td> 
                        <td>{{ $track->province->name }}</td>
                        <td>{{ $track->city->name }}</td>
                        <td>
                          <a href="https://maps.google.com/?q={{ $track->lat }}, {{ $track->long }}" target="_blank">
                            <img src="{{ $track->image }}" alt="" title="" width="40px" height="40px">
                            {{-- <img src="{{ public_path('/images/banners/gmap.jpg')}}" alt="" title="" width="40px" height="40px"> --}}
                           </a>
                        </td>
                        <td>{{ $track->user->name }}</td>
                        <td>{{ $track->getCreatedAtInJalali() }}</td>
                        <td>
                            {{-- @if(auth()->user()->id !== $user->id && $user->role !== 'admin') --}}
                            <a href="{{ route('track.destroy', $track->id) }}" onclick="destroyTrack(event, {{ $track->id }})" class="item-delete mlg-15" title="حذف"></a>
                            {{-- @endif --}}
                            <a href="{{ route('track.edit', $track->id) }}" class="item-edit " title="ویرایش"></a>
                            <form action="{{ route('track.destroy', $track->id) }}" method="post" id="destroy-track-{{ $track->id }}">
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