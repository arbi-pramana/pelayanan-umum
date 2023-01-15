@php
$name = !empty($name) ? $name : uniqid();
$id = "form-child-{$name}";
$label = isset($label)? $label : ucwords(snake_case(camel_case($name), ' '));
$required = isset($required)? (bool) $required : false;
$rows = isset($rows) ? $rows : [];
$emptyMessage = "$label empty";
@endphp

@component('form-model::bs3.fields.wrapper', [
  'name' => $name,
  'label' => $label,
  'required' => $required
])
  <div class="form-child" id="{{ $id }}"
    data-modal="#modal-{{ $id }}"
    data-columns='{{ json_encode($table) }}'
    data-name-prefix='{{ $name }}'>
    <button style="margin-bottom:15px" class="btn btn-success btn-sm btn-add">
      <i class="fa fa-plus"></i> Tambah
    </button>
    <div class="well empty-message hidden">
      {{ $emptyMessage }}
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped" style="margin-bottom:0px;">
        <thead>
          <tr>
            @foreach($table as $i => $col)
            <th>{{ $col['label'] }}</th>
            @endforeach
            <th width="160">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rows as $i => $row)
          <tr data-values='{!! $row->toJson() !!}'>
            @foreach($fields as $key => $field)
            <td>
              <span>{{ $row->{$key} }}</span>
              <input type="hidden" data-key="{{ $key }}" name="{{ $name }}[{{$i}}][{{ $key }}]" value="{{ $row->{$key} }}"/>
            </td>
            @endforeach
            <td>
              <input type="hidden"
                name="{{ $name }}[{{$i}}][{{ $row->getKeyName() }}]"
                value="{{ $row->getKey() }}"
                data-key="{{ $row->getKeyName() }}"
                key="{{ $row->getKeyName() }}"/>

              <a class='btn btn-primary btn-edit'>Edit</a>
              <a class='btn btn-danger btn-delete'>Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endcomponent

@section('scripts')
  <div class="modal fade" id="modal-{{ $id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form  {{ $label }}</h4>
        </div>
        <form class="modal-form">
          <div class="modal-body">
            {{ $slot }}
          </div>
          <div class="modal-footer">
            <a class="btn btn-default btn-cancel" data-dismiss="modal">Cancel</a>
            <button class="btn btn-primary btn-submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @parent
@endsection

@script('plugin-form-child')
<script>
  $.fn.formChild = function (options) {
    var $forms = this;

    /**
     * Make hidden input element for form child row
     * (That input element value will posted to controller)
     *
     * @param {DOM|jQueryObject} $originalInput
     * @return {jQueryObject}
     */
    function makeRowHiddenInput($originalInput) {
      var tagName = $originalInput.get(0).tagName;
      var type = $originalInput.attr('type');
      var value = $originalInput.val();
      if (tagName == 'INPUT' && type == 'file') {
        return $originalInput.clone();
      } else {
        var $hiddenInput = $('<input type="hidden" value="'+value+'"/>');
        return $hiddenInput;
      }
    }

    /**
     * Add or update row ($tr) with given values
     *
     * @param {jQueryObject} $form
     * @param {jQueryObject} $tr
     * @param {Object} values
     */
    function addOrUpdateRow($form, $tr, values) {
      // Memastikan $tr adalah jQuery Object
      $tr = $($tr)
      // Remove current columns excepts the last one (column action)
      $tr.find("> td").not(":last-child").remove();

      var $modal = $($form.data('modal') + '.modal')
      var isNew = $tr.find('td').length === 0;
      var $table = $form.find('table.table')
      var columns = $form.data('columns') // array list opsi kolom (object)

      // console.log({$form, $tr, $table, columns, values})

      // Add columns to $tr
      var cols = columns.slice(0)
      // Reverse it first because we use prepend to add column
      // We use prepend to keep column action position to the last columns
      cols.reverse().forEach(function(col) {
        var $input = $modal.find('[name="'+col.key+'"]');
        var inputType = $input.attr('type');
        var $hiddenInput = makeRowHiddenInput($input);
        var $td = $("<td></td>");
        var value = values[col.key];

        $hiddenInput.addClass('hidden');
        $hiddenInput.data('key', col.key);
        $hiddenInput.attr('key', col.key);
        if (inputType != 'file') {
          $hiddenInput.val(value);
        }

        $td.append("<span>"+value+"</span>");
        $td.append($hiddenInput)
        $tr.prepend($td);
      });

      // If $tr is not in the DOM (isNew)
      // Append action column
      if (isNew) {
        $tdAction = $("<td></td>");
        $tdAction.append("<a class='btn btn-primary btn-edit'>Edit</a>");
        $tdAction.append("&nbsp;")
        $tdAction.append("<a class='btn btn-danger btn-delete'>Delete</a>");
        $tr.append($tdAction);
      }

      // Set data values to $tr
      // It used to set modal values when we click edit
      $tr.data('values', values);

      // Append row if isNew
      // And trigger some events
      if (isNew) {
        $table.find("tbody").append($tr);
        $form.trigger('row.added', [values, $tr]);
      } else {
        $form.trigger('row.updated', [values, $tr]);
      }
      $form.trigger('table.updated');
    } // end of addOrUpdateRow function

    if (typeof options === 'string') {
      var cmd = options
      switch (cmd) {
        case 'addOrUpdateRow': {
          var $tr = arguments[1];
          var values = arguments[2];
          return $forms.each(function() {
            addOrUpdateRow($(this), $tr, values);
          });
        }
        case 'beforeSubmit': {
          var beforeSubmit = arguments[1];
          return $forms.each(function () {
            $(this).data('beforeSubmit', beforeSubmit);
          })
        }
        case 'getTable': {
          return $forms.data('$table');
        }
        case 'getModal': {
          return $forms.data('$modal');
        }
        case 'getRows': {
          var $table = $forms.formChild('getTable');
          return $table ? $table.find('tbody > tr') : [];
        }
        case 'getRow': {
          var index = arguments[1];
          var $rows = $forms.formChild('getRows');
          var $tr = $rows.eq(index);
          return $tr.length ? $tr : null;
        }
        case 'getRowsValues': {
          var values = []
          $forms.formChild('getRows').each(function() {
            values.push($(this).data('values'));
          })
          return values;
        }
        case 'getRowValues': {
          var index = arguments[1];
          if (typeof index !== 'number') {
            return console.error('Cannot getRowValues. Index must be a number');
          }
          return $forms.formChild('getRowsValues')[index];
        }
      }
      return console.warn(cmd ? "Method '"+cmd+"' is not available." : "Method cannot be empty string.");
    }

    return $forms.each(function() {
      // Prepare vars
      var $form = $(this)
      var $table = $form.find('table.table')
      var $emptyMessage = $form.find(".empty-message")
      var $btnAdd = $form.find('.btn-add')
      var $modal = $($form.data('modal') + '.modal')
      var $modalForm = $modal.find('.modal-form')
      var $modalInputs = $modal.find('select, input, textarea')
      var $modalBtnSubmit = $modal.find('.btn-submit')
      var columns = $form.data('columns')
      var namePrefix = $form.data('name-prefix');

      $form.data('$modal', $modal);
      $form.data('$table', $table);

      // Bind some events
      $btnAdd.click(function(e) {
        e.preventDefault();
        var $tr = $("<tr></tr>")
        showFormModal($tr)
      });

      $form.on('click', 'td .btn-edit', function(e) {
        e.preventDefault();
        var $tr = $(this).closest('tr');
        showFormModal($tr)
      });

      $form.on('click', 'td .btn-delete', function(e) {
        e.preventDefault();
        var $tr = $(this).closest('tr');
        if (confirm('Apa kamu yakin ingin menghapus data ini?')) {
          $tr.remove()
          $form.trigger('row.deleted', [$tr]);
          $form.trigger('table.updated');
        }
      });

      $form.on('table.updated', function() {
        updateTable();
      });

      $form.on('table.ready', function() {
        updateTable();
      });

      // Trigger table ready
      $form.trigger('table.ready');

      function updateTable() {
        // Hide table if empty
        var $rows = $table.find("tbody > tr");
        var isEmpty = $rows.length === 0;
        if (isEmpty) {
          $emptyMessage.removeClass('hidden');
          $table.addClass('hidden');
        } else {
          $emptyMessage.addClass('hidden');
          $table.removeClass('hidden');
        }

        // correcting input names
        $rows.each(function(i) {
          var $inputs = $(this).find("select, input, textarea");
          $inputs.each(function() {
            var key = $(this).data('key');
            $(this).attr('name', namePrefix+'['+i+']['+key+']');
          });
        });
      }

      function showFormModal($tr) {
        $modalInputs.val('');
        var isNew = $tr.find('td').length === 0;
        if (!isNew) {
          // set form value
          var values = $tr.data('values') || {}
          $modalInputs.each(function() {
            var name = $(this).attr('name');
            var isFile = $(this).attr('type') === 'file';
            if (!isFile && values[name]) {
              $(this).val(values[name]);
            }
          });
        }

        $modal.one('show.bs.modal', function(e) {
          $form.trigger('modal.show', [e, $tr, $modal]);
        });
        $modal.one('shown.bs.modal', function(e) {
          $form.trigger('modal.shown', [e, $tr, $modal]);
        });

        // RESET SELECT2
        $modal.find('select.select2').each(function() {
          if ($(this).data('select2')) {
            $(this).select2('destroy');
            $(this).select2({
              dropdownParent: $modal,
              width: '100%'
            });
          }
        });

        $modal.modal('show');

        // turn off the event first so it doesn't stack with the previous event definition
        $modalForm.off('submit');
        $modalForm.on('submit', function(e) {
          e.preventDefault();
          var values = {};
          $modalInputs.each(function() {
            var value = $(this).val();
            var name = $(this).attr('name');
            values[name] = value;
          });

          var shouldContinue = true;
          var beforeSubmit = $form.data('beforeSubmit');
          if (typeof beforeSubmit === 'function') {
            var data = {
              action: $tr.find('td').length === 0 ? 'add' : 'edit',
              values: values,
              $tr: $tr,
              $modal: $modal
            }
            shouldContinue = beforeSubmit.apply($form, [data]);
          }

          if (shouldContinue) {
            $form.formChild('addOrUpdateRow', $tr, values);
            $modal.modal('hide');
          }
        });
      }
    });
  };
</script>
@endscript

@script
<script>
  $(function() {
    $("#{{ $id }}").formChild();
  });
</script>
@endscript

@style
<style type="text/css">
.modal .select2 {
  margin-bottom: 20px;
}
</style>
@endstyle