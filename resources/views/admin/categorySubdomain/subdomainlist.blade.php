<option></option>
@if(!empty($subdomains))
    @foreach( $subdomains as $subdomain )
        <option value="{{ $subdomain->id }}">{{ $subdomain->category_subdomain }}</option>
    @endforeach
@endif