
<?php 

$footer_text = get_field('footer-txt','option');
$copyright = get_field('copywrite','option');

?>
</main>
<footer class="main-footer">
    <div class="container">
   
        <div class="darsoo-features">
            <?php
            if (have_rows('footer-icon-boxes','option')):
                while (have_rows('footer-icon-boxes','option')) : the_row();

                    $title = get_sub_field('title-icon-box','option');
                    $subtitle = get_sub_field('subtitle-icon-box','option');
                    $image = get_sub_field('img-icon-box','option');
      
                    $img_url = is_array($image) ? $image['url'] : $image; 
            ?>
                    <div class="df-item">
                        <div class="ds-item-img">
                            <img src="<?php echo $img_url; ?>" alt="<?php echo esc_html($title); ?>" />
                        </div>
                        <div class="ds-item-text">
                            <div class="ds-item-top-text">
                                <span><?php echo esc_html($title); ?></span>
                            </div>
                            <div class="ds-item-sub-text">
                                <span><?php echo esc_html($subtitle); ?></span>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>


    </div>

    <section class="footer-bottom">

        <div class="container">
            <div class="main-footer-content">
                <div class="mfc-right">
                    <div class="mfcr-item">
                        <div class="footer-logo">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" alt="لوگو دارسو">
                        </div>
                        <div class="mfcr-desc">                            
                            <?php 
                                if(!empty($footer_text)){
                                    echo $footer_text;
                                }
                                else{         
                            ?>                                             
                            <p>با توجه به این موضوع که دارسو یکی از به روز ترین فروشگاه های اینترنتی کالای دیجیتال است، در این راستا همواره تلاش نموده تا با خدماتی همچون خوش قیمتی، تخفیفات شگفت انگیز و خدماتی ویژه در کنار همراهان و اعضای خانواده بزرگ دارسو، به خدمات رسانی خود ادامه دهد.</p>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
                <div class="mfc-left">
                    <div class="mfcl-item">
                        <div class="mfcli-top mfcli-acc-top">
                            <span>لینــک هــای مفید</span>
                            <i class="fa-light fa-chevron-down"></i>
                        </div>
                        <div class="mfcli-bottom mfcli-acc-bottom">
                            <ul>
                                <li>
                                    <a href="https://darsoo.com/categories/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84/Apple-phone/">
                                        قیمت گوشی آیفون
                                    </a>
                                </li>                               
                                <li>
                                    <a href="https://darsoo.com/categories/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84/%DA%AF%D9%88%D8%B4%DB%8C-%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF/">
                                        قیمت گوشی سامسونگ
                                    </a>
                                </li>                               
                                <li>
                                    <a href="https://darsoo.com/categories/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84/%DA%AF%D9%88%D8%B4%DB%8C-%D8%B4%DB%8C%D8%A7%D8%A6%D9%88%D9%85%DB%8C/">
                                        قیمت گوشی شیائومی
                                    </a>
                                </li>    
                                <li>
                                    <a href="https://darsoo.com/categories/%D8%AA%D8%A8%D9%84%D8%AA/">
                                        قیمت تبلت
                                    </a>
                                </li>                              
                            </ul>
                        </div>
                    </div>
                    <div class="mfcl-item">
                        <div class="mfcli-top mfcli-acc-top">
                            <span>لوازم جانبی</span>
                            <i class="fa-light fa-chevron-down"></i>
                        </div>
                        <div class="mfcli-bottom mfcli-acc-bottom">
                            <ul>
                                <li>
                                    <a href="https://darsoo.com/categories/%D9%87%D9%86%D8%AF%D8%B2%D9%81%D8%B1%DB%8C-%D9%88-%D9%87%D8%AF%D8%B3%D8%AA/">
                                        قیمت هندزفری و هدست
                                    </a>
                                </li>                                
                                <li>
                                    <a href="https://darsoo.com/categories/%D9%87%D9%86%D8%AF%D8%B2%D9%81%D8%B1%DB%8C-%D9%88-%D9%87%D8%AF%D8%B3%D8%AA/">
                                        قیمت هندزفری
                                    </a>
                                </li>
                                <li>
                                    <a href="https://darsoo.com/categories/%D8%B3%D8%A7%D8%B9%D8%AA-%D9%87%D9%88%D8%B4%D9%85%D9%86%D8%AF/">
                                        قیمت ساعت هوشمند
                                    </a>
                                </li>                                                             
                            </ul>
                        </div>
                    </div>
                    <div class="mfcl-item">
                        <div class="mfcli-top mfcli-acc-top">
                            <span>خدمـات به مشتـریان</span>
                            <i class="fa-light fa-chevron-down"></i>
                        </div>
                        <div class="mfcli-bottom mfcli-acc-bottom">
                            <!-- <ul>
                                <li>
                                    <a href="https://darsoo.com/categories/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%DB%8C%D9%84/%DA%AF%D9%88%D8%B4%DB%8C-%D8%B4%DB%8C%D8%A7%D8%A6%D9%88%D9%85%DB%8C/">
                                        قیمت گوشی شیائومی
                                    </a>
                                </li>  
                            </ul> -->
                        </div>
                    </div>
                    <div class="mfcl-item">
                        <div class="mfcli-top">
                            <span>تماس با ما</span>
                        </div>
                        <div class="mfcli-bottom contact">
                            <ul>
                                <li><a href="tel:+982191009828"><i class="fa-light fa-phone"></i><span>021-91009828</span></a></li>
                                <li><a href="tel:+982166171970"><i class="fa-light fa-phone"></i><span>021-66171970</span></a></li>
                                <li><a href="tel:+982166281928"><i class="fa-light fa-phone"></i><span>021-66171928</span></a></li>
                                <li><a href="#"><i class="fa-light fa-envelope"></i><span>support@darsoo.com</span></a></li>
                            </ul>
                        </div>
                        <div class="mfcli-socials">
                            <a href="https://www.instagram.com/darsootech?igsh=MTJrenUxb3JuenhoMw==">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.04004 1.15381H16.9727C18.931 1.15386 20.3735 1.73365 21.3242 2.68506C22.2154 3.57688 22.7784 4.89931 22.8408 6.67334L22.8467 7.03369V16.9634C22.8467 18.9204 22.2669 20.363 21.3145 21.3149C20.3621 22.2668 18.9189 22.8461 16.9609 22.8462H7.04004C5.08191 22.8461 3.63882 22.2669 2.68652 21.314C1.7341 20.3608 1.1543 18.9153 1.1543 16.9517V7.03662C1.1543 5.07963 1.73412 3.63699 2.68652 2.68506C3.63894 1.73324 5.08199 1.15387 7.04004 1.15381ZM12.0068 6.40381C8.91883 6.40381 6.40845 8.91189 6.4082 11.9995C6.4082 15.0873 8.91868 17.5962 12.0068 17.5962C15.0948 17.5959 17.6045 15.0872 17.6045 11.9995C17.6042 8.91205 15.0946 6.40407 12.0068 6.40381ZM18.2979 3.3335C17.5937 3.20595 16.8696 3.45049 16.3838 3.93604L16.3652 3.95459L16.3477 3.97412C16.1904 4.14879 16.0346 4.36297 15.9199 4.6499H15.9189C15.8171 4.89432 15.7471 5.17918 15.7471 5.48486V5.49561C15.7502 5.7786 15.8089 6.0582 15.9189 6.31885V6.31982C16.0232 6.56973 16.1682 6.7953 16.3477 6.99463L16.3662 7.01514L16.3867 7.03564C16.6556 7.30247 16.9887 7.49381 17.3525 7.59229L17.5098 7.62842C17.9326 7.70985 18.3697 7.6635 18.7666 7.49658L18.7676 7.49756C19.0175 7.39343 19.243 7.24824 19.4424 7.06885L19.4814 7.03369L19.5166 6.99463C19.6513 6.84501 19.7672 6.68084 19.8604 6.50244L19.9453 6.31982C20.0472 6.07544 20.1171 5.79054 20.1172 5.48486C20.1172 5.1894 20.0504 4.91411 19.9541 4.67529H19.9561C19.9537 4.66929 19.9506 4.66365 19.9482 4.65771C19.9472 4.65514 19.9464 4.65247 19.9453 4.6499H19.9443C19.8297 4.36307 19.6738 4.14875 19.5166 3.97412L19.4619 3.91357L19.3984 3.86279L19.3945 3.85986C19.3917 3.85748 19.3883 3.85385 19.3828 3.84912C19.3757 3.84299 19.3501 3.82147 19.332 3.80615C19.3003 3.77917 19.234 3.72522 19.1494 3.67041L19.1504 3.66943C19.0333 3.59144 18.9043 3.52327 18.7637 3.47021C18.6229 3.40665 18.4702 3.35797 18.2988 3.3335H18.2979Z" fill="#555555" stroke="#555555" stroke-width="2"/>
                                </svg>
                            </a>
                            <a href="https://youtube.com/@darsoo_com"><i class="fa-brands fa-youtube"></i></a>
                            
                            <a href="https://www.aparat.com/darsoo.ir" class="fbtl-item">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/aparat.png'; ?>" alt="لوگو آپارات">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-trust">
            <div class="container">
                <div class="fbt-wrapper">
                    <div class="fbt-right">
                        <span class="trust-slogan">به باشگاه انحصاری دارســــــو بپیوندید!</span>

                        <form class="newsletter-form">
                            <input type="email" placeholder="ایمیل خود را وارد کنید.">
                            <button type="button">ارســـــال ایمیل</button>
                        </form>
                    </div>
                    <div class="fbt-left">
                        <a href="https://darsoo.com/trust/" class="fbtl-item">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/enamad.jpg'; ?>" alt="اینماد">
                        </a>
                        <a href="https://darsoo.com/trust/" class="fbtl-item">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/neshan-resaneh.jpg'; ?>" alt="نماد رسانه دیجیتال">
                        </a>
                        <a href="https://darsoo.com/trust/" class="fbtl-item">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/etehadie-kasbokarmajazi.jpg'; ?>" alt="لوگو اتحادیه کسب و کار مجازی">
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                <div class="footer-copyright-wrapper">
                    <i class="fa-light fa-copyright"></i>
                    <?php 
                        if(!empty($copyright)){
                            echo $copyright;
                        }
                        else{         
                    ?>                                             
                    <span>2025 تمامی حقوق برای سایت فروشگاهی دارســو محفوظ است و هرگونه سو استفاده از آن پیگرد قانونی دارد.</span>
                    <?php }; ?>                    
                </div>
            </div>
        </div>

        <div class="back-to-top">
            <a href="#" class="back-top-btn" id="back_top">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7658 37.2857L26.6001 21.4515C28.4701 19.5815 31.5301 19.5815 33.4001 21.4515L49.2344 37.2857" stroke="#585858" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

    </section>

    
    
</footer>


</body>
<?php
    wp_footer();
?>
</html>