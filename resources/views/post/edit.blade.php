<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body style="background: lightgray">
<nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                @if ( auth()->user()->role  == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('account') }}">Account</a>
                </li>
                @endif
                @if ( auth()->user()->role  == 'author')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('post') }}">Post</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('signout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('post.update', $post->idpost) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}">
                                <!-- error message untuk title -->
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Konten</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5">{{ old('content', $post->content) }}</textarea>

                                <!-- error message untuk content -->
                                @error('content')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Date</label>
                                <input type="text" id="datetimepicker" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $post->date) }}">
                                <!-- error message untuk title -->
                                @error('date')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Username</label>
                                <select name="username" id="username" class="form-control @error('username') is-invalid @enderror">
                                    @forelse ($username as $u)
                                    <option value="{{$u->username}}">{{$u->username}}</option>
                                    @empty
                                    <option value="">Tidak Ada User</option>
                                    @endforelse
                                </select>
                                <!-- error message untuk title -->
                                @error('username')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#datetimepicker", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
</body>

</html>