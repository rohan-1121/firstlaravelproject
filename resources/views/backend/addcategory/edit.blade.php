@include('backend.link.head')
@include('backend.link.navbar')
@include('backend.link.sidebar')
<form action="{{route('category.update',$list->id)}}" method="post">
    @csrf
    @method('PUT')
    <h1>Add Category</h1>
    <label for="">add category</label>
    <input type="text" name="category" value="{{$list->category}}">
    <button>submit</button>
</form>
@include('backend.link.jquery')