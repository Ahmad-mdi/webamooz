@if (session('success'))
    <div class="text-success">{{session()->get('success')}}</div>
@endif

@if (session('delete'))
    <div class="text-warning">{{session()->get('delete')}}</div>
@endif
