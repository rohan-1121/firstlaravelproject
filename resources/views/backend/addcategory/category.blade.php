@include('backend.link.head')
@include('backend.link.navbar')
@include('backend.link.sidebar')
<form action="{{route('category.store')}}" method="post">
    @csrf
    <h1>Add Category</h1>
    <label for="">add category</label>
    <input type="text" name="add" placeholder="category name">
    <button>submit</button>
</form>
@include('backend.link.jquery')