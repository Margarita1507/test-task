<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <h1>Win amount = {{$win->win_amount}} </h1>
    <a href="{{route('win.lucky', [$user->link_id, $win->id])}}" type="button" class="btn btn-warning">Imfeelinglucky</a>
    @if($win->last_random_value % 2 == 0)
        {{$win->last_random_value}}
        WIN!!!!
    @else
        LOSE...
    @endif
    <a href="{{route('win.history', [$user->link_id, $win->id])}}" type="button" class="btn btn-success">History</a>
    @foreach($win->win_history as $win)
    {{$win}}
    @endforeach
    <form action="{{route('link.update', $user->link_id)}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Create new link</button>
    </form>
    <form action="{{route('link.delete', $user->link_id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Deactivate link</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
