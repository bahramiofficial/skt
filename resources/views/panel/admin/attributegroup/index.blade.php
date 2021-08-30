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
          <li><a href="{{ route('admin.attributegroup.index') }}" class="is-active">attributegroup</a></li>
      </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('admin.attributegroup.index') }}">همه    attributegroup</a>
                <a class="tab__item" href="{{ route('admin.attributegroup.create') }}">attributegroup   جدید</a>
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
        </div>
        <div class="bg-white table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>name</th>
                    <th>category</th>
                    <th>تاریخ ثبت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($attributegroups as $attributegroup)
                    <tr role="row" class="">
                        <td>{{ $attributegroup->id }}</td>
                         <td>{{ $attributegroup->name }}</td>
                        <td>{{ $attributegroup->categoryshop->name }}</td>
                        <td>{{ $attributegroup->created_at }}</td>
                        {{-- <td>{{ $track->getCreatedAtInJalali() }}</td> --}}
                        <td>
                            {{-- @if(auth()->user()->id !== $user->id && $user->role !== 'admin') --}}
                            <a href="{{ route('admin.attributegroup.destroy', $attributegroup->id) }}" onclick="destroyTrack(event, {{ $attributegroup->id }})" class="item-delete mlg-15" title="حذف"></a>
                            {{-- @endif --}}
                            <a href="{{ route('admin.attributegroup.edit', $attributegroup->id) }}" class="item-edit " title="ویرایش"></a>
                            <form action="{{ route('admin.attributegroup.destroy', $attributegroup->id) }}" method="post" id="destroy-track-{{ $attributegroup->id }}">
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
