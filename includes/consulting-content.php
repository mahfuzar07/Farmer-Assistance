<?php
    $data=$obj->get_all_question_ans();
?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3 >কৃষি বিষয়ক প্রশ্ন-উত্তর  </h3>
        <h4><a href="index.html">Home</a><label>/</label></h4>
    </div>
</div>
<div class="terms">
    <div class="container">
        <div class="spec ">
            <h3> কৃষি বিষয়ক প্রশ্ন-উত্তর </h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class="ter-wthree">
            <?php
                while ($values = mysqli_fetch_assoc($data)){
            ?>
            <div class="single-question-answer-box">
                <h5>
                    <span><i class="glyphicon glyphicon-question-sign"></i> প্রশ্ন : </span>  <?php echo $values['name'];?>
                </h5>
                <h6>
                    <span><i class="glyphicon glyphicon-pencil"></i> উত্তর : </span> <?php echo $values['answer'];?>
                <h6>
            </div>
            
            <?php }?>
        </div>
    </div>
</div>
