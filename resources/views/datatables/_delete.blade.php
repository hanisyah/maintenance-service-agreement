{!! Form::model($model, ['url' => $delete_url, 'method' => 'get'] ) !!}
{!! Form::button('<i class="glyphicon glyphicon-trash" aria-hidden="true"> Hapus</i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-danger')) !!}
{!! Form::close() !!}
