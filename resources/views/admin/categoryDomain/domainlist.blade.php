<option value="">All Domain</option>
@if(!empty($domains))
    @foreach($domains as $value)
        <option value="{{ $value->id }}">{{ $value->category_domain }}</option>
    @endforeach
@endif