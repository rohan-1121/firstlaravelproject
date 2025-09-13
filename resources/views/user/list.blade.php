@include('front_component.head')
@include('front_component.nav')
<table border="2px" cellspacing="0" cellpadding="10px" style="margin: 100px">
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    @foreach ($cart as $items )
    @php
        $product=App\Models\productList::find($items->product_id);
    @endphp
    <tr>
        <th>
            <img src="{{ asset('productimage/'.$product->image) }}" height="90px" width="90px" alt="">
        </th>
        <th>{{ $product->name }}</th>
        <th>${{ $product->price }}</th>
        <th>
            <a href="{{ route('cartdel',$items->id) }}">Delete</a>
        </th>
    </tr>
    @endforeach
</table>
@include('front_component.footer')
@include('front_component.jquey')