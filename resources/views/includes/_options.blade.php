
@if ($paginationEnabled || $searchEnabled)
    <section class="p-2 bg-{{config('tallandsassy_themehints.baseSectionColor')}}-100 rounded mb-2  ">
        {{--        ^ This is, perhaps, the start of a standard search box, like we had in the People mockup--}}
            {{--        <div class="container mx-auto py-2  align-justify">--}}
            {{--            <nav class="Seasons flex mb-2">--}}
            {{--                <div class="mr-2 pt-2 font-large font-bold w-16">Search</div>--}}
            {{--                <input class="ml-1 w-full h-12 px-3 rounded  focus:outline-none focus:shadow-outline text-xl  shadow-sm"--}}
            {{--                       type="search" placeholder="Search...">--}}
            {{--            </nav>--}}

        <div class="row  pt-2">


            @if ($searchEnabled)
                {{--            I think this is reloaded on search 7/23/20, and thus loosing focus.  We don't want that.--}}
                <nav class=" flex mb-2">
                    <div class="mr-2 pt-2 font-large font-bold w-16">Search</div>
                    <input
                        @if (is_numeric($searchDebounce)) wire:model.debounce.{{ $searchDebounce }}ms="search" @endif
                        @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                        class="ml-1 w-full h-12 px-3 rounded  focus:outline-none focus:shadow-outline text-xl  shadow-sm"
                        type="text"
                        placeholder="{{ $searchLabel }}">
                </nav>

            @endif

            {{-- Choose # of resutls - we put it at the bottom. See 'pagination'       --}}
            @if (0 && $paginationEnabled && $perPageEnabled)
                <div class="col form-inline"> WIP - Should be at bottom
                {{ $perPageLabel }}: &nbsp;

                    <select wire:model="perPage" class="form-control">
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
            </div>
    </section>
@endif
