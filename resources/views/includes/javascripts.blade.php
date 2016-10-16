<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Moment -->
<script src="{{ URL::asset('js/lib/moment.min.js') }}"></script>

<!-- Fullcalendar -->
<script src="{{ URL::asset('js/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('js/locale/es.js') }}"></script>
<script src="{{ URL::asset('js/calendar.js') }}"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $('#tema_id').select2();
</script>

<script type="text/javascript">
	function temaCambio(){
		var type = $("#tema_id").attr('type');
		if(type == "select"){

		}else{
			if(type == "text"){
				$("#tema_id").remove();
				$("#tema").append('<select id="tema_id" type="text" value="1" class="ProductDetailsQuantityTextBox"></select>');
				$("#tema_id").append(@selectString);

			}
		}
		
	}
</script>

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}