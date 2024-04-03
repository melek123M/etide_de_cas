<!-- Titre Field -->
<div class="col-sm-12">
    {!! Form::label('titre', 'Titre:') !!}
    <p>{{ $piece->titre }}</p>
</div>

<!-- Flyer Field -->
<div class="col-sm-12">
    {!! Form::label('flyer', 'Flyer:') !!}
    <p>{{ $piece->flyer }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $piece->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $piece->updated_at }}</p>
</div>

