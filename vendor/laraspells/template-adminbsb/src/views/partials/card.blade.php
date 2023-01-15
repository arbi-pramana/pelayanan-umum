<div class="card">
  @if(isset($title))
  <div class="header {{ $header_classes or '' }}">
    <h2 class="{{ $title_classes or '' }}">
      {{ $title }}
      @if(isset($description)) 
      <small>{!! $description !!}</small>
      @endif
    </h2>
    {!! $header_dropdown or '' !!}
  </div>
  @endif
  <div class="body">
    {!! $slot !!}
  </div>
</div>