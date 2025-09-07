@include('backend.link.head')
@include('backend.link.navbar')
@include('backend.link.sidebar')

<div class="container mt-5">
    <h2 class="mb-4">Category List</h2>
    <table border="2px" cellpadding="5px" cellspacing="0">
        <tr>
            <th>id</th>
            <th>Category Name</th>
            <th>Created At</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach ($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
                <td>
                    <form action="{{ route('category.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">
                            Delete
                        </button>
                    </form>
                </td>
                <td><a href="{{route('category.edit', $item->id)}} ">update</a></td>
            </tr>
        @endforeach
    </table>
</div>

@include('backend.link.jquery')