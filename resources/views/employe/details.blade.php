<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar-admin activePage="employe-details"></x-navbars.sidebar-admin>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Détails Employé"></x-navbars.navs.auth>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Détails de {{ $employe->nom }}</h5>
                </div>
                <div class="card-body">
                    <!-- Navbar Horizontale -->
                    <nav class="mb-4">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active bg-primary text-white" href="#informations">Informations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#conges">Congés</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#documents">Documents</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Sections -->
                    <div id="informations" class="mt-4">
                        <h6 class="text-primary mb-4">Informations Personnelles</h6>
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Première colonne -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label d-flex align-items-center">
                                                <i class="fas fa-user me-2 text-primary"></i>
                                                <strong class="text-dark">Nom:</strong>
                                            </label>
                                            <div class="border p-2 text-dark">
                                                {{ $employe->nom }}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label d-flex align-items-center">
                                                <i class="fas fa-envelope me-2 text-primary"></i>
                                                <strong class="text-dark">Email:</strong>
                                            </label>
                                            <div class="border p-2 text-dark">
                                                {{ $employe->email }}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label d-flex align-items-center">
                                                <i class="fas fa-user-tag me-2 text-primary"></i>
                                                <strong class="text-dark">Rôle:</strong>
                                            </label>
                                            <div class="border p-2 text-dark">
                                                {{ $employe->role }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Deuxième colonne -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label d-flex align-items-center">
                                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                                <strong class="text-dark">Date D'embauche:</strong>
                                            </label>
                                            <div class="border p-2 text-dark">
                                                {{ \Illuminate\Support\Carbon::parse($employe->date_embauche)->format('d/m/Y') }}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label d-flex align-items-center">
                                                <i class="fas fa-briefcase me-2 text-primary"></i>
                                                <strong class="text-dark">Poste:</strong>
                                            </label>
                                            <div class="border p-2 text-dark">
                                                {{ $employe->poste }}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label d-flex align-items-center">
                                                <i class="fas fa-home me-2 text-primary"></i>
                                                <strong class="text-dark">Adresse:</strong>
                                            </label>
                                            <div class="border p-2 text-dark">
                                                {{ $employe->adresse }}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label d-flex align-items-center">
                                                <i class="fas fa-birthday-cake me-2 text-primary"></i>
                                                <strong class="text-dark">Date De Naissance:</strong>
                                            </label>
                                            <div class="border p-2 text-dark">
                                                {{ \Illuminate\Support\Carbon::parse($employe->date_naissance)->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <style>
                        .border {
                            border: 1px solid #dcdcdc;
                            /* Couleur de la bordure */
                            border-radius: 4px;
                            /* Coins arrondis */
                        }

                        .text-dark {
                            color: #343a40;
                            /* Couleur noire */
                        }


                        .text-primary {
                            color: #007bff;
                            /* Couleur bleue */
                        }
                    </style>

                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </main>
</x-layout>
