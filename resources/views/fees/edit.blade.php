@extends('Admin.header')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h4 class="page-title">Edit Fee</h4>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('fees.update', $fees->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Class Dropdown -->
                            <div class="form-group">
                                <label for="class_id">Class</label>
                                <select name="class_id" id="class_id" class="form-control" required>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ $class->id == $fees->class_id ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Total Amount -->
                            <div class="form-group">
                                <label for="total_amount">Total Amount</label>
                                <input type="number" name="total_amount" id="total_amount" class="form-control"
                                    value="{{ $fees->total_amount }}" required>
                            </div>

                            <!-- Discount -->
                            <div class="form-group">
                                <label for="discount">Discount (Amount)</label>
                                <input type="number" name="discount" id="discount" class="form-control"
                                    value="{{ $fees->discount }}" required>
                            </div>
                            <!-- Final Price -->
                            <div class="form-group">
                                <label for="final_price">Final Price</label>
                                <input type="number" name="final_price" id="final_price" class="form-control"
                                    value="{{ $fees->final_price }}" readonly>
                            </div>

                            <!-- Due Date -->
                            <div class="form-group">
                                <label for="due_date">Due Date</label>
                                <input type="date" name="due_date" id="due_date" class="form-control"
                                    value="{{ $fees->due_date }}" required>
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ $fees->description }}</textarea>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <button type="submit" class="btn btn-primary">Update Fee</button>
                            <a href="{{ route('fees.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const totalAmountInput = document.getElementById('total_amount');
        const discountInput = document.getElementById('discount');
        const finalPriceInput = document.getElementById('final_price');

        function calculateFinalPrice() {
            const totalAmount = parseFloat(totalAmountInput.value) || 0;
            const discount = parseFloat(discountInput.value) || 0;
            const finalPrice = totalAmount - discount;
            finalPriceInput.value = finalPrice.toFixed(2);
        }

        totalAmountInput.addEventListener('input', calculateFinalPrice);
        discountInput.addEventListener('input', calculateFinalPrice);
    });
</script>
