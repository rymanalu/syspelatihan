@can('approve1', App\Pengusulan::class)
    <a class="btn btn-warning"
        href="{{ route('pengusulan.approve', $pengusulan) }}"
        onclick="event.preventDefault();
                 document.getElementById('approve-form-{{ $i }}').submit();">
        Approve
    </a>

    <form id="approve-form-{{ $i }}" action="{{ route('pengusulan.approve', $pengusulan) }}" method="POST" style="display: none;">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
    </form>
@endcan
