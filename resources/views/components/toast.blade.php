@if (session()->has('success'))
<script>
    $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Success',
        autohide: true,               
        body: '{{ session('message') }}'
    })

</script>
@elseif (session()->has('error'))
<script>
     $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error',
        autohide: true,
        body: '{{ session('message') }}'
    })
</script>
@endif
