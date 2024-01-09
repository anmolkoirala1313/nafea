<div class="col-lg-4">
    <div class="sticky-side-div">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Homepage Components</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li>
                        <a class="d-flex py-1" data-bs-toggle="collapse" href="#filterlist-fashion"
                           role="button" aria-expanded="true" aria-controls="filterlist-fashion">
                            <div class="flex-grow-1">
                                <h5 class="fs-13 mb-0">Navigation List</h5>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <span class="badge bg-light text-muted">8</span>
                            </div>
                        </a>

                        <div class="collapse show" id="filterlist-fashion">
                            <ul class="ps-4">
                                <li>
                                    <a href="{{ route('backend.homepage.slider.index') }}" class="d-block py-1 {{request()->route()->getName() == 'backend.homepage.slider.index' ? '':'text-muted'}}">Slider</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.homepage.welcome.create') }}" class="d-block py-1 {{request()->route()->getName() == 'backend.homepage.welcome.create' ? '':'text-muted'}}">Welcome Section</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.homepage.call_action.create') }}" class="d-block py-1 {{request()->route()->getName() == 'backend.homepage.call_action.create' ? '':'text-muted'}}">Call Action</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.homepage.core_value.create') }}" class="d-block py-1 {{request()->route()->getName() == 'backend.homepage.core_value.create' ? '':'text-muted'}}">Core Value</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.homepage.mission_vision.create') }}" class="d-block py-1 {{request()->route()->getName() == 'backend.homepage.mission_vision.create' ? '':'text-muted'}}">Mission, Vision & Value</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.homepage.why_us.create') }}" class="d-block py-1 {{request()->route()->getName() == 'backend.homepage.why_us.create' ? '':'text-muted'}}">Why Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.homepage.recruitment_process.create') }}" class="d-block py-1 {{request()->route()->getName() == 'backend.homepage.recruitment_process.create' ? '':'text-muted'}}">Recruitment Process</a>
                                </li>
                                <li>
                                    <a href="{{ route('backend.homepage.general_grievance.create') }}" class="d-block py-1 {{request()->route()->getName() == 'backend.homepage.general_grievance.create' ? '':'text-muted'}}">General Grievance</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
