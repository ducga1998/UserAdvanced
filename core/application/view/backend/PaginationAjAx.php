<?php
     $x=isset($_REQUEST["numberPage"])?$_REQUEST["numberPage"]:5;
     
      
    
        isset($totalPage)?$i:1;
        echo "<ul class='pagination'>";
        $current_page=0;
        $total_page=ceil($a/$x);  // nó =0
    
        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if($current_page > 1 && $total_page > 1) {
            echo '<li  page='.$x.' class="active"><a pageUser='.( $current_page - 1 ) .' >Prev</a></li> ';
        }  
    
        // Lặp khoảng giữa
        for( $i = 1 ; $i <= $total_page ; $i++ ) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if($i == $current_page) {
                echo '<span>' . $i . '</span> | ';
            } else {
                echo '<li><a  page='.$x.' class="ClickPaging"  pageUser=' . $i . '>' . $i . '</a></li>';
            }
        }
    
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if($current_page < $total_page && $total_page > 1) {
            echo '<li><a pageUser=' . ( $current_page + 1 ) . ' page='.$x.'>Next</a> </li> ';
        }
        echo "</ul>";
        ?>