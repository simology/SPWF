<!-- jQuery -->
<script src="<?= asset('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= asset('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?= asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset('dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= asset('dist/js/demo.js'); ?>"></script>
<!-- DataTables -->
<script src="<?= asset('plugins/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?= asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js'); ?>"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Multiselector -->
<script src="<?= asset('js/multi-selector-users.js'); ?>"></script>
<script src="<?= asset('js/bootstrap-multiselect.js'); ?>"></script>

<!-- DatePicker -->
<script type="text/javascript" src="<?= asset('js/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?= asset('js/daterangepicker.min.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});

//AutoComplete Producer Tags & Customer
$(document).ready(function(){
	//AutoComplete Producer
	var availableTags = [
		<?php 
		foreach ($data['tags_code_prefix'] as $tags){
			foreach($tags as $prefix){
				echo "'".$prefix."'";
				echo ',';
			}

		}
		
	  ?>
    ];

	$('body').on('focus', '.tags', function(){
		$(this).autocomplete({
			source: availableTags
		});
		$(this).on("change", function(event){
			$(this).parent().parent().find('.search').val(event.target.value);
		});
	})	

	//AutoComplete Customer
	$( function() {
    var customerTags = [     
		<?php 
		foreach ($data['tags_customer'] as $tags){
			echo "'".$tags['report_customer']."'";
			echo ',';
		}
		
	  ?>
    ];
    $( ".customer" ).autocomplete({
      source: customerTags
    });
  } );

  	//AutoComplete Unit Prod
	$( function() {
    var upTags = [     
		<?php 
		foreach ($data['tags_productive_unit'] as $tags){
			echo "'".$tags['report_productive_unit']."'";
			echo ',';
		}
		
	  ?>
    ];
    $( ".up" ).autocomplete({
      source: upTags
    });
  } );


//End
}

);

//AutoComplete2 Remote URL
$(document).ready(function() {

	var getData = function (request, response) {
            $.getJSON(
                "<?= URLROOT; ?>AutoComplete/callback/" + encodeURIComponent(request.term),
                function (data) { 
                    response(data); 
                });
        };
     
        var selectRow = function (event, ui) {
            $("#search").val(ui.item.valuep);  
            return false;
        }
     
		$('body').on('focus', '.search', function(){
			$(this).autocomplete({
				source: getData,
				minLength: 3
			});
			
		})	
       


});



//Dynamic Form 
    $(document).ready(function(){      
      var i=<?= isset($input_builder) ? $input_builder : 1; ?>


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input class="form-control mb-2 mr-sm-2 mb-sm-0 tags" type="text" id="tags" name="materials['+i+'][\'producer\']" placeholder="Produttore"/></td><td><input class="form-control mb-2 mr-sm-2 mb-sm-0 search" type="text" id="search" name="materials['+i+'][\'article\']" placeholder="Articolo" required/></td><td><input class="form-control mb-2 mr-sm-2 mb-sm-0" type="number" name="materials['+i+'][\'quantity\']" placeholder="Qt" /></td><td><label class="sr-only">UM</label><select name="materials['+i+'][\'um\']" class="form-control" style="width:80px"><option value="PZ" selected>PZ</option><option value="ML">ML</option><option value="ORA">ORA</option></select></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

	  //Multi Selector Checkbox
	  $('#operator_lists').multiselect();

    });  

//Native JS

</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>



<script>
//DataPicker
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Oggi': [moment(), moment()],
           'Ieri': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Ultimi 7 giorni': [moment().subtract(6, 'days'), moment()],
           'Ultimi 30 giorni': [moment().subtract(29, 'days'), moment()],
           'Questo Mese': [moment().startOf('month'), moment().endOf('month')],
           'Mese scorso': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>


