<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title' , 'unKnow' )</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .toast {
          position: fixed;
          top: 20px;
          right: 40px;
          z-index: 1050;
          opacity: 0.9;
        }
                 .hover-underline {
                    display: inline-block;
                    position: relative;
                    font-size: 24px;
                    font-weight: bold;
                    color: #333;
                    text-decoration: none;
                }

                .hover-underline::after {
                    content: "";
                    position: absolute;
                    left: 0;
                    bottom: -5px; /* Distance from the text */
                    width: 100%;
                    height: 3px;
                    background-color: #3498db;
                    transform: scaleX(0);
                    transform-origin: right;
                    transition: transform 0.3s ease-out;
                }

                .hover-underline:hover::after {
                    transform: scaleX(1);
                    transform-origin: left;
                }


      </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid p-4">
            <a class="navbar-brand fw-bold fs-3" href="#">Student Managment System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    {{-- <a class="nav-link active fs-6  fw-semibold" aria-current="page" href="{{ route('posts.index') }}">All Posts</a> --}}
                    <a  class="nav-link active fs-6 fw-bold hover-underline"  aria-current="page" href="{{ route('students.index') }}">
                        <i class="fa-solid fa-person"></i> Students</a>
                    <a  class="nav-link  fs-6 fw-bold hover-underline" aria-current="page" href="{{ route('teachers.index') }}">
                        <i class="fa-solid fa-chalkboard-user"></i> Instractors</a>
                    <a  class="nav-link  fs-6 fw-bold hover-underline" aria-current="page" href="{{ route('courses.index') }}">
                        <i class="fa-solid fa-book-open-reader"></i> Courses</a>
                    <a  class="nav-link  fs-6 fw-bold hover-underline" aria-current="page" href="{{ route('batches.index') }}">
                        <i class="fa-solid fa-people-group"></i> Batches</a>
                    <a  class="nav-link  fs-6 fw-bold hover-underline" aria-current="page" href="{{ route('enrollments.index') }}">
                        <i class="fa-solid fa-pen"></i> Enrollments</a>
                    <a  class="nav-link  fs-6 fw-bold hover-underline" aria-current="page" href="{{ route('payments.index') }}">
                        <i class="fa-solid fa-money-check-dollar"></i> Payments</a>

                </div>
            </div>
        </div>
    </nav>
    {{-- Toast After Add New Student  --}}
    @if(session('success'))
    <div class="toast p-2 show align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body fs-32 fw-bold">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif
    {{-- Toast After Delete Student  --}}
    @if(session('delete'))
    <div class="toast p-2 show align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body fs-32 fw-bold">
                {{ session('delete') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif


<div class="container mt-2">
    @yield('content')

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
