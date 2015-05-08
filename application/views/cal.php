	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				eventClick:  function(event, jsEvent, view) {
					$('#t').html(event.lab);
		            $('#modalBody').html(moment(event.start).format('MMM Do h:mm A'));
		            $('#eventUrl').attr('href',event.url);
		            $('#fullCalModal').modal();
        		},
				events: <?php echo $json ?>,
				eventLimit:true,
				header: {
					left: '',
					center: 'title',
					right: 'prev,next'
				},
				defaultDate: new Date(),
								
			});
			

		});

	</script>
	<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h3 id="modalTitle" class="modal-title">Detail Booking</h3>
            </div>
            <div id="t" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"><a id="eventUrl" target="_blank">Event Page</a></button>
            </div>
        </div>
    </div>
</div>
 		<div class="row">
 		<div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            </div>
	