 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link-->
        <a href="#" class="brand-link"> <!--begin::Brand Image-->
            <img src="{{ asset("images/cict-logo.png") }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text-->
            @switch(Auth::user()->role)
                @case(0)
                    <span class="brand-text fw-light">Admin</span>
                    @break
                @case(1)
                    <span class="brand-text fw-light">HTE</span>
                    @break
                @case(3)
                    <span class="brand-text fw-light">Inter</span>
                    @break

            @endswitch

             <!--end::Brand Text-->
        </a> <!--end::Brand Link-->
    </div> <!--end::Sidebar Brand-->
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper" data-overlayscrollbars="host"><div class="os-size-observer os-size-observer-appear"><div class="os-size-observer-listener ltr"></div></div><div data-overlayscrollbars-viewport="scrollbarHidden" style="margin-right: -16px; margin-bottom: -16px; margin-left: 0px; top: -8px; right: auto; left: -8px; width: calc(100% + 16px); padding: 8px; overflow-y: scroll;">
        <nav class="mt-2">
          <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
              <!--admin sidebar-->
              @if (Auth::user()->role == '0')
                <li class="nav-item">
                  <a href="{{ route('admin.index', Auth::id()) }}" class="nav-link"><p>Dashboard</p></a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.student-list') }}" class="nav-link"><p>Intern List</p></a>
                </li>
                <li class="nav-item">
                  <a href="{{ route("admin.student-weekly-report") }}" class="nav-link"><p>Intern Weekly Report</p></a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.intern-application')}}" class="nav-link"><p>Intern Application</p></a>
                </li>
                <li class="nav-item">
                  <a href="{{ route("admin.hte-info") }}" class="nav-link"><p>HTE Info</p></a>
                </li>
              @endif
              <!--hte sidebar-->
              @if (Auth::user()->role == '1')
                <li class="nav-item">
                  <a href="{{ route('hte.index', Auth::id()) }}" class="nav-link">
                    <p>
                        Dashboard
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('hte.student-list') }}" class="nav-link">
                    <p>
                        Intern List
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('hte.weekly-tasks') }}" class="nav-link">
                    <p>
                        Intern Weekly Tasks
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('hte.weekly-submission') }}" class="nav-link">
                    <p>
                        Intern Weekly Submission
                    </p>
                  </a>
                </li>
              @endif
              <!--coord sidebar-->
              {{-- @if (Auth::user()->role == '2')
                <li class="nav-item">
                  <a href="{{ route('coord.index', Auth::id()) }}" class="nav-link">
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('coord.students-list-page') }}" class="nav-link">
                    <p>
                        Intern List
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('coord.students-reports-page') }}" class="nav-link">
                    <p>
                        Intern Weekly Report
                    </p>
                  </a>
                </li>
              @endif --}}
              <!--student sidebar-->
              @if (Auth::user()->role == '3')
                <li class="nav-item">
                  <a href="{{ route('stud.index', Auth::id()) }}" class="nav-link">
                    <p>
                      Home
                    </p>
                  </a>
                </li>
                @if (Auth::user()->approved == 0 || Auth::user()->approved == 2)
                    <li class="nav-item">
                        {{-- <a href="{{ route('stud.intern-requirement-page') }}" class="nav-link"> --}}
                        <a href="{{ route('stud.updload-resume-page')}}" class="nav-link">
                        <p>
                            Internship Requirements
                            <!-- available only if the student doesn't have an HTE yet -->
                        </p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->approved == 1)
                     <li class="nav-item">
                  <a href="{{ route('stud.weekly-tasks-page', 0) }}" class="nav-link">
                    <p>
                      Weekly Tasks
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('stud.weekly-submission-page') }}" class="nav-link">
                    <p>
                      Weekly Submission
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stud.evaluation-page') }}" class="nav-link">
                      <p>
                        HTE Evaluation
                      </p>
                    </a>
                  </li>
                @endif

              @endif
            </ul>
          <!--end::Sidebar Menu-->
        </nav>
    </div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-cornerless os-scrollbar-unusable os-scrollbar-auto-hide-hidden os-theme-light"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%;"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hide os-scrollbar-handle-interactive os-scrollbar-track-interactive os-scrollbar-visible os-scrollbar-cornerless os-scrollbar-auto-hide-hidden os-theme-light"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 24.843%;"></div></div></div></div>
    <!--end::Sidebar Wrapper-->
  </aside>
