<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="spectacles-table">
            <thead>
            <tr>
                <th>Salle Id</th>
                <th>Piece Id</th>
                <th>Datespectacle</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($spectacles as $spectacle)
                <tr>
                    <td>{{ $spectacle->salle_id }}</td>
                    <td>{{ $spectacle->piece_id }}</td>
                    <td>{{ $spectacle->datespectacle }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['spectacles.destroy', $spectacle->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('spectacles.show', [$spectacle->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('spectacles.edit', [$spectacle->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $spectacles])
        </div>
    </div>
</div>
