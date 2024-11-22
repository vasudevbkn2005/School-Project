@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center mb-4">Add Classes</h4>
                <a href="{{ route('classes.index') }}" class="btn btn-success mb-4">Go Back</a>

                <div class="card shadow-sm p-4">
                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Add class form -->
                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf

                        <!-- Class Name -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Class Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Class Name"
                                name="name" required>
                        </div>

                        <!-- Dynamic Sections -->
                        <div id="sections-container" class="mb-3">
                            <label for="section" class="form-label">Sections</label>
                            <div class="input-group mb-2 section-item">
                                <input type="text" class="form-control" name="sections[]" placeholder="Enter Section Name" 
                                    required>
                                <button type="button" id="add-section" class="btn btn-secondary">Add Section</button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Class</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to add and remove sections -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('sections-container');
            const addSectionButton = document.getElementById('add-section');

            // Add new section
            addSectionButton.addEventListener('click', function () {
                const sectionCount = container.getElementsByClassName('section-item').length + 1;

                const sectionDiv = document.createElement('div');
                sectionDiv.classList.add('input-group', 'mb-2', 'section-item');
                sectionDiv.innerHTML = `
                    <input type="text" class="form-control" name="sections[]" placeholder="Enter Section Name" required>
                    <button type="button" class="btn btn-danger remove-section">Remove</button>
                `;
                container.appendChild(sectionDiv);
            });

            // Remove section dynamically
            container.addEventListener('click', function (event) {
                if (event.target && event.target.classList.contains('remove-section')) {
                    const sectionItem = event.target.closest('.section-item');
                    if (sectionItem) {
                        sectionItem.remove();
                    }
                }
            });
        });
    </script>
@endsection
