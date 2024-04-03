<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="salles-table">
            <thead>
            <tr>
                <th>Libelle</th>
                <th>Adresse</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($salles as $salle)
                <tr>
                    <td>{{ $salle->libelle }}</td>
                    <td>{{ $salle->adresse }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['salles.destroy', $salle->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('salles.show', [$salle->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('salles.edit', [$salle->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $salles])
        </div>
    </div>
</div>
