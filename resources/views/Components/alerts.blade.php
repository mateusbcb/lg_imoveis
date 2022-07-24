@if (session()->has('error'))

    <div class="alert alert-danger me-4 position-fixed top-0 mt-4 end-0 w-25 shadow alert-dismissible fade show" role="alert" style="z-index: 1090;">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('error') }}
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success me-4 position-fixed top-0 mt-4 end-0 w-25 shadow alert-dismissible fade show" role="alert" style="z-index: 1090;">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('success') }}
    </div>
@endif

@if (session()->has('info'))
    <div class="alert alert-info me-4 position-fixed top-0 mt-4 end-0 w-25 shadow alert-dismissible fade show" role="alert" style="z-index: 1090;">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('info') }}
    </div>
@endif
