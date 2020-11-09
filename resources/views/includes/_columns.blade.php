@if($checkbox && $checkboxLocation === 'left')
    @include('laravel-livewire-tables::includes._checkbox-all')
@endif

@foreach($columns as $column)
    <th
        class="{{ $this->setTableHeadClass($column->attribute) }}"
        id="{{ $this->setTableHeadId($column->attribute) }}"
        @foreach ($this->setTableHeadAttributes($column->attribute) as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
    >
        @if($column->sortable)
            <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')">
                {{ $column->text }}

                @if ($sortField !== $column->attribute)
                    <i class="text-muted fas fa-sort"></i>
                @elseif ($sortDirection === 'asc')
                    <i class="fas fa-sort-up"></i>
                @else
                    <i class="fas fa-sort-down"></i>
                @endif
            </span>
        @else
            {{ $column->text }}
            {{--            @if($column->centered)--}}
            {{--            IS CENTERED!.  But, how to extend so that it honors 'centered'  seems like a good thing.--}}
            {{--                I spent a bit trying to track down wehre, like, 'sortable'. Found in vendor/rappasoft/laravel-livewire-tables/src/Views/Column.php --}}
            {{--                 For, now, we'll handle in in our Theme class.
                                see:  --}}
            {{--            @else--}}
            {{--                nothing--}}
            {{--            @endif--}}
        @endif
    </th>
@endforeach

@if($checkbox && $checkboxLocation === 'right')
    @include('laravel-livewire-tables::includes._checkbox-all')
@endif
