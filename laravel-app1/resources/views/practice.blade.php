{{--<div>--}}
{{--    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->--}}
{{--</div>--}}

@foreach ($details as $key => $student)
    @if($id == $student['id'])
        <p>Key: {{ $key }}</p>
        <p>ID: {{ $student['id'] }}</p>
        <p>Name: {{ $student['name'] }}</p>
        <hr>
    @endif
@endforeach
