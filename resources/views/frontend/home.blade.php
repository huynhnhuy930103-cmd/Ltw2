<x-layout-site title="Trang chủ">
    <x-slider />

    <div style="max-width: 1280px; margin: 40px auto; padding: 0 16px; display: block !important;">

        <div style="margin-bottom: 60px; display: block; width: 100%;">
            <x-product-new />
        </div>

        <!-- <div id="fix-nhay-layout" style="display: block !important; width: 100% !important; clear: both !important;">
            <x-home-list-category />
        </div> -->

    <x-product-sale />


</x-layout-site>

<style>
    /* Animation slider của bạn */
    @keyframes slide-infinite {
        0%, 15% { transform: translateX(0); }
        20%, 35% { transform: translateX(-100%); }
        40%, 55% { transform: translateX(-200%); }
        60%, 75% { transform: translateX(-300%); }
        80%, 95% { transform: translateX(-400%); }
        100% { transform: translateX(0); }
    }
    .animate-infinite-slideshow {
        display: flex;
        width: 500%;
        animation: slide-infinite 20s infinite ease-in-out;
    }
    .slide-item { width: 100%; flex-shrink: 0; }
</style>
