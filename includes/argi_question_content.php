<?php
    if (isset($_POST['btn'])) {
        $return = $obj->add_question($_POST);
    }
?>
<div class="banner-top">
    <div class="container">
        <h3 >কনসালটেন্ট </h3>
        <h4><a href="./"></a>হোম <label>/</label>কনসালটেন্ট </h4>
        <div class="clearfix"> </div>
    </div>
</div>

<section class="question-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                <div class="col-md-12 contact-left">
                    <h4> কৃষি বিষয়ক প্রশ্ন করুন </h4>
                    <div id="container">
                        <!--Horizontal Tab-->
                        <div class="resp-tabs-container hor_1">
                            <div>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" value="নাম" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'নাম';}" required="">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" value="ইমেইল " name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ইমেইল';}" >
                                        </div>
                                        <div class="col-md-12">
                                            <textarea name="agri_question" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ম্যাসেজ  লিখুন...';}" required="">প্রশ্ন   লিখুন </textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" name="btn" value="সাবমিট করুন " >
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3 mt-5">
                    <div class="add">
                        <a href="consultanting.php">
                            <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">  আপনার  প্রশ্নের উত্তর দেখুন  </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
