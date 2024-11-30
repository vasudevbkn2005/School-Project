@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center">Student List</h4>
                <a href="{{ route('student.create') }}" class="btn btn-success mb-3">Add Student</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>S.no</th>
                                <th>Student Name</th>
                                <th>Image</th>
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Date Of Birth</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Enrollment Number</th>
                                <th>Admission Number</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Fees Detail</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $info)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>
                                        @if ($info->image)
                                            <img src="{{ asset('storage/' . $info->image) }}" alt="Student Image"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $info->father_name }}</td>
                                    <td>{{ $info->mother_name }}</td>
                                    <td>{{ $info->email }}</td>
                                    <td>{{ $info->mobile }}</td>
                                    <td>{{ $info->dob }}</td>
                                    <td>{{ $info->address }}</td>
                                    <td>{{ $info->gender }}</td>
                                    <td>{{ $info->enrollment_number }}</td>
                                    <td>{{ $info->admission_date }}</td>
                                    <td>{{ $info->class->name }}</td>
                                    <td>{{ $info->section->name }}</td>
                                    <td>
                                        <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-primary fees-button" data-bs-toggle="modal"
                                            data-bs-target="#feesModal" data-student-id="{{ $info->id }}"
                                            data-student-name="{{ $info->name }}"
                                            data-class-name="{{ $info->class->name }}"
                                            data-section-name="{{ $info->section->name }}"
                                            data-class-id="{{ $info->class->id }}">
                                            Fees
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('student.edit', $info->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('student.destroy', $info->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this student?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Fees Modal -->
    <div class="modal fade" id="feesModal" tabindex="-1" aria-labelledby="feesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feesModalLabel">Fees Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fees.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <a href="{{route('fees.index')}}" class="btn btn-success">Fees Change</a>
                        <!-- Student Name -->
                        <div class="form-group mb-3">
                            <label for="modal_student_name" class="form-label">Student</label>
                            <input type="text" id="modal_student_name" class="form-control" readonly>
                            <input type="hidden" name="student_id" id="modal_student_id">
                        </div>

                        <!-- Class -->
                        <div class="form-group mb-3">
                            <label for="modal_class_name" class="form-label">Class</label>
                            <input type="text" id="modal_class_name" class="form-control" readonly>
                        </div>

                        <!-- Section -->
                        <div class="form-group mb-3">
                            <label for="modal_section_name" class="form-label">Section</label>
                            <input type="text" id="modal_section_name" class="form-control" readonly>
                        </div>

                        <!-- Total Amount -->
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" readonly name="total_amount" id="total_amount" class="form-control" required>
                        </div>

                        <!-- Discount (Readonly) -->
                        <div class="form-group">
                            <label for="discount">Discount (%)</label>
                            <input type="number" name="discount" id="discount" class="form-control" readonly>
                        </div>

                        <!-- Due Date (Readonly) -->
                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control" readonly>
                        </div>

                        <!-- Final Price (Readonly) -->
                        <div class="form-group">
                            <label for="final_price">Final Price</label>
                            <input type="number" name="final_price" id="final_price" class="form-control" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const feesButtons = document.querySelectorAll('.fees-button');
            const totalAmountInput = document.getElementById('total_amount');
            const discountInput = document.getElementById('discount');
            const finalPriceInput = document.getElementById('final_price');
            const dueDateInput = document.getElementById('due_date');

            feesButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const studentId = this.getAttribute('data-student-id');
                    const studentName = this.getAttribute('data-student-name');
                    const className = this.getAttribute('data-class-name');
                    const sectionName = this.getAttribute('data-section-name');
                    const classId = this.getAttribute('data-class-id');

                    // Set Student, Class, Section information
                    document.getElementById('modal_student_id').value = studentId;
                    document.getElementById('modal_student_name').value = studentName;
                    document.getElementById('modal_class_name').value = className;
                    document.getElementById('modal_section_name').value = sectionName;

                    // Clear previous values
                    discountInput.value = '';
                    finalPriceInput.value = '';
                    totalAmountInput.value = '';
                    dueDateInput.value = '';

                    // Make an AJAX call to get fees for the selected class
                    fetch(`/fees/get-fees/${classId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                totalAmountInput.value = data.fee.total_amount;
                                discountInput.value = data.fee.discount;
                                finalPriceInput.value = data.fee.final_price;
                                dueDateInput.value = data.fee.due_date;
                            } else {
                                totalAmountInput.value = '';
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching fees data:", error);
                        });
                });
            });

            function calculateFinalPrice() {
                const totalAmount = parseFloat(totalAmountInput.value) || 0;
                const discount = parseFloat(discountInput.value) || 0;
                const discountAmount = (totalAmount * discount) / 100;
                const finalPrice = totalAmount - discountAmount;
                finalPriceInput.value = finalPrice.toFixed(2);
            }

            totalAmountInput.addEventListener('input', calculateFinalPrice);
            discountInput.addEventListener('input', calculateFinalPrice);
        });
    </script>
@endsection
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
{{-- discount and finalprice or date all --}}