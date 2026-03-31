@include('admin.top-header')

<style>
  .stats-card {
    transition: 0.3s ease;
  }

  .stats-card:hover {
    transform: translateY(-5px);
  }

  .icon-box {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }
</style>

<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">

    <!-- Welcome Card -->
    <div class="row">
      <div class="col-12 mb-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden"
          style="background: linear-gradient(135deg, #e8f1ff, #f3e8ff, #fff1e6);">

          <div class="card-body p-4">
            <div class="row align-items-center">

              <div class="col-md-8">
                <h3 class="fw-bold mb-2" style="color:#1e3a8a;">
                  Welcome {{ auth()->user()->name }} 👋
                </h3>

                <p class="mb-0 fs-6" style="color:#64748b;">
                  Welcome to Harsh PlyWood Admin Dashboard. 
                  Start managing your platform from here.
                </p>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Stats Section (Empty / Placeholder) -->
    <div class="row">

      <div class="col-md-4 mb-4">
        <div class="card stats-card shadow-sm border-0 rounded-4">
          <div class="card-body d-flex align-items-center">
            <div class="icon-box bg-primary text-white me-3">
              <i class="fa fa-list"></i>
            </div>
            <div>
              <h5 class="mb-0">0</h5>
              <small class="text-muted">Total Listings</small>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card stats-card shadow-sm border-0 rounded-4">
          <div class="card-body d-flex align-items-center">
            <div class="icon-box bg-success text-white me-3">
              <i class="fa fa-users"></i>
            </div>
            <div>
              <h5 class="mb-0">0</h5>
              <small class="text-muted">Total Users</small>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card stats-card shadow-sm border-0 rounded-4">
          <div class="card-body d-flex align-items-center">
            <div class="icon-box bg-warning text-white me-3">
              <i class="fa fa-envelope"></i>
            </div>
            <div>
              <h5 class="mb-0">0</h5>
              <small class="text-muted">Total Enquiries</small>
            </div>
          </div>
        </div>
      </div>

    </div>

    @include('admin.footer')
  </div>
</div>