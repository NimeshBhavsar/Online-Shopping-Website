
    <!-- header -->
    <header>
        <div class="container">
            <!-- top nav -->
            <nav class="top_nav d-flex pt-3 pb-1">
                <!-- logo -->
                <h1>
                    <a class="navbar-brand" href="<?php echo base_url()."website_home";?>">OS
                    </a>
                </h1>
                <!-- //logo -->

                <div class="w3ls_right_nav ml-auto d-flex">
                    <!-- search form --><br><br>
                    <form class="nav-search form-inline my-0 form-control" action="<?php echo base_url()."product_search"; ?>" method="post">
                        <?php $get_data = get_data('tbl_category','status','YES'); ?>   <div class="autocomplete">
                        <input type="text" name="search_keywords" placeholder="Search your Product Here" class="form-control search_boxown" required="true" id="search_input" autocomplete="off">
                        </div>
                        <select class="form-control input-lg search_list" name="search_options">
                            <option value="all">Search our store</option>
                            <?php 
                            foreach ($get_data as $key => $value) { 
                                $get_data1 = get_data('tbl_sub_category','cat_id',$value->cat_id);
                            ?>
                            <optgroup label="<?php echo $value->category_name;?>">
                                <?php  foreach ($get_data1 as $key => $value1) { 
                            ?>
                                <option value="<?php echo $value1->sub_cat_id;?>"><?php echo $value1->sub_cat_name;?></option>
                                <?php } ?>
                            </optgroup>
                        <?php } ?>
                        </select>
                        <input class="btn btn-outline-secondary  ml-3 my-sm-0" type="submit" value="Search">
                    </form>
                    <!-- search form -->
                    <div class="nav-icon d-flex">
                        <!-- sigin and sign up -->
                        <?php
                        $profile_link1 = "logout";
                        if($this->session->userdata('role') == 'customer')
                        {
                          $profile_link1 = "customer_home";
                        }
                        elseif($this->session->userdata('role') == 'admin')
                        {
                          $profile_link1 = "admin_home";
                        }
                        elseif($this->session->userdata('role') == 'seller')
                        {
                          $profile_link1 = "seller_home";
                        }
                        ?>
                        <a class="text-dark login_btn align-self-center mx-3" href="<?php echo base_url().$profile_link1;?>">
                            <i class="far fa-user"></i>
                        </a>
                        <!-- sigin and sign up -->
                        <!-- shopping cart -->
                        <div class="cart-mainf">
                            <a class="btn top_hub_cart mt-1"  title="Cart" href="<?php echo base_url()."customer_cart";?>">
                                        <i class="fas fa-shopping-bag"></i>
                            </a>
                          </div>
                          <?php if(!empty($this->session->userdata('user_name'))){ ?>
                          <div class="cart-mainf1">
                            <a class="mt-1 name_login"  title="" href="<?php echo base_url().$profile_link1;?>"><?php echo $this->session->userdata('user_name'); ?>
                                        
                            </a>
                          </div>
                          <div class="cart-mainf1">
                            <a class="mt-1 btn btn-danger"  title="" href="<?php echo base_url();?>logout">LogOut
                                        
                            </a>
                          </div>
                        <?php } ?>

                        </div>
                        <!-- //shopping cart ends here -->
                    </div>
                </div>
            </nav>
            <!-- //top nav -->
            <style type="text/css">
                .search_boxown{margin-right: 20px!important;background: #fff!important;width: 300px!important;}
                /*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
            </style>
            <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if ((arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) || arr[i].toLowerCase().indexOf(val.toLowerCase()) > -1) {
          var remaining=0;var remaining_one = 0;
          b = document.createElement("DIV");
          if(arr[i].toLowerCase().indexOf(val.toLowerCase()) > -1)
          {
            remaining = arr[i].toLowerCase().indexOf(val.toLowerCase());
            b.innerHTML = arr[i].substr(0,remaining);
            b.innerHTML += "<strong class='own_hilights'>" + arr[i].substr(remaining,val.length) + "</strong>";
            remaining_one = (val.length + arr[i].toLowerCase().indexOf(val.toLowerCase()));
            if(remaining_one > 0)
            {
              b.innerHTML += arr[i].substr(remaining_one,arr[i].length);
            }
          }
          else
          {
            b.innerHTML = "<strong class='own_hilights'>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
          }


          //b = document.createElement("DIV");
          /*make the matching letters bold:*/
          //b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          //b.innerHTML += arr[i].substr(val.length);
          // console.log(arr[i].substr(val.length));
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
var Keywords_one = "<?php echo get_keywords(); ?>";
// console.log(Keywords_one);
// var myarr = ;
// console.log(myarr);
/*An array containing all the country names in the world:*/
var countries = Keywords_one.split(",");

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("search_input"), countries);
</script>
<style type="text/css">
  .own_hilights {
    color: #bce8a9;
    background-color: #1721a0;
}
.name_login{color: #800080;text-align: center;}
.cart-mainf1{width: 100px;background: none;text-align: center;line-height: 40px;font-weight: bold;font-size: 20px;}
</style>
<style type="text/css">
h4.bn_right {
    white-space: nowrap;
}


    @media screen and (max-width: 480px) {
    #search_input{
    width: 296px!important;
    margin-left: -138px!important;
    margin-bottom: 10px!important;
}
    .form-inline{
     flex-flow: column!important;
    }
    .search_list{margin-bottom: 10px!important;width: 296px!important;}
    .bnr_clip a{
    margin-left: -187px!important;
}
.banner-pos {
    right: 0%!important;
}

}
</style>