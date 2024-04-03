<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="pieces-table">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Flyer</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pieces as $piece)
                <tr>
                    <td>{{ $piece->titre }}</td>
                    <td>{{ $piece->flyer }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['pieces.destroy', $piece->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('pieces.show', [$piece->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('pieces.edit', [$piece->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $pieces])
        </div>
    </div>
</div>
