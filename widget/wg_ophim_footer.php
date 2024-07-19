<?php
class WG_oPhim_Footer extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wg_footer', // Base ID
            __( 'Ophim Footer', 'ophim' ), // Name
            array( 'description' => __( 'Mẫu footer', 'ophim' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract($args);
        ob_start();
        echo $instance['footer'] ?? '';
        echo $after_widget;
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title' 	=> '',
            'slug' 	=> '#',
            'postnum' 	=> 5,
            'style'		=> '1',
            'status'		=> 'all',
            'orderby'		=> 'new',
            'categories'		=> 'all',
            'actors'		=> 'all',
            'directors'		=> 'all',
            'genres'		=> 'all',
            'regions'		=> 'all',
            'years'		=> 'all',
        ) );
        extract($instance);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('footer'); ?>"><?php _e('Footer', 'ophim') ?></label>
            <br />
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"  ><?php if(isset($instance['footer']) && $instance['footer']){ echo $instance['footer'];}else{ ?> <div class="row">
                    <div class="stui-foot clearfix">
                    <p class="text-muted text-center visible-xs">Copyright © 2008-2018</p>
                    <center>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tuyên bố trang trọng: Trang web này nhằm mục đích cung cấp một môi trường giao tiếp tốt cho phần lớn những người đam mê phim ảnh và truyền hình. Chúng tôi không đàn áp, sản xuất hoặc lưu trữ bất kỳ tệp âm thanh và video nào. Tất cả các nguồn trên trang web đều được sao chép từ các kênh công cộng trên Internet.</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nó chỉ dành cho mục đích giao lưu, học hỏi giữa các cư dân mạng và thử nghiệm. Vui lòng không sử dụng nó cho mục đích thương mại. Vui lòng ủng hộ phiên bản chính hãng! Trang web này hoàn toàn là một trang web phúc lợi công cộng và tuân thủ nghiêm ngặt luật pháp và quy định của Trung Quốc đại lục. Email khiếu nại và báo cáo: rrdyw#gmail.COM</font></font></p>
                    </center>
                    </div>
                    </div><?php } ?></textarea>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['footer'] = $new_instance['footer'];
        return $instance;
    }

}
function register_new_widget_Footer() {
    register_widget( 'WG_oPhim_Footer' );
}
add_action( 'widgets_init', 'register_new_widget_Footer' );
