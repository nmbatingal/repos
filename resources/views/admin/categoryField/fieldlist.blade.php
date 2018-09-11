<option>Select Domain...</option>
@if(!empty($fields))
    @foreach( $fields as $value )
    <optgroup label="{{ $value->category_field }}">
        @foreach( $value->categoryDomains as $domain )
            <option value="{{ $domain->id }}">{{ $domain->category_domain }}</option>
        @endforeach
    </optgroup>
    @endforeach
@endif