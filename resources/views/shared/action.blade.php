<a class="btn btn-success"
    href="{{ $editUrl }}">
    Ubah
</a>
<a class="btn btn-danger"
    href="{{ $deleteUrl }}"
    onclick="event.preventDefault();
             confirm('Hapus?')
             ? document.getElementById('delete-form').submit()
             : '';">
    Hapus
</a>

<form id="delete-form" action="{{ $deleteUrl }}" method="POST" style="display: none;">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>
