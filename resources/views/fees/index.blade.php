@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="row justify-content-between align-items-center mb-4">
                    <div class="col-md-6">
                        <h4 class="page-title text-center">Fees Detail</h4>
                    </div>

                    <div class="col-md-6 text-end">
                        <a href="{{ route('fees.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Add Fees
                        </a>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Responsive Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead class=" text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Total Amount</th>
                                        <th>Discount</th>
                                        <th>Due Date</th>
                                        <th>Final Price</th>
                                        <th>Due Fees</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($fees as $fee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $fee->classes->name ?? 'N/A' }}</td>
                                            <!-- Assuming a 'class' relationship -->
                                            <td>{{ number_format($fee->total_amount, 2) }}</td>
                                           <td>{{ number_format($fee->discount, 2) }}</td>
                                            <td>{{ $fee->due_date }}</td> <!-- Format the date -->
                                            <td>{{ number_format($fee->final_price, 2) }}</td>
                                            <td>{{ number_format($fee->due_fees, 2) }}</td>
                                            <td>{{ $fee->description }}</td>
                                            <td>
                                                <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('fees.destroy', $fee->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this fee?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">No fees records found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Table Section -->
            </div>
        </div>
    </div>
@endsection
