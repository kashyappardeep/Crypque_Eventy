@include('Include.header') 

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    @include('Include.head') 
    <!-- End Navbar -->

    <div class="container-fluid py-2">
        <div class="card">
            <div class="card-body">
                <div class="container mt-4">
                    <h3 class="mb-4">Users Pending Events</h3>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User name</th>
                                    <th>Event name</th>
                                    <th>Event date</th>
                                    <th>Guest names</th>
                                    <th>Speaker name</th>
                                    <th>Location</th>
                                    <th>Event type</th>
                                    <th>Description</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_event as $user_event)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td style="text-align: center;">{{ $user_event->user->name }}</td>
                                    <td style="text-align: center;">{{ $user_event->event_name }}</td>
                                    <td style="text-align: center;">{{ $user_event->event_date }}</td>
                                    <td style="text-align: center;">{{ $user_event->guest_names }}</td>
                                    <td style="text-align: center;">{{ $user_event->speaker_name }}</td>
                                    <td style="text-align: center;">{{ $user_event->location }}</td>
                                    <td style="text-align: center;">{{ $user_event->EventType->name }}</td>
                                    <td style="text-align: center;">{{ $user_event->description }}</td>
                                    
                                    <td style="text-align: center;">
                                        <!-- Accept Button -->
                                        <form action="{{ route('event_accept.accept', $user_event->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Accept</button>
                                        </form>
                                
                                        <!-- Reject Button -->
                                        <form action="{{ route('event_reject.reject', $user_event->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination Links -->
                    {{-- <div class="d-flex justify-content-center">
                        {{ $user_event->links() }} <!-- This will show the pagination links -->
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

