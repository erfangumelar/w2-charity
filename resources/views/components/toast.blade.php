@push('scripts')
    @if (session()->has('success'))
    <script>
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Success',
            autohide: true,
            delay: 3000,               
            body: '{{ session('message') }}'
        })

    </script>
    @elseif (session()->has('erros'))
    <script>
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Error',
            autohide: true,
            delay: 3000,  
            body: '{{ session('message') }}'
        })
    </script>
    @endif
@endpush

