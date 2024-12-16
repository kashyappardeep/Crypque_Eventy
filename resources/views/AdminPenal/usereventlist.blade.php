@include('Include.header') 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('Include.head') 
    <!-- End Navbar -->
    <div class="container-fluid py-2">
        <div class="card">
            <div class="card-body">
                <div class="container mt-4">
                    <h3 class="mb-4"> Users Events Lists</h3>
                    
                    {{-- @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif --}}
                
                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Guest Names</th>
                                    <th>Speaker Name</th>
                                    <th>Location</th>
                                    <th>Event Type</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->user->name }}</td>
                                        <td>{{ $user->event_name }}</td>
                                        <td>{{ $user->event_date }}</td>
                                        <td>{{ $user->guest_names }}</td>
                                        <td>{{ $user->speaker_name }}</td>
                                        <td>{{ $user->location }}</td>
                                        <td>{{ $user->EventType->name }}</td>
                                        <td>{{ $user->description }}</td>
                                        <td>{{ $user->status == 1 ? 'Inactive' : 'Active' }}</td>
                                        <td>
                                            <!-- Delete Button -->
                                            <form action="{{ route('user-eventsdestroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $events->links() }}
                    </div>
                </div>
                
</div>
</div>
</div>