
@include('layout.header') 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('layout.head') 
    <!-- End Navbar -->
    <div class="container-fluid py-2">
      <style>
        .dashboardbox{
    height: 192px;
    background: #00bcd491;
    border-radius: 9px;
    display: flex;
    align-items: center;
    margin-bottom: auto;
}
.fontsize{
  font-size: 12px;
}
</style>
<div class="row g-1">  <!-- g-4 will add spacing between columns -->
  <div class="col-lg-8">
      <div class="card">
          <div class="card-body">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-md-6 custom-card">
                          <h4 class="fontsize">Gateway To Host Event For Crypque</h4>
                          <p class="description fontsize">
                              This program helps you create events for your community after completing certification successfully.
                          </p>
                          <a href="{{ route('courespaymentpage') }}">
                              <button class="btn join-btn">Join Program</button>
                          </a>
                      </div>
                      <div class="col-md-6 dashboardbox">
                          <div class="program-card">
                              <h5>CRYPQUE EVENT CERTIFICATION PROGRAM 2024</h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <div class="row g-4"> <!-- 'g-4' adds space between columns -->
    @foreach ($UserEvent as $UserEvent)
        <div class="col-md-4  mb-4"> <!-- Ensure equal spacing and allow for flexible height -->
            <div class="card" style="background-image: url('{{ asset('storage/event_images/' . $UserEvent->image_path) }}');
                background-size: cover; background-position: center; border-radius: 7px; height: 300px;">
                <div class="card-body d-flex flex-column justify-content-between" style="color: white;">
                    <div>
                        <h6 class="mb-0" style="color:#fff;">
                            {{ $UserEvent->event_name }}<br>
                            {{ $UserEvent->guest_names }}<br>
                            {{ $UserEvent->speaker_name }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>

      
   