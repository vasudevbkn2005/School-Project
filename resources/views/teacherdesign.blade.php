@extends('design.index')

@section('content')
<style>
    .teacher_section {
        padding: 60px 0;
        background-color: #f9f9f9;
    }

    .heading_container h2 {
        font-size: 36px;
        color: #333;
        font-weight: bold;
    }

    .heading_container p {
        font-size: 18px;
        color: #666;
        margin-top: 10px;
    }

    .teacher_card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
        padding: 20px;
        cursor: pointer;
    }

    .teacher_card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .teacher_img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 4px solid #007bff;
        margin-bottom: 15px;
    }

    .teacher_info h4 {
        font-size: 20px;
        color: #222;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .teacher_info h5 {
        font-size: 16px;
        color: #007bff;
        font-style: italic;
        margin-bottom: 10px;
    }

    .teacher_info p {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }
</style>

<section class="teacher_section">
    <div class="container">
        <div class="heading_container text-center mb-5">
            <h2>Meet Our Teachers</h2>
        </div>
        <p><strong>Our dedicated educators are committed to providing the best learning experience.</strong></p>
        <div class="row">
            @foreach ($teacher as $info)
                <!-- Teacher Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="teacher_card" onclick="teacher({{ $info['id'] }})">
                        <img src="{{ asset('storage/' . $info->image) }}" class="teacher_img" alt="{{ $info['name'] }}">
                        <div class="teacher_info">
                            <h4>{{ $info['name'] }}</h4>
                            <h5>{{ $info->subject['name'] }}</h5>
                            <p>{{ $info['qualification'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    function teacher(teacherId) {
        // Redirect to the teacher's detail page
        window.location.href = `/teacherdetail/${teacherId}`;
    }
</script>
@endsection
