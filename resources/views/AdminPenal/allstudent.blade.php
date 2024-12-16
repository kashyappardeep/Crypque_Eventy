@include('Include.header') 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('Include.head') 
    <!-- End Navbar -->
    <div class="container-fluid py-2">
        <div class="card">
            <div class="card-body">
<div class="container mt-4">
    <h3 class="mb-4">All Users</h3>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Created At</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->status == 1)
                    <td>Inactive</td>
                @else
                    <td>Active</td>
                @endif
                    <td>{{ $user->created_at->format('d-m-Y') }}</td>
                    
                    <td>
                        <!-- Edit Button -->
                        {{-- <a href="{{ route('edit_user', $user->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                        
                        <!-- Delete Button (Modal) -->
                        {{-- <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">Delete</button> --}}

                        <!-- Delete Modal -->
                        {{-- <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">Delete User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this user?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('delete_user', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $users->links() }} <!-- Pagination Links -->
    </div>
</div>
</div>
</div>
</div>