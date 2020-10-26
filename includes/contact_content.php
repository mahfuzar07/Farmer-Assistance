<?php
if (isset($_POST['btn'])) {
   $return = $obj->add_comment($_POST);
     }

 ?>
      <?php if (isset($return)) { ?>
               <h2 style="text-align:center">
                   <?php
                   if (is_array($return)) {
                       foreach ($return as $value) {
                           echo $value;
                       }
                   } else {
                       echo $return;
                   }
                   ?>
               </h2>
           <?php } ?>

<div class="banner-top" style="margin-top: 10px;">
  <div class="container">
    <h3 >যোগাযোগ</h3>
    <h4><a href="./"></a>হোম <label>/</label>যোগাযোগ </h4>
    <div class="clearfix"> </div>
  </div>
</div>


<!-- <div class="contact">
  <div class="container">
    <div class="spec ">
      <h3>যোগাযোগ </h3>
        <div class="ser-t">
          <b></b>
          <span><i></i></span>
          <b class="line"></b>
        </div>
    </div> -->
    <div class=" contact-w3">
      <div class="col-md-5 contact-right">
        <img src="assets/images/logo (2).png" class="img-responsive" alt="">



   <a href="http://www.maplandia.com/bangladesh/dhaka-div/dhaka-zila/dhaka/bus-stops/mirpur-2/" title="satellite map of Mirpur 2 in Dhaka"><img src="http://images.maplandia.com/bangladesh/dhaka-div/dhaka-zila/dhaka/bus-stops/mirpur-2/mirpur-2-336x280.gif" width="336" height="280" border="0" alt="Mirpur 2 satellite map"/></a>
      </div>
      <div class="col-md-7 contact-left">
        <h4>যোগাযোগ করুন আমাদের সাথে </h4>

        <ul class="contact-list">
          <li> <i class="fa fa-map-marker" aria-hidden="true"></i>মিরপুর-২ , ঢাকা </li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com">Fai19@gmail.com</a></li>
          <li> <i class="fa fa-phone" aria-hidden="true"></i>০১৭৬৮২০৮৫৯৮</li>
        </ul>
        <div id="container">
          <!--Horizontal Tab-->
          <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">

            </ul>
          </div>
            <div class="resp-tabs-container hor_1">

              <div>
                <form action="" method="post">
                  <input type="text" value="নাম" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'নাম';}" required="">
                  <input type="email" value="ইমেইল " name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ইমেইল';}" >
                  <textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ম্যাসেজ  লিখুন...';}" required="">ম্যাসেজ  লিখুন </textarea>
                  <input type="submit" name="btn" value="সাবমিট করুন " >
                </form>
              </div>
              <div>
                <div class="map-grid"  style="margin-top: 20px;">
                <h5>আমাদের শাঁখা </h5>
                  <ul>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i>মিরপুর-২ </li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i>বগুড়া </li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i>শিবগঞ্জ </li>

                  </ul>
                </div>
              </div>
              <div>

              </div>
            </div>
          </div>
        </div>

        <!--Plug-in Initialisation-->
        <script type="text/javascript">
        $(document).ready(function() {
          //Horizontal Tab
          $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
              var $tab = $(this);
              var $info = $('#nested-tabInfo');
              var $name = $('span', $info);
              $name.text($tab.text());
              $info.show();
            }
          });

          // Child Tab
          $('#ChildVerticalTab_1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true,
            tabidentify: 'ver_1', // The tab groups identifier
            activetab_bg: '#fff', // background color for active tabs in this group
            inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
            active_border_color: '#c1c1c1', // border color for active tabs heads in this group
            active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
          });

          //Vertical Tab
          $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
              var $tab = $(this);
              var $info = $('#nested-tabInfo2');
              var $name = $('span', $info);
              $name.text($tab.text());
              $info.show();
            }
          });
        });
      </script>

      </div>

    <div class="clearfix"></div>
  </div>
  </div>
</div>
<!-- //contact -->
