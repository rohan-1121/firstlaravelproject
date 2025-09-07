@include('backend.link.head')
@include('backend.link.navbar')
@include('backend.link.sidebar')
<form action="{{route('herosection.store')}}" method="POST" enctype="multipart/form-data" style="margin-left:20px;">
    @csrf
    <h1>Add Hero Section</h1>

    <label for="">Head</label>
    <input type="text" name="name" placeholder=" Heading"><br><br>

    <label for="">Paragraph</label>
    <textarea name="textbox" id=""></textarea>

    <label for="">Image</label>
    <input type="file" name="img"><br><br>

    <button type="submit">Submit</button>
</form>


@include('backend.link.jquery')