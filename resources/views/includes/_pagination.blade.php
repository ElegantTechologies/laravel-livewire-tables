@if ($paginationEnabled)
    <div class="row">
         @if ( $paginationEnabled && $perPageEnabled)
           <div class="col text-right text-muted">
                {{ $perPageLabel }}: &nbsp;

                <select wire:model="perPage" class="form-control rounder mt-2 text-sm">
                    @if (is_array($perPageOptions))
                        @foreach ($perPageOptions as $option)
                            <option>{{ $option }}</option>
                        @endforeach
                    @else
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    @endif
                </select>
            </div>
        @endif

        <div class="col">
            {{ $models->links() }}
        </div>

        <div class="col text-right text-muted">
            {{ __('Showing :first to :last out of :total results', ['first' => $models->count() ? $models->firstItem() : 0, 'last' => $models->count() ? $models->lastItem() : 0, 'total' => $models->total()]) }}
        </div>
    </div>
@endif
