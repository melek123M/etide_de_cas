<!-- Libelle Field -->
<div class="col-sm-12">
    {!! Form::label('libelle', 'Libelle:') !!}
    <p>{{ $salle->libelle }}</p>
</div>

<!-- Adresse Field -->
<div class="col-sm-12">
    {!! Form::label('adresse', 'Adresse:') !!}
    <p>{{ $salle->adresse }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $salle->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $salle->updated_at }}</p>
</div>

