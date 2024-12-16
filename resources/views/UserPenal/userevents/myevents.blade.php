@include('layout.header') 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layout.head') 
    <!-- End Navbar -->

    <div class="container-fluid py-2">
        <div class="container">
            <div class="row">
                @foreach($Event as $event)
                <div class="col-lg-4 col-md-6 mb-4">
                    
                    <div class="card h-100">
                        <i class="fa fa-share"></i>
                        <img src="{{ asset('storage/event_images/' . $event->image_path) }}" 
                             class="card-img-top" 
                             alt="Event Image"
                             style="padding: 12px; border-radius: 18px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                {{ $event->event_name }} <span class="text-highlight">{{ $event->guest_names }}</span>
                                PROGRAM {{ $event->event_date }}<br>
                                Speaker {{ $event->speaker_name }}<br>
                                Event Type {{ $event->event_type }}
                            </h5>
                            <p class="card-text">{{ $event->description }}</p>
                        </div>
                        <div class="card-footer text-center d-flex justify-content-between">
                            <!-- Edit Button -->
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            @if($event->status == 1)
                            <button class="btn btn-danger">
                               Pending
                            </button> 
                            @else
                            <button class="btn btn-danger">
                                Complete
                            </button> 
                            @endif
                            <!-- Delete Button -->
                            <form action="{{ route('event.delete', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                
                            
                        </div>
                    </div>
                </div>
                @endforeach
                
                <style>
                    .create-event-card {
                       
                       
                        
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 150px auto;
                        
                        
                    }
                    .plus-icon {
                        font-size: 40px;
                        color: #000;
                    }
                    .create-event-text {
                        font-size: 16px;
                        font-weight: bold;
                        margin-top: 10px;
                    }
                    .highlight {
                        color: #28c;
                    }
                </style>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                       @if ($user->status == 2)
                       <div class="create-event-card text-center">
                        <a href="{{route('userevent')}}">
                        <div>
                            <div class="plus-icon">+</div>
                            <div class="create-event-text">
                                CREATE NEW <span class="highlight">EVENT</span>
                            </div>
                        </div>
                    </a>
                    </div>
                    @else
                    <div class="create-event-card text-center">
                        <a href="#">
                        <div>
                            <div class="plus-icon">+</div>
                            <div class="create-event-text">
                                CREATE NEW <span class="highlight">EVENT</span>
                            </div>
                        </div>
                    </a>
                    </div>
                       @endif
                       
                    
                    </div>
                </div>
            </div>
        </div>
        