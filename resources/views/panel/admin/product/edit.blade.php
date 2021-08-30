<x-panel-layout>
  <x-slot name="title">
    - ویرایش پیست
  </x-slot>
  <div class="breadcrumb">
      <ul>
          <li><a href="{{ route('dashboard') }}" title="پیشخوان">پیشخوان</a></li>
          <li><a href="{{ route('track.index') }}" class="">پیست</a></li>
          <li><a href="{{ route('track.create') }}" class="is-active">ویرایش پیست</a></li>
      </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ویرایش پیست</p>
 

                {{-- {{ route('tracks.store') }} --}}
                <form action="{{ route('track.update',$track->id ) }}" class="padding-30" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('put')

                    <input type="text" name="name" class="text" placeholder="نام پیست" value="{{ $track ? $track->name : old('name') }}">
                    @error('name')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <input type="text" name="lat" class="text" placeholder="lat" value="{{ $track ? $track->lat : old('lat') }}">
                    @error('lat')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <input type="text" name="long" class="text" placeholder="long" value="{{ $track ? $track->long : old('long') }}">
                    @error('long')
                      <p class="error">{{ $message }}</p>
                    @enderror

                    <textarea name="desc" class="text" >{{ $track ? $track->desc : old('desc') }}</textarea> 
                    @error('desc')
                      <p class="error">{{ $message }}</p>
                    @enderror


                    <select class="select" name="province" id="province"  onchange="change()">
                      @foreach ($provinces as $province)  
                        <option value="{{ $province->id }}" >{{ $province->name }}</option> 
                      @endforeach
                    </select>
                    @error('province')
                      <p class="error">{{ $message }}</p>
                    @enderror
    
                    <select class="select" name="ct" id="ct"> 
                      <option value="1" >1</option> 
                      <option value="2" >2</option> 
                      <option value="3" >3</option> 
                      <option value="4" >4</option> 
                   </select>
                   @error('ct')
                    <p class="error">{{ $message }}</p>
                   @enderror 
                   <input type="file" name="image" class="text" value="{{ old('image') }}">
                   @error('image')
                     <p class="error">{{ $message }}</p>
                   @enderror

                    <button class="btn btn-skaters">ساخت</button>
                </form>
 

               <input type="hidden" value="{{ json_encode($provinces->toArray()) }}" id="pro">

            </div>
        </div>
    </div>
 

 
<script>
 
 
    
  function change() {
    province = document.getElementById("province");
    val = province.options[province.selectedIndex].value;  
    
    pro = JSON.parse(document.getElementById("pro").value);  
  
    cities = pro[val-1].cities; 
     
    selectCtiy =  document.getElementById("ct");
    for ( x = 0 ; x <  cities.length ; x++)
    { 
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