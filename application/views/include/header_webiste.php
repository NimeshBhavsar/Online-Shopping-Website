<nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link  active" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <?php foreach ($category as $key => $value) { 
                            $get_data = get_data('tbl_sub_category','cat_id',$value->cat_id);
                            ?>
                           
                       
                        <li class="nav-item dropdown has-mega-menu" style="position:relative;">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $value->category_name; ?></a>
                            <div class="dropdown-menu" style="width:auto;">
                                <div class="px-0 container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php 
                                            if(!empty($get_data)){
                                            foreach ($get_data as $key => $value1):
                                            $datavaluestwo = array('sub_cat_id' => $value1->sub_cat_id);
                                            $get_sc_count = get_count('tbl_products',$datavaluestwo,'product_id');
                                            ?>
                                            <a class="dropdown-item" href="<?php echo base_url()."sub_cat_v/".$value1->sub_cat_id; ?>"><?php echo $value1->sub_cat_name." (".$get_sc_count.")";?></a>
                                             <?php endforeach; } ?>
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                         <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url()?>contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- <script type="text/javascript">
        document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}
      </script>

      <script type="text/javascript" language="javascript">
        $(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
        }); 
</script> -->