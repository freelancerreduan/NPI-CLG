
@foreach ($institutes as $institute)
                <option value="{{ $institute->id }}">{{ $institute->name }}</option>
            @endforeach
