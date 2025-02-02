<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar-admin activePage="notifications"></x-navbars.sidebar-admin>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Notifications"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Notifications</h5>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <div class="alert alert-primary alert-dismissible text-white" role="alert">
                                <span class="text-sm">A simple primary alert with <a href="javascript:;"
                                        class="alert-link text-white">an example link</a>. Give it a click if you
                                    like.</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-secondary alert-dismissible text-white" role="alert">
                                <span class="text-sm">A simple secondary alert with <a href="javascript:;"
                                        class="alert-link text-white">an example link</a>. Give it a click if you
                                    like.</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">A simple success alert with <a href="javascript:;"
                                        class="alert-link text-white">an example link</a>. Give it a click if you
                                    like.</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">A simple danger alert with <a href="javascript:;"
                                        class="alert-link text-white">an example link</a>. Give it a click if you
                                    like.</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-warning alert-dismissible text-white" role="alert">
                                <span class="text-sm">A simple warning alert with <a href="javascript:;"
                                        class="alert-link text-white">an example link</a>. Give it a click if you
                                    like.</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-info alert-dismissible text-white" role="alert">
                                <span class="text-sm">A simple info alert with <a href="javascript:;"
                                        class="alert-link text-white">an example link</a>. Give it a click if you
                                    like.</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-light alert-dismissible text-white" role="alert">
                                <span class="text-sm">A simple light alert with <a href="javascript:;"
                                        class="alert-link text-white">an example link</a>. Give it a click if you
                                    like.</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="alert alert-dark alert-dismissible text-white" role="alert">
                                <span class="text-sm">A simple dark alert with <a href="javascript:;"
                                        class="alert-link text-white">an example link</a>. Give it a click if you
                                    like.</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header p-3">
                            <h5 class="mb-0">Notifications</h5>
                            <p class="text-sm mb-0">
                                Notifications on this page use Toasts from Bootstrap. Read more details <a
                                    href="https://getbootstrap.com/docs/5.0/components/toasts/" target="
          ">here</a>.
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="button"
                                        data-target="successToast">Success</button>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                                    <button class="btn bg-gradient-info w-100 mb-0 toast-btn" type="button"
                                        data-target="infoToast">Info</button>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                                    <button class="btn bg-gradient-warning w-100 mb-0 toast-btn" type="button"
                                        data-target="warningToast">Warning</button>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                                    <button class="btn bg-gradient-danger w-100 mb-0 toast-btn" type="button"
                                        data-target="dangerToast">Danger</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
                
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
