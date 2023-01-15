Asset Collector
=====================================================

Asset collector is a library with set of Blade directives to prevent multiple asset (css/js) code insertions.
Asset collector used by LaraSpell for field components who need some css and js code.

For example, if you have view partial `input-select2.blade.php` like this:

```html
<select name="{{ $name }}" class="form-control use-select2" id="{{ $id }}">
  @foreach($options as $option)
  <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
  @endforeach
</select>

@push('styles')
<link rel="stylesheet" href="{{ asset('path/to/select2/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('path/to/select2/select2.min.js') }}"></script>
<script>
$(function() {
  $("select.use-select2").select2();
})
</script>
@endpush
```

If you include (using `@include`) that file 2 times, link and scripts code will also rendered 2 times.
So it will increase rendered page size and can be trouble for some plugins.

This library is just to prevent that case. Using asset collector, code above will be like this:

```html
<select name="{{ $name }}" class="form-control use-select2" id="{{ $id }}">
  @foreach($options as $option)
  <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
  @endforeach
</select>

@css('path/to/select2/select2.min.css')
@js('path/to/select2/select2.min.js')
@script
<script>
$(function() {
  $("select.use-select2").select2();
})
</script>
@endscript
```

Then in master view, you can dump collected assets like this:

```html
<!doctype html>
<html>
<head>
  ...
  @section('styles')
    @styles()
  @show
  ...
</head>
<body>
  ...
  @section('scripts')
    @scripts()
  @show
</body>
</html>
```

## Installation

Run composer command below to install asset-collector:

```
composer require "laraspells/asset-collector"
```

Then open your `config/app.php`, put `LaraSpells\AssetCollectorServiceProvider::class` to 'providers' section:

Thats it!
