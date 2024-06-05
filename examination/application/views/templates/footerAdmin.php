<!--footer end-->
</section>
<script src="<?=base_url();?>design/lib/jquery/jquery.min.js"></script>
<script src="<?=base_url();?>design/lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?=base_url();?>design/lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=base_url();?>design/lib/jquery.scrollTo.min.js"></script>
<script src="<?=base_url();?>design/lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?=base_url();?>design/lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="<?=base_url();?>design/lib/common-scripts.js"></script>
<script type="text/javascript" src="<?=base_url();?>design/lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?=base_url();?>design/lib/gritter-conf.js"></script>
<script type="text/javascript" language="javascript" src="<?=base_url();?>design/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?=base_url();?>design/lib/advanced-datatable/js/DT_bootstrap.js"></script>
<!--script for this page-->
<script src="<?=base_url();?>design/lib/sparkline-chart.js"></script>
<script src="<?=base_url();?>design/lib/zabuto_calendar.js"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="<?=base_url();?>design/lib/jquery.backstretch.min.js"></script>
<!-- <script>
  $.backstretch("<?=base_url();?>design/img/kmscibackground.jpg", {
    speed: 500
  });
</script> -->
<script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      //nCloneTd.innerHTML = '<img src="<?=base_url();?>design/lib/advanced-datatable/images/details_open.png">';
      //nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        //this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        //this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [0, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          //this.src = "<?=base_url();?>design/lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          //this.src = "<?=base_url();?>design/lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
    $('.addAptitude').click(function(){
      document.getElementById("apt_id").value='';
      document.getElementById("testno").value='';
      document.getElementById("apt_question").value='';
      document.getElementById("apt_c1").value='';
      document.getElementById("apt_c2").value='';
      document.getElementById("apt_c3").value='';
      document.getElementById("apt_c4").value='';
      document.getElementById("apt_answer").value='';
    });
    $('.editAptitude').click(function(){
      var id=$(this).data('id');
      document.getElementById("apt_id").value=id;
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_aptitude',
        type:'post',
        data:{id:id},
        dataType:'json',
        success:function(response){
          document.getElementById("testno").value=response[0]['testno'];
          document.getElementById("apt_question").value=response[0]['q1'];
          document.getElementById("apt_c1").value=response[0]['c1'];
          document.getElementById("apt_c2").value=response[0]['c2'];
          document.getElementById("apt_c3").value=response[0]['c3'];
          document.getElementById("apt_c4").value=response[0]['c4'];
          document.getElementById("apt_answer").value=response[0]['answer'];
        }
      });
    });
    $('.addSpecialization').click(function(){
      document.getElementById("sp_id").value='';
        var select = document.getElementById("sp_dept");
				var optn = '';
				var optn1 = 'Select Department';
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
      document.getElementById("sp_question").value='';
      document.getElementById("sp_c1").value='';
      document.getElementById("sp_c2").value='';
      document.getElementById("sp_c3").value='';
      document.getElementById("sp_c4").value='';
      document.getElementById("sp_answer").value='';
    });
    $('.editSpecialization').click(function(){
      var id=$(this).data('id');
      document.getElementById("sp_id").value=id;
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_specialization',
        type:'post',
        data:{id:id},
        dataType:'json',
        success:function(response){          
          var select = document.getElementById("sp_dept");
				var optn = response[0]['dept'];
				var optn1 = response[0]['dept'];
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
          document.getElementById("sp_question").value=response[0]['q1'];
          document.getElementById("sp_c1").value=response[0]['c1'];
          document.getElementById("sp_c2").value=response[0]['c2'];
          document.getElementById("sp_c3").value=response[0]['c3'];
          document.getElementById("sp_c4").value=response[0]['c4'];
          document.getElementById("sp_answer").value=response[0]['answer'];
        }
      });
    });
    $('.addTOF').click(function(){
      document.getElementById("tof_id").value='';
        var select = document.getElementById("tof_dept");
				var optn = '';
				var optn1 = 'Select Department';
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
      document.getElementById("tof_question").value='';      
      document.getElementById("tof_answer").value='';
    });
    $('.editTOF').click(function(){
      var id=$(this).data('id');
      document.getElementById("tof_id").value=id;
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_tof',
        type:'post',
        data:{id:id},
        dataType:'json',
        success:function(response){          
          var select = document.getElementById("tof_dept");
				var optn = response[0]['dept'];
				var optn1 = response[0]['dept'];
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
          document.getElementById("tof_question").value=response[0]['q1'];          
          document.getElementById("tof_answer").value=response[0]['answer'];
        }
      });
    });

    $('.addFB').click(function(){
      document.getElementById("fb_id").value='';
        var select = document.getElementById("fb_dept");
				var optn = '';
				var optn1 = 'Select Department';
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
      document.getElementById("fb_question").value='';      
      document.getElementById("fb_answer").value='';
    });
    $('.editFB').click(function(){
      var id=$(this).data('id');
      document.getElementById("fb_id").value=id;
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_fb',
        type:'post',
        data:{id:id},
        dataType:'json',
        success:function(response){          
          var select = document.getElementById("fb_dept");
				var optn = response[0]['dept'];
				var optn1 = response[0]['dept'];
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
          document.getElementById("fb_question").value=response[0]['q1'];          
          document.getElementById("fb_answer").value=response[0]['answer'];
        }
      });
    });
    $('.addEssay').click(function(){
      document.getElementById("essay_id").value='';
        var select = document.getElementById("essay_dept");
				var optn = '';
				var optn1 = 'Select Department';
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
      document.getElementById("essay_question").value='';            
    });
    $('.editEssay').click(function(){
      var id=$(this).data('id');
      document.getElementById("essay_id").value=id;
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_essay',
        type:'post',
        data:{id:id},
        dataType:'json',
        success:function(response){          
          var select = document.getElementById("essay_dept");
				var optn = response[0]['dept'];
				var optn1 = response[0]['dept'];
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
          document.getElementById("essay_question").value=response[0]['q1'];                    
        }
      });
    });

    $('.addMTQ').click(function(){
      document.getElementById("mtq_id").value='';
        var select = document.getElementById("mtq_dept");
				var optn = '';
				var optn1 = 'Select Department';
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
      document.getElementById("mtq_question").value='';      
      document.getElementById("mtq_answer").value='';
      document.getElementById("mtq_testno").value='';
    });
    $('.editMTQ').click(function(){
      var id=$(this).data('id');
      document.getElementById("mtq_id").value=id;
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_mtq',
        type:'post',
        data:{id:id},
        dataType:'json',
        success:function(response){          
          var select = document.getElementById("mtq_dept");
				var optn = response[0]['dept'];
				var optn1 = response[0]['dept'];
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
          document.getElementById("mtq_question").value=response[0]['q1'];          
          document.getElementById("mtq_answer").value=response[0]['answer'];
          document.getElementById("mtq_testno").value=response[0]['testno'];
        }
      });
    });
    $('.addMTC').click(function(){
      document.getElementById("mtc_id").value='';
        var select = document.getElementById("mtc_dept");
				var optn = '';
				var optn1 = 'Select Department';
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
      document.getElementById("mtc_question").value='';            
      document.getElementById("mtc_testno").value='';
    });
    $('.editMTC').click(function(){
      var id=$(this).data('id');
      document.getElementById("mtc_id").value=id;
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_mtc',
        type:'post',
        data:{id:id},
        dataType:'json',
        success:function(response){          
          var select = document.getElementById("mtc_dept");
				var optn = response[0]['dept'];
				var optn1 = response[0]['dept'];
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
          document.getElementById("mtc_question").value=response[0]['ch1'];                    
          document.getElementById("mtc_testno").value=response[0]['testno'];
        }
      });
    });

    $('.addPT').click(function(){
      document.getElementById("pt_id").value='';
        var select = document.getElementById("pt_dept");
				var optn = '';
				var optn1 = 'Select Department';
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
      document.getElementById("pt_question").value='';
      document.getElementById("pt_c1").value='';
      document.getElementById("pt_c2").value='';
      document.getElementById("pt_c3").value='';
      document.getElementById("pt_c4").value='';
      document.getElementById("pt_c5").value='';
      document.getElementById("pt_answer").value='';
    });
    $('.editPT').click(function(){
      var id=$(this).data('id');
      document.getElementById("pt_id").value=id;
      $.ajax({
        url:'<?=base_url();?>index.php/pages/fetch_single_pt',
        type:'post',
        data:{id:id},
        dataType:'json',
        success:function(response){          
          var select = document.getElementById("pt_dept");
				var optn = response[0]['dept'];
				var optn1 = response[0]['dept'];
				var el = document.createElement("option");
				el.selected = "selected";
				el.textContent = optn1;
				el.value = optn;
				select.appendChild(el);
          document.getElementById("pt_question").value=response[0]['q1'];
          document.getElementById("pt_c1").value=response[0]['c1'];
          document.getElementById("pt_c2").value=response[0]['c2'];
          document.getElementById("pt_c3").value=response[0]['c3'];
          document.getElementById("pt_c4").value=response[0]['c4'];
          document.getElementById("pt_c5").value=response[0]['c5'];
          document.getElementById("pt_answer").value=response[0]['answer'];
        }
      });
    });
  </script>
</body>

</html>
