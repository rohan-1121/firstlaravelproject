@include('backend.link.head')
@include('backend.link.navbar')
@include('backend.link.sidebar')

<h2>Edit Hero Section</h2>

<form action="{{ route('herosection.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Heading:</label><br>
    <input type="text" name="heading" value="{{ $hero->heading }}" required><br><br>

    <label>Paragraph:</label><br>
    <textarea name="paragraph" required>{{ $hero->paragraph }}</textarea><br><br>

    <label>Current Image:</label><br>
    @if($hero->image)
        <img src="{{ asset('heroimage/'.$hero->image) }}" height="50px" width="50px"><br><br>
    @endif

    <label>Change Image:</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Update</button>
</form>

@include('backend.link.jquery')
