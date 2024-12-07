@extends('design.index')

@section('content')
<style>
    .student_section {
        padding: 60px 0;
        background-color: #f9f9f9;
    }

    .student_heading_container h2 {
        font-size: 36px;
        color: #333;
        font-weight: bold;
        text-align: center;
    }

    .student_card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
        padding: 20px;
        cursor: pointer;
    }

    .student_card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .student_img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 4px solid #007bff;
        margin-bottom: 15px;
    }

    .student_info h4 {
        font-size: 20px;
        color: #222;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .student_info h5 {
        font-size: 16px;
        color: #007bff;
        font-style: italic;
        margin-bottom: 10px;
    }

    .student_info p {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    .student_card_detail {
        margin-top: 20px;
        text-align: center;
    }

    .student_detail_button {
        background: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        transition: background 0.3s;
    }

    .student_detail_button:hover {
        background: #0056b3;
    }
</style>

<section class="student_section">
    <div class="container">
        <div class="student_heading_container">
            <h2>Meet Our Topper Student</h2>
        </div>
        <div class="row">
            @foreach ($student as $s)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="student_card">
                        <img src="{{ asset('storage/' . $s->image) }}" class="student_img" alt="{{ $s->name }}">
                        <div class="student_info">
                            <h4>{{ $s->name }}</h4>
                            <h5>{{ $s->course }}</h5>
                            <p>{{ $s->address }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
