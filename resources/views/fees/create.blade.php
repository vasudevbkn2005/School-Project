@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title text-center mb-4">Add Fees</h4>
                <a href="{{ route('fees.index') }}" class="btn btn-success mb-4">Go Back</a>

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

                    <!-- Fee Creation Form -->
                    <form action="{{ route('fees.store') }}" method="POST" autocomplete="off">
                        @csrf


                        <!-- Select Class -->
                        <div class="form-group mb-3">
                            <label for="class_id" class="form-label">Class</label>
                            <select name="class_id" id="class_id" class="form-control" required>
                                <option value="" disabled selected>Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Total Amount -->
                        <div class="form-group mb-3">
                            <label for="total_amount" class="form-label">Total Amount</label>
                            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control"
                                placeholder="Enter Total Fee Amount" required>
                        </div>

                        <!-- Discount -->
                        <div class="form-group mb-3">
                            <label for="discount" class="form-label">Discount (if any)</label>
                            <input type="number" step="0.01" name="discount" id="discount" class="form-control"
                                placeholder="Enter Discount Amount (Optional)">
                        </div>

                        <!-- Due Date -->
                        <div class="form-group mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control" required>
                        </div>

                        <!-- Final Price (Read-Only) -->
                        <div class="form-group mb-3">
                            <label for="final_price" class="form-label">Final Price</label>
                            <input type="text" id="final_price"  class="form-control" readonly>
                        </div>

                        <!-- Due Fees (Read-Only) -->
                        <div class="form-group mb-3">
                            <label for="due_fees" class="form-label">Due Fees</label>
                            <input type="text" id="due_fees" name="due_fees" class="form-control" readonly>
                        </div>

                        <!-- Description -->
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"
                                placeholder="Enter Fee Description (Optional)"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Fee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Calculation Script -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
    const totalAmountInput = document.getElementById('total_amount');
    const discountInput = document.getElementById('discount');
    const finalPriceInput = document.getElementById('final_price');
    const dueFeesInput = document.getElementById('due_fees');

    // Calculate final price and due fees
    function calculateFees() {
        const totalAmount = parseFloat(totalAmountInput.value) || 0;
        const discountPercentage = parseFloat(discountInput.value) || 0;
        const discountAmount = (totalAmount * discountPercentage) / 100; // Calculate discount in percentage
        const finalPrice = totalAmount - discountAmount; // Subtract the discount
        finalPriceInput.value = finalPrice.toFixed(2);

        // Assuming no payment has been made, the due fees will be the final price
        dueFeesInput.value = finalPrice.toFixed(2);
    }

    // Event listeners for inputs
    totalAmountInput.addEventListener('input', calculateFees);
    discountInput.addEventListener('input', calculateFees);

    // Initial calculation on page load in case there are already values
    calculateFees();
});
    </script>
@endsection
