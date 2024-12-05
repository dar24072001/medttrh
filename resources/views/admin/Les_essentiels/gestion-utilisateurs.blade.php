<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-navbars.sidebar-admin activePage="gestion-utilisateurs"></x-navbars.sidebar-admin>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Gestion Utilisateurs"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <!-- Success Alert for Adding User -->
            <div id="add-success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                style="display: none; position: fixed; top: 1rem; right: 1rem; z-index: 1050;">
                <strong>Succès !</strong> <span id="add-success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- End Success Alert -->


            <!-- Success Alert for Editing User -->
            <div id="edit-success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                style="display: none; position: fixed; top: 1rem; right: 1rem; z-index: 1050;">
                <strong>Succès !</strong> <span id="edit-success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>


            <!-- Success Alert for Deleting User -->
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                style="display: none; position: fixed; top: 1rem; right: 1rem; z-index: 1050;">
                <strong>Succès !</strong> <span id="success-message"></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- End Success Alert -->

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header">
                            <h5 class="card-title">Liste des Utilisateurs</h5>
                            <div class="text-end">
                                <a class="btn btn-primary" href="javascript:;" id="addUserButton" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal">
                                    <i class="material-icons text-sm">add</i>&nbsp;Ajouter Utilisateur
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Rôle</th>
                                            <th>Date d'embauche</th>
                                            <th>Poste</th>
                                            <th>Adresse</th>
                                            <th>Date de naissance</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('employe.details', $user->id) }}">{{ $user->nom }}
                                                    </a>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ \Illuminate\Support\Carbon::parse($user->date_embauche)->format('d/m/Y') }}
                                                </td>
                                                <td>{{ $user->poste }}</td>
                                                <td>{{ $user->adresse }}</td>
                                                <td>{{ \Illuminate\Support\Carbon::parse($user->date_naissance)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm edit-user" href="javascript:;"
                                                        data-id="{{ $user->id }}">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm delete-user"
                                                        data-id="{{ $user->id }}">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <!-- Contenu du modal ici -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Ajouter Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Container -->
                    <form id="addUserForm">
                        <div class="mb-3 border p-3 rounded">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nom de l'utilisateur" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Adresse email" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="role" class="form-label">Rôle</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" disabled selected>Choisir un rôle</option>
                                <option value="Administrateur">Administrateur</option>
                                <option value="Utilisateur">Utilisateur</option>
                            </select>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="mot_passe" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="mot_passe" name="mot_passe"
                                placeholder="Mot de passe" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="date_embauche" class="form-label">Date d'embauche</label>
                            <input type="date" class="form-control" id="date_embauche" name="date_embauche"
                                required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="poste" class="form-label">Poste</label>
                            <input type="text" class="form-control" id="poste" name="poste"
                                placeholder="Poste de l'utilisateur" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                placeholder="Adresse de l'utilisateur" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="date_naissance" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                                required>
                        </div>
                    </form>
                    <!-- End Form Container -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="saveUserButton">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Modifier Utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Container -->
                    <form id="editUserForm">
                        <div class="mb-3 border p-3 rounded">
                            <label for="edit_name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="edit_name" name="name"
                                placeholder="Nom de l'utilisateur" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email"
                                placeholder="Adresse email" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="edit_role" class="form-label">Rôle</label>
                            <select class="form-select" id="edit_role" name="role" required>
                                <option value="" disabled selected>Choisir un rôle</option>
                                <option value="Administrateur">Administrateur</option>
                                <option value="Utilisateur">Utilisateur</option>
                            </select>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="edit_mot_passe" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="edit_mot_passe" name="mot_passe"
                                placeholder="Mot de passe" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="edit_date_embauche" class="form-label">Date d'embauche</label>
                            <input type="date" class="form-control" id="edit_date_embauche" name="date_embauche"
                                required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="edit_poste" class="form-label">Poste</label>
                            <input type="text" class="form-control" id="edit_poste" name="poste"
                                placeholder="Poste de l'utilisateur" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="edit_adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="edit_adresse" name="adresse"
                                placeholder="Adresse de l'utilisateur" required>
                        </div>
                        <div class="mb-3 border p-3 rounded">
                            <label for="edit_date_naissance" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="edit_date_naissance"
                                name="date_naissance" required>
                        </div>
                    </form>
                    <!-- End Form Container -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="updateUserButton">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit User Modal -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Gestion de l'ajout d'utilisateur
            $('#saveUserButton').click(function() {
                var formData = $('#addUserForm').serialize();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('add-user') }}',
                    data: formData,
                    success: function(response) {
                        $('#add-success-message').text(response.success);
                        $('#add-success-alert').show();
                        $('#addUserModal').modal('hide');
                        $('#addUserForm')[0].reset();
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Une erreur est survenue lors de l\'ajout de l\'utilisateur.');
                    }
                });
            });

            // Configuration AJAX CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Gestion de la modification d'utilisateur
            $('.edit-user').on('click', function() {
                var userId = $(this).data('id');

                $.ajax({
                    url: '/users/' + userId + '/edit',
                    type: 'GET',
                    success: function(response) {
                        var user = response.user;
                        $('#editUserModal #edit_name').val(user.nom);
                        $('#editUserModal #edit_email').val(user.email);
                        $('#editUserModal #edit_role').val(user.role);
                        $('#editUserModal #edit_mot_passe').val(user.mot_passe);
                        $('#editUserModal #edit_date_embauche').val(user.date_embauche);
                        $('#editUserModal #edit_poste').val(user.poste);
                        $('#editUserModal #edit_adresse').val(user.adresse);
                        $('#editUserModal #edit_date_naissance').val(user.date_naissance);
                        $('#editUserModal').modal('show');
                        $('#updateUserButton').data('id', userId);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // Mise à jour de l'utilisateur
            $('#updateUserButton').on('click', function() {
                var userId = $(this).data('id');
                var formData = {
                    nom: $('#edit_name').val(),
                    email: $('#edit_email').val(),
                    role: $('#edit_role').val(),
                    mot_passe: $('#edit_mot_passe').val(),
                    date_embauche: $('#edit_date_embauche').val(),
                    poste: $('#edit_poste').val(),
                    adresse: $('#edit_adresse').val(),
                    date_naissance: $('#edit_date_naissance').val(),
                };

                $.ajax({
                    url: '/users/' + userId,
                    type: 'PUT',
                    data: formData,
                    success: function(response) {
                        $('#edit-success-message').text(response.message);
                        $('#edit-success-alert').show();
                        $('#editUserModal').modal('hide');
                        location
                            .reload(); // Cette ligne recharge la page, ce qui peut masquer le message de succès.
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // Suppression de l'utilisateur
            $('.delete-user').on('click', function() {
                var userId = $(this).data('id');

                if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                    $.ajax({
                        url: '/users/' + userId,
                        type: 'DELETE',
                        success: function(response) {
                            $('#delete-success-message').text(response.message);
                            $('#delete-success-alert').show();
                            location.reload();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

</x-layout>
