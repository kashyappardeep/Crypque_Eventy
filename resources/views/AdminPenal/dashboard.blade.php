
@include('Include.header') 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('Include.head') 
    <!-- End Navbar -->
    <div class="container-fluid py-2">
      
        <div class="row">
            <div class="ms-3">
              <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
              {{-- <p class="mb-4">
                Check the sales, value and bounce rate by country.
              </p> --}}
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-2 ps-3">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Total User</p>
                      <h4 class="mb-0">$53k</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                      <i class="material-symbols-rounded opacity-10">groupperson</i>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-2 ps-3">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Active User</p>
                      <h4 class="mb-0">2300</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                      <i class="material-symbols-rounded opacity-10">groupperson</i>
                    </div>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
               
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-header p-2 ps-3">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Inactive Users</p>
                      <h4 class="mb-0">3,462</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                      <i class="material-symbols-rounded opacity-10">groupperson</i>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-header p-2 ps-3">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p class="text-sm mb-0 text-capitalize">Total Events</p>
                      <h4 class="mb-0">$103,430</h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                      <i class="material-symbols-rounded opacity-10">event</i>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
      </div>
      
   