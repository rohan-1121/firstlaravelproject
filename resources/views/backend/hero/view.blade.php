@include('backend.link.head')
@include('backend.link.navbar')
@include('backend.link.sidebar')
<br>
<table border="1" cellspacing="0" cellpadding="5px">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Create_At</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach ($list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->heading }}</td>
            <td>{{ $item->paragraph }}</td>
            <td>
                <img src="{{ asset('heroimage/'.$item->image) }}" height="50px" width="50px" alt="image">
            </td>
            <td>{{ $item->created_at->format('Y-m-d h:i A') }}</td>
            <td>
                <form action="{{ route('herosection.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">
                        Delete
                    </button>
                </form>
            </td>
            <td>
                <a href="{{ route('herosection.edit', $item->id) }}">Update</a>
            </td>
        </tr>
    @endforeach
</table>


@include('backend.link.jquery')