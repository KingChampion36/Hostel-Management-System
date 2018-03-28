<script>
function selectside(no) {
  var $i=Number(no);
	$('.sidebar li').attr('class','');
	$('.sidebar li:nth-of-type('+$i+')').attr('class','active');
};


</script>
