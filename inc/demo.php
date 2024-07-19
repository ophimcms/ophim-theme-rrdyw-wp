<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<div class="row">
        <div class="stui-foot clearfix">
            <p class="text-muted text-center visible-xs">Copyright © 2008-2018</p>
            <center>
                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tuyên bố trang trọng: Trang web này nhằm mục đích cung cấp một môi trường giao tiếp tốt cho phần lớn những người đam mê phim ảnh và truyền hình. Chúng tôi không đàn áp, sản xuất hoặc lưu trữ bất kỳ tệp âm thanh và video nào. Tất cả các nguồn trên trang web đều được sao chép từ các kênh công cộng trên Internet.</font></font></p>
                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nó chỉ dành cho mục đích giao lưu, học hỏi giữa các cư dân mạng và thử nghiệm. Vui lòng không sử dụng nó cho mục đích thương mại. Vui lòng ủng hộ phiên bản chính hãng! Trang web này hoàn toàn là một trang web phúc lợi công cộng và tuân thủ nghiêm ngặt luật pháp và quy định của Trung Quốc đại lục. Email khiếu nại và báo cáo: rrdyw#gmail.COM</font></font></p>
            </center>
        </div>
    </div>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);