<div class="clear"></div>
<div class="main">
        <?php
                if(isset($_GET['action']) && $_GET['query']){
                $tam = $_GET['action'];
                $query = $_GET['query'];
                }else {
                    $tam = '';
                    $query = '';
                }
                if($tam == 'quanlydanhmucbh' && $query=='them'){
                    include("modules/quanlydanhmucbaihat/them.php");
                    include("modules/quanlydanhmucbaihat/lietke.php");
                }elseif($tam == 'quanlydanhmucbh' && $query=='sua'){
                    include("modules/quanlydanhmucbaihat/sua.php");
                }elseif($tam == 'quanlybaihat' && $query=='them'){
                    include("modules/quanlybaihat/them.php");
                    include("modules/quanlybaihat/lietke.php");
                }elseif($tam == 'quanlybaihat' && $query=='sua'){
                    include("modules/quanlybaihat/sua.php");
                }
               
        ?>
</div>