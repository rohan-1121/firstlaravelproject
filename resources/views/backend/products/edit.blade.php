@include('backend.link.head')
@include('backend.link.navbar')
@include('backend.link.sidebar')

<h2>Edit Product</h2>

<form action="{{ route('product.update', $listofproduct->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Product Name:</label><br>
    <input type="text" name="name" value="{{ $listofproduct->name }}" required><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" step="0.01" value="{{ $listofproduct->price }}" required><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" value="{{ $listofproduct->quantity }}" required><br><br>

   <label>Category:</label><br>
<select name="category">
    @foreach ($list as $cat)
        <option value="{{ $cat->category }}" {{ $listofproduct->category == $cat->category ? 'selected' : '' }}>
            {{ $cat->category }}
        </option>
    @endforeach
</select><br><br>

    <label>Current Image:</label><br>
    @if($listofproduct->image)
        <img src="{{ asset('productimage/'.$listofproduct->image) }}" height="50px" width="50px"><br><br>
    @endif

    <label>Change Image:</label><br>
    <input type="file" name="image"><br><br>

    <label>Description:</label><br>
    <textarea name="description">{{ $listofproduct->description }}</textarea><br><br>

    <button type="submit">Update</button>
</form>

@include('backend.link.jquery')
