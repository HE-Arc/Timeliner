<!-- Notification -->
@if (session('success'))
    <div class="alert alert-success">
            {{ session('success') }}
    </div>
@elseif (session('info'))
    <div class="alert alert-info">
            {{ session('info') }}
    </div>
@elseif($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif