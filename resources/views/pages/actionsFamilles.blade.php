<div id="actionsFamilles">
    <table class="table table-shopping table-center">
        <thead>
        <th>Date</th>
        <th>Qui</th>
        <th>Action</th>
        <th class="text-right">Points</th>
        </thead>
        <tbody>
        @foreach ($actions as $a)

            <tr class="tr-actions" data-date="{!! $a->quand !!}">
                <td class="text-date ">
                    {!! $a->quand !!}
                </td>
                <td>
                    {!! $a->qui !!}
                </td>
                <td class="td-name">
                    {!! $a->quoi !!}
                </td>
                <td class="td-number">
                    {!! $a->points !!} points
                </td>
                <td class="td-famille {!! $a->famille->nom !!}">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('vendor.pagination.custom', ['paginator' => $actions])

</div>