@include('partials/header')
<form action="{{ $payfastUrl }}" method="POST" id="payfastForm">
    @foreach($data as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
</form>

<script>
  document.getElementById('payfastForm').submit();
</script>
@include('partials/footer')
