<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar-admin activePage="documents"></x-navbars.sidebar-admin>

    <main class="main-content position-relative max-height-vh-100 h-100">
        <x-navbars.navs.auth titlePage="Documents"></x-navbars.navs.auth>

        <div class="container-fluid py-4">
            <!-- Section pour l'importation des documents -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="border-0 p-4 bg-white"> <!-- Conteneur simplifié sans carte -->
                        <h5 class="mb-3 text-primary">Importer un document</h5> <!-- Titre plus simple -->

                        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="document" class="form-label">Fichier</label>
                                <input type="file" id="document" name="document" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom du document</label>
                                <input type="text" id="nom" name="nom" class="form-control"
                                    placeholder="Nom du document" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Importer</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Liste des documents importés -->
            <ul class="list-group">
                @foreach ($documents as $document)
                    <li
                        class="list-group-item border-0 d-flex justify-content-between align-items-center mb-2 border-radius-lg shadow-sm">
                        <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark font-weight-bold text-sm">{{ $document->nom }}</h6>
                        </div>
                        <div class="d-flex align-items-center text-sm">
                            <!-- Lien pour télécharger le document -->
                            <a href="{{ route('documents.show', ['filename' => basename($document->chemin)]) }}"
                                class="btn btn-link text-dark text-sm mb-0 px-0 ms-4" target="_blank">
                                <i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> Télécharger
                            </a>
                            <!-- Lien pour supprimer le document -->
                            <a href="{{ route('documents.destroy', $document->id) }}"
                                class="btn btn-link text-danger text-gradient px-3 mb-0"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $document->id }}').submit();">
                                <i class="material-icons text-sm me-2">delete</i> Supprimer
                            </a>
                            <!-- Formulaire caché pour la suppression du document -->
                            <form id="delete-form-{{ $document->id }}"
                                action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <x-footers.auth></x-footers.auth>
    </main>

    <x-plugins></x-plugins>
</x-layout>
