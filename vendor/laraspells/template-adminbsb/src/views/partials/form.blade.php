<form class="form"
  id="form-create"
  method="POST"
  action="{{ $form->getAction() }}"
  @if($form->hasUploadableField(true))
  enctype="multipart/form-data"
  @endif
  >

  {!! csrf_field() !!}

  @foreach($form->getExistsFields() as $key => $field)
    @if($form->isFieldRelation($key, $field))
      @component(isset($field['view_form']) ? $field['view_form'] : '{? view_namespace ?}partials.form-child', array_merge($field, [
        'name' => $key,
        'table' => array_values(array_map(function($field) {
          return [
            'key' => $field['name'],
            'label' => $field['label']
          ];
        }, $field['fields']))
      ]))
        @foreach($field['fields'] as $childField)
          @include($form->getInputView($childField['input'], '{? view_namespace ?}partials.fields.'.$childField['input']), array_merge($childField, [
            'value' => $form->getRenderValue($key)
          ]))
        @endforeach
      @endcomponent
    @else
      @include($form->getInputView($field['input'], '{? view_namespace ?}partials.fields.'.$field['input']), array_merge($field, [
        'value' => $form->getRenderValue($key)
      ]))
    @endif
  @endforeach

  @component('{? view_namespace ?}partials.fields.base', ['name' => '', 'label' => false])
    <a class='btn btn-default waves-effect' onclick="window.history.back()">Cancel</a>
    @if($form->isCreate())
      <button class='btn btn-success'><i class="material-icons">add</i> Create</button>
    @else
      {!! method_field('PUT') !!}
      <button class='btn btn-primary'><i class="material-icons">save</i> Save</button>
    @endif
  @endcomponent
</form>

@foreach($form->getScripts() as $script)
@js($script)
@endforeach
