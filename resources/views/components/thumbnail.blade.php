@php
if($type === 'images'){
  $path = 'storage/images/';
}
if($type === 'products'){
  $path = 'storage/products/';
}

@endphp

<div>
  @if(empty($filename))
    <img src="{{ asset('images/no_image.jpg')}}">
  @else
    <img src="{{ asset($path . $filename)}}">
  @endif
</div>