@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center">Update Class Details</h4>
                <a href="{{ route('classes.index') }}" class="btn btn-success mb-3">Go Back</a>

                <div class="container">
                    <!-- Update Class Form -->
                    <form action="{{ route('classes.update', $classes->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Class Name -->
                        <div class="form-group">
                            <label for="name">Class Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $classes->name }}" placeholder="Enter Class Name" required>
                        </div>

                        <!-- Sections -->
                        <div class="form-group mt-3">
                            <label>Sections</label>
                            <div id="sections-container">
                                <!-- Existing sections for this class -->
                                @foreach ($sections as $section)
                                    <div class="input-group section-item mb-2">
                                        <input type="hidden" name="existing_sections[{{ $section->id }}][id]" value="{{ $section->id }}">
                                        <input type="text" class="form-control"
                                               name="existing_sections[{{ $section->id }}][name]"
                                               value="{{ $section->name }}"
                                               placeholder="Enter Section Name">
                                        <button type="button" class="btn btn-danger remove-section" data-id="{{ $section->id }}">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" id="add-section" class="btn btn-secondary mt-2">Add More</button>
                        </div>

                        <!-- Hidden input field to track removed sections -->
                        <input type="hidden" id="removed-sections" name="removed_sections" value="">

                        <button type="submit" class="btn btn-primary mt-3">Update Class</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- JavaScript for Adding and Removing Sections -->
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('sections-container');
            const addSectionButton = document.getElementById('add-section');
            const removedSectionsInput = document.getElementById('removed-sections');

            // Add a new section
            addSectionButton.addEventListener('click', function() {
                const sectionDiv = document.createElement('div');
                sectionDiv.classList.add('input-group', 'section-item', 'mb-2');
                sectionDiv.innerHTML = `
                    <input type="text" class="form-control" name="new_sections[]" placeholder="Enter New Section Name">
                    <button type="button" class="btn btn-danger remove-section">Remove</button>
                `;
                container.appendChild(sectionDiv);
            });

            // Remove a section (delegated event)
            container.addEventListener('click', function(event) {
                if (event.target && event.target.classList.contains('remove-section')) {
                    const sectionItem = event.target.closest('.section-item');
                    const sectionId = event.target.getAttribute('data-id');

                    // Add section ID to removedSectionsInput if it exists
                    if (sectionId) {
                        const removedSections = removedSectionsInput.value.split(',').filter(Boolean);
                        removedSections.push(sectionId);
                        removedSectionsInput.value = removedSections.join(',');
                    }

                    // Remove the section element
                    if (sectionItem) {
                        sectionItem.remove();
                    }
                }
            });
        });
    </script>
@endpush
