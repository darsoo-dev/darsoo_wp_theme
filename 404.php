<?php
    get_header();
?>

    <div class="not-found-page">

        <div class="not-found-content">
            <div class="badge">
                ): Error 404 
            </div>
            <h1>مشکلی در درخواست شما وجود دارد!</h1>
            <p>به نظر می‌رسد در درخواست شما مشکلی وجود دارد. ممکن است URL وارد شده اشتباه باشد یا اطلاعات ناقص باشند. لطفاً دوباره بررسی کنید که همه چیز به درستی وارد شده باشد.</p>
            <a href="/">بازگشت به صفحه اصلی</a>
        </div>

        <div class="not-found-image">
            <img src="<?php echo get_template_directory_uri().'/assets/images/not-found-page.png'; ?>" alt="تصویر صفحه پیدا نشد">
        </div>

    </div>

<?php 
    get_footer();
?>