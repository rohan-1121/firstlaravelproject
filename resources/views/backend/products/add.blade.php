@include('backend.link.head')
@include('backend.link.navbar')
@include('backend.link.sidebar')
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Product Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" step="0.01" required><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" required><br><br>

    <label>Category:</label><br>
    <select name="category" id="">
        @foreach ($list as $cat )
        <option value="{{ $cat->category }}">{{ $cat->category }}</option>        
        @endforeach
    </select>
<br><br>
    <label>Image:</label><br>
    <input type="file" name="image"><br><br>

    <label>Description:</label><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Save</button>
</form>

@include('backend.link.jquery')