@include('partials/header')

{{-- Auto-submit PayFast payment form.
     $params is built and signed by PayFastController::payBooking(). --}}
<form action="{{ $payfastUrl }}" method="POST" id="payfastForm">
  @foreach($params as $key => $value)
    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
  @endforeach
</form>

<script>
  // Auto-submit once the DOM is ready — PayFast requires a POST redirect
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('payfastForm').submit();
  });
</script>

@include('partials/footer')
