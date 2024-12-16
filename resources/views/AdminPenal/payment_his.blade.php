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
    
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User name</th>
                    <th>Event name</th>
                    <th>Amount</th>
                    <th>Transaction</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($PaymentHistory as $history)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $history->user->name }}</td>
                        <td>{{ $history->UserEvent->event_name }}</td>
                        <td>{{ $history->amount }}</td>
                        <td>{{ $history->transaction_id }}</td>
                        <td>{{ \Carbon\Carbon::parse($history->payment_date)->format('d/m/Y') }}</td>

                        <td>{{ $history->type ? 'Pay now' : 'Pay with crypto' }}</td>
                        <td>{{ $history->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <!-- Accept Button -->
                            <form action="{{ route('payment-history.accept', $history->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Accept</button>
                            </form>
                        
                            <!-- Reject Button -->
                            <form action="{{ route('payment-history.reject', $history->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
   <!-- Pagination -->
   <div class="d-flex justify-content-center">
    {{ $PaymentHistory->links() }} <!-- Pagination Links -->
</div>
</div>
</div>
</div>
</div>